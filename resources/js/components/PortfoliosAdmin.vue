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
                        <v-card>
                            <v-card-title class="d-flex justify-space-between">
                                <h5>{{ item.name }}</h5>
                                <v-icon
                                    class="mr-2"
                                    @click="showPortfolio(item)"
                                >
                                    edit
                                </v-icon>
                            </v-card-title>
                            <v-divider></v-divider>
                            <v-container fluid class="my-card">
                                <v-row>
                                    <v-col
                                        v-for="p in underThan(item.images)"
                                        :key="p.id"
                                        class="d-flex child-flex"
                                        cols="4"
                                    >
                                        <v-card flat tile class="d-flex">
                                            <v-img :src="`storage/portfolio/prev-` + p.url"
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
                                                        <v-progress-circular indeterminate
                                                                             color="grey lighten-5"></v-progress-circular>
                                                    </v-row>
                                                </template>
                                            </v-img>
                                        </v-card>
                                    </v-col>
                                </v-row>
                                <p v-if="!item.images.length">Нет изображений</p>
                            </v-container>
                        </v-card>

                    </v-col>
                </v-row>
            </template>
        </v-data-iterator>
        <v-row justify="center">
            <v-dialog v-model="dialog" fullscreen hide-overlay scrollable
                      transition="dialog-bottom-transition">
                <template v-slot:activator="{ on }">
                    <!--<v-btn color="primary" dark v-on="on">Open Dialog</v-btn>-->
                </template>
                <v-card>
                    <v-card-title class="pa-0">
                        <v-toolbar dark flat color="primary">

                            <v-btn icon dark @click="dialog = false">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                            <v-toolbar-title>Редактирование портфолио</v-toolbar-title>
                            <div class="flex-grow-1"></div>
                            <v-toolbar-items>
                                <v-btn small dark text color="red" @click="deleteItem">Удалить</v-btn>
                                <v-btn small dark text @click="close()">Отмена</v-btn>
                                <v-btn small dark text @click="save()">{{isNew?'Создать':'Сохранить'}}</v-btn>
                            </v-toolbar-items>
                        </v-toolbar>

                    </v-card-title>
                    <v-card-text>
                        <v-container>
                            <v-flex xs12>
                                <v-row align="center">


                                    <v-col cols-6>
                                        <v-switch
                                            v-model="current.show_on_main"
                                            :label="`Показывать на главной: ${(current.show_on_main)?'да': 'нет'}`"
                                        ></v-switch>
                                    </v-col>
                                    <v-col cols-3>
                                        <v-select
                                            v-model="current.sort"
                                            :items="this.sortList"
                                            menu-props="auto"
                                            label="Сортировка"
                                            hide-details
                                            single-line
                                        ></v-select>
                                    </v-col>

                                </v-row>
                            </v-flex>
                            <v-row>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Название*" required v-model="current.name"></v-text-field>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Заголовок*" required v-model="current.title"
                                                  hint="Заголовок выводимый на сайте"></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Описание" required
                                                  v-model="current.description"></v-text-field>
                                </v-col>
                                <v-col cols="12" sm="6" md="4">
                                    <v-text-field label="Ключевые слова" required
                                                  v-model="current.keywords"></v-text-field>
                                </v-col>
                            </v-row>

                            <v-flex xs12>
                                <div class="subtitle-2">Детальный текст</div>
                                <ckeditor :editor="this.editor" v-model="current.text"
                                          :config="this.editorConfig"></ckeditor>
                            </v-flex>


                            <v-container>
                                <v-row>

                                    <v-col
                                        v-for="image in current.images"
                                        :key="image.id"
                                        class="d-flex child-flex"
                                        cols="2"
                                    >
                                        <v-card flat tile class="d-flex position-relative">
                                            <v-img
                                                :src="`storage/portfolio/prev-` + image.url"
                                                :lazy-src="`storage/portfolio/prev-` + image.url"
                                                aspect-ratio="1"
                                                class="grey lighten-2"
                                            >
                                                <template v-slot:placeholder>
                                                    <v-row
                                                        class="fill-height ma-0"
                                                        align="center"
                                                        justify="center"
                                                    >
                                                        <v-progress-circular indeterminate
                                                                             color="grey lighten-5"></v-progress-circular>
                                                    </v-row>
                                                </template>
                                                <v-btn
                                                    icon
                                                    @click="deleteImage(image.id)"
                                                    absolute
                                                    bottom
                                                    right
                                                    large
                                                    color="red"
                                                >
                                                    <v-icon>mdi-delete</v-icon>
                                                </v-btn>
                                            </v-img>
                                        </v-card>
                                    </v-col>

                                </v-row>
                            </v-container>
                            <v-divider></v-divider>

                            <v-row v-if="!isNew">
                                <v-progress-linear
                                    v-model="progressValue"
                                    v-if="progressValue !== 0"
                                ></v-progress-linear>
                                <v-col cols="12" sm="8">
                                    <v-file-input
                                        show-size
                                        counter
                                        multiple
                                        label="Загрузить фото"
                                        @change="upload"
                                        prepend-icon="mdi-camera"
                                        v-model="files"
                                    ></v-file-input>
                                </v-col>
                                <v-col cols="12" sm="4">
                                    <v-btn color="blue darken-1" text @click="uploadStart" type="file"
                                           v-if="files.length > 0">Загрузить
                                    </v-btn>
                                </v-col>
                                <v-container>
                                    <v-row>

                                        <v-col
                                            v-for="image in imgPrepareToUpload"
                                            :key="image.id"
                                            class="d-flex child-flex"
                                            cols="2"
                                        >
                                            <v-card flat tile class="d-flex position-relative">
                                                <v-img
                                                    :src="image"
                                                    aspect-ratio="1"
                                                    class="grey lighten-2"
                                                >
                                                </v-img>
                                            </v-card>
                                        </v-col>

                                    </v-row>
                                </v-container>
                            </v-row>

                            <v-divider></v-divider>
                            <small>*обязательно к заполнению</small>
                        </v-container>

                    </v-card-text>
                </v-card>
            </v-dialog>
        </v-row>
        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn text @click="snack = false">Закрыть</v-btn>
        </v-snackbar>
        <v-btn
            bottom
            color="pink"
            dark
            fab
            fixed
            right
            @click="openCreateForm"
        >
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </v-container>

