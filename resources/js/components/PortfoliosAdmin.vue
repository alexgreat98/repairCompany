<template>
    <v-container fluid>
        <div class="text-center">
        </div>
        <v-data-iterator
                :items="items"
                :items-per-page.sync="itemsPerPage"
                :footer-props="{ itemsPerPageOptions }"
                :hide-default-footer="true"
        >
            <template v-slot:default="props">
                <v-row>
                    <v-col
                            v-for="item of props.items"
                            :key="item.id"
                            cols="12"
                            sm="6"
                            md="4"
                            lg="3"
                    >
                        <v-card >
                            <v-card-title><h4>{{ item.name }}</h4></v-card-title>
                            <v-divider></v-divider>
                            <v-container fluid v-on:click="showPortfolio(item)" class="my-card">
                                <v-row>
                                    <v-col
                                            v-for="p in underThan(item.images)"
                                            :key="p.id"
                                            class="d-flex child-flex"
                                            cols="4"
                                    >
                                        <v-card flat tile class="d-flex">
                                            <v-img  :src="`storage/portfolio/prev-` + p.url"
                                                    :lazy-src="`storage/portfolio/prev-` + p.url"
                                                    aspect-ratio="1"
                                                    class="grey lighten-2"
                                            >
                                                <template v-slot:placeholder>
                                                    <v-row
                                                            class="fill-height ma-0"
                                                            align="center"
                                                            justify="center"
                                                    >
                                                        <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
                                                    </v-row>
                                                </template>
                                            </v-img>
                                        </v-card>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </v-card>

                    </v-col>
                </v-row>
            </template>
        </v-data-iterator>


        <v-dialog v-model="dialog" scrollable max-width="500px">
            <template v-slot:activator="{ on }">
                <!--<v-btn color="primary" dark v-on="on">Open Dialog</v-btn>-->
            </template>
            <v-card>
                <v-card-title><div>{{current.name}} </div><v-icon
                        medium
                        color="red"
                        @click="deleteItem(current.id)"
                >
                    delete
                </v-icon></v-card-title>
                <v-divider></v-divider>
                <v-card-text style="height: 500px;">
                    <v-data-iterator
                            :items="current.images"
                            :items-per-page="200"
                            :hide-default-footer="true"
                    >
                        <template v-slot:default="props">
                            <v-row>
                                <v-col
                                        v-for="im in props.items"
                                        :key="im.id"
                                        cols="12"
                                        sm="6"
                                        md="4"
                                        lg="3"
                                        class="position-relative"
                                >
                                    <v-img
                                            :src="`storage/portfolio/prev-` + im.url"
                                            :lazy-src="`storage/portfolio/prev-` + im.url"
                                            aspect-ratio="1"
                                            class="grey lighten-2"
                                    ></v-img>
                                    <v-btn
                                        icon
                                        @click="deleteImage(im.id)"
                                        absolute
                                        bottom
                                        right
                                        large
                                        color="red"
                                    >
                                        <v-icon>mdi-delete</v-icon>
                                    </v-btn>
                                </v-col>
                            </v-row>
                        </template>
                    </v-data-iterator>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn color="red darken-1" text @click="close">Закрыть</v-btn>
                    <!--<v-btn color="green darken-1" text @click="dialog = false">Сохранить</v-btn>-->
                    <v-btn color="blue darken-1" text @click="uploadStart" type="file" v-bind:disabled="!(files.length > 0)">Загрузить</v-btn>
                    <v-icon medium color="green" v-if="loadState">fa-check-circle</v-icon>
                </v-card-actions>
                <v-divider></v-divider>
                <v-file-input show-size counter multiple label="Загрузить фото" @change="upload" v-model="files" ></v-file-input>
            </v-card>
        </v-dialog>
                <v-btn
                bottom
                color="pink"
                dark
                fab
                fixed
                right
                @click="dialogNew = !dialogNew"
        >
            <v-icon>mdi-plus</v-icon>
        </v-btn>

        <v-row justify="center">
            <v-dialog v-model="dialogNew" persistent max-width="600px">
                <template v-slot:activator="{ on }">
                    <!--<v-btn color="primary" dark v-on="on">Open Dialog</v-btn>-->
                </template>
                <v-card>
                    <v-card-title>
                        <span class="headline">Новый Альбом</span>
                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-row>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Название*" required v-model="nItem.name"></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Заголовок" v-model="nItem.title" hint="example of helper text only on focus"></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Описание" required v-model="nItem.description"></v-text-field>
                                </v-col>
                            </v-row>
                        </v-container>
                        <small>*обязательно к заполнению</small>
                    </v-card-text>
                    <v-card-actions>
                        <div class="flex-grow-1"></div>
                        <v-btn color="red darken-1" text @click="dialogNew = false">Отмена</v-btn>
                        <v-btn color="green darken-1" text @click="newItem">Сохранить</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn text @click="snack = false">Close</v-btn>
        </v-snackbar>
    </v-container>

</template>

<script>
    export default {
        data (){
            return {
                snack: false,
                snackColor: '',
                snackText: '',
                value : 0,
                loadState : false,
                itemsPerPageOptions: [4, 8, 12],
                itemsPerPage: 1000,
                name : "PortfoliosAdmin",
                items: [],
                dialog : false,
                dialogNew : false,
                files: [],
                services : [{
                    id : 0,
                    name : ''
                }],
                nItem:{
                    name : '',
                    text : '',
                    title : '',
                    description : ''
                },
                defItem:{
                    name : '',
                    text : '',
                    title : '',
                    description : ''
                },
                current : {}
            }
        },
        methods : {
            showPortfolio(item){
                this.current = item;
               this.dialog = true;
               this.axios.get('api/portfolio/' + item.id)
                   .then(data=>{
                       console.log(data);
                   })
            },
            deleteItem(){
                if(confirm('Вы уверрены')){
                    this.axios.delete('api/portfolio/' + this.current.id)
                        .then(_=>{
                            this.dialog = false;
                            this.initialize();
                        });
                }
            },
            initialize(){
                this.axios.get('api/portfolio')
                    .then(data=>{
                      this.items = data.data;
                        console.log(data.data);
                    });

            },

            newItem(){
                this.axios.post('api/portfolio', this.nItem)
                    .then(data=>{
                        console.log(data.data);
                        Object.assign(this.nItem, this.defItem);
                        this.dialogNew = false;
                        this.initialize();
                    })
            },
            deleteImage(item){
                this.axios.delete('api/images/' + item)
                    .then(data=>{
                        console.log(data);
                        this.current.images = this.current.images.filter(im=> im.id !== item)
                    })
            },
            upload(files){
                this.files = files;
                console.log(files);
            },
            uploadStart(){
                if (this.files) {
                    let formData = new FormData();

                    for (let file of this.files) {
                        formData.append("file[]", file, file.name);
                    }

                    // additional data
                    formData.append("portfolio", this.current.id);
                    this.axios
                        .post("api/images", formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',

                            }
                        })
                        .then(response => {
                            console.log("Success!");
                            console.log({ response });
                            this.snack = true
                            this.snackColor = 'success'
                            this.snackText = 'Данные сохранены'
                        })
                        .catch(error => {
                            console.log({ error });
                        });
                } else {
                    console.log("there are no files.");

                }

            },

            close(){
                this.dialog = false;
                this.files = [];
                this.initialize();
            },
            underThan(item){
                let size = item.length;
                size = Math.min(6, size);
                return item.slice(0, size);
            }

        },
        mounted() {
            this.initialize()
        }
    }
</script>
<style scoped>
.my-card:hover{
    cursor: pointer;
}
</style>