</template>

<script>
    export default {
        data() {
            return {
                imgPrepareToUpload: [],
                progressValue: 0,
                snack: false,
                snackColor: '',
                snackText: '',
                value: 0,
                itemsPerPageOptions: [4, 8, 12],
                itemsPerPage: 1000,
                name: "PortfoliosAdmin",
                items: [],
                dialog: false,
                files: [],
                services: [{
                    id: 0,
                    name: ''
                }],
                defItem: {
                    id : 0,
                    name: 'Новый Альбом',
                    text: '',
                    title: '',
                    description: '',
                    images: []
                },
                current: {
                    sort: 250
                },
                isNew: false
            }
        },
        methods: {
            showPortfolio(item) {
                this.current = item;
                this.current.text = this.current.text||'';
                this.imgPrepareToUpload = [];
                this.isNew = false;
                this.dialog = true;

            },
            deleteItem() {
                if (confirm('Вы уверрены')) {
                    this.axios.delete('api/portfolio/' + this.current.id)
                        .then(_ => {
                            this.dialog = false;
                            this.initialize();
                        });
                }
            },
            initialize() {
                this.axios.get('api/portfolio')
                    .then(data => {
                        this.items = data.data;
                        console.log(data.data);
                    });

            },
            openCreateForm() {
                Object.assign(this.current, this.defItem);
                this.current.images = [];
                this.imgPrepareToUpload = [];
                this.isNew = true;
                this.dialog = true;
            },
            deleteImage(item) {
                this.axios.delete('api/images/' + item)
                    .then(data => {
                        console.log(data);
                        this.current.images = this.current.images.filter(im => im.id !== item)
                    })
            },
            upload(files) {
                this.files = files;
                console.log(files);
                this.imgPrepareToUpload = [];
                for (let f of this.files) {
                    let url = URL.createObjectURL(f)
                    console.log(url);
                    this.imgPrepareToUpload.push(url);

                }
            },
            async uploadStart() {
                if (this.files) {
                    //console.log(files);
                    this.progressValue = 0;
                    let part = 100.0 / this.files.length;
                    for (let file of this.files) {
                        let formData = new FormData();
                        formData.append("file[]", file, file.name);
                        formData.append("portfolio", this.current.id);
                        let response = await this.axios
                            .post("api/images", formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',

                                }
                            });
                        console.log({response});
                        this.current.images.push(...response.data);
                        this.progressValue += part;
                    }
                    this.snack = true
                    this.snackColor = 'success'
                    this.snackText = 'Данные сохранены'
                    this.files = [];
                    this.imgPrepareToUpload = [];
                    this.progressValue = 0;
                } else {
                    console.log("there are no files.");

                }

            },
            close() {
                this.dialog = false;
                this.files = [];
                this.initialize();
            },
            save() {
                if (this.isNew) {
                    this.axios.post('api/portfolio', this.current)
                        .then(data => {
                            console.log(this.current, data.data);
                            this.current.id = data.data.id;
                            //Object.assign(this.current, data.data);
                            //this.initialize();
                            this.isNew = false;
                        })
                } else {
                    this.axios.put('api/portfolio/' + this.current.id, this.current)
                        .then(data => {
                            this.dialog = false;
                            this.initialize();
                        })
                }
            },
            underThan(item) {
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
    .my-card:hover {
        cursor: pointer;
    }
</style>
