<template>
    <v-row
            align="center"
            justify="center"
    >
        <v-data-table
                :headers="headers"
                :items="users"
                sort-by="name"
                class="elevation-1"
                width="100%"
        >
            <template v-slot:top>
                <v-toolbar flat color="white">
                    <v-toolbar-title>Пользователи</v-toolbar-title>
                    <v-divider
                            class="mx-4"
                            inset
                            vertical
                    ></v-divider>
                    <div class="flex-grow-1"></div>
                    <v-dialog v-model="dialog" max-width="500px">
                        <template v-slot:activator="{ on }">
                            <v-btn color="primary" dark class="mb-2" v-on="on">Новый</v-btn>
                        </template>
                        <v-card>
                            <v-card-title>
                                <span class="headline">{{ formTitle }}</span>
                            </v-card-title>

                            <v-card-text>
                                <v-container>
                                    <v-row>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.name" label="Имя"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.email" label="E-mail"></v-text-field>
                                        </v-col>
                                        <v-col cols="12" sm="6" md="4">
                                            <v-text-field v-model="editedItem.password" label="Пароль"></v-text-field>
                                        </v-col>
                                    </v-row>
                                </v-container>
                            </v-card-text>

                            <v-card-actions>
                                <div class="flex-grow-1"></div>
                                <v-btn color="blue darken-1" text @click="close">Отмена</v-btn>
                                <v-btn color="blue darken-1" text @click="save">Сохранить</v-btn>
                            </v-card-actions>
                        </v-card>
                    </v-dialog>
                </v-toolbar>
            </template>
            <template v-slot:item.action="{ item }">
                <v-icon
                        small
                        class="mr-2"
                        @click="editItem(item)"
                >
                    edit
                </v-icon>
                <v-icon
                        small
                        @click="deleteItem(item)"
                >
                    delete
                </v-icon>
            </template>
            <template v-slot:no-data>
                <v-btn color="primary" @click="initialize">Reset</v-btn>
            </template>
        </v-data-table>
    </v-row>
</template>

<script>
    export default {
        data: () => ({
            dialog: false,
            headers: [
                {
                    text: 'Имя',
                    align: 'left',
                    sortable: false,
                    value: 'name',
                },
                {text: 'Email', value: 'email'},
                // { text: 'Создан', value: 'created_at' },
                // { text: 'Обновлён', value: 'updated_at' },
                {text: 'Actions', value: 'action', sortable: false},
            ],
            users: [],
            editedIndex: -1,
            editedItem: {
                name: '',
                email: '',
                password: '',
            },
            defaultItem: {
                name: '',
                email: '',
                password: '',
            },
        }),

        computed: {
            formTitle () {
                return this.editedIndex === -1 ? 'Новая запись' : 'Редактирование'
            },
        },

        watch: {
            dialog (val) {
                val || this.close()
            },
        },

        created () {
            this.initialize()
        },

        methods: {
            data(s){
                return s.slice(0, length - 9).split('-').reverse().join('.')
            },
            initialize () {
                this.axios.get('api/users')
                    .then(data=>{
                        this.users = data.data
 /*                           .map(u=>{
                            u.created_at = this.data(u.created_at)
                            u.updated_at = this.data(u.updated_at)
                            return u;
                        });*/
                    });
            },
            editItem (item) {
                this.editedIndex = this.users.indexOf(item)
                this.editedItem = Object.assign({}, item)
                this.dialog = true
            },

            deleteItem (item) {
                const index = this.users.indexOf(item)
                confirm('Вы уверены что хотите удалить пользователя?') && this.users.splice(index, 1)
                this.axios.delete('api/users/' + item.id)
            },

            close () {
                this.dialog = false
                setTimeout(() => {
                    this.editedItem = Object.assign({}, this.defaultItem)
                    this.editedIndex = -1
                }, 300)
            },

            save () {
                console.log(this.editedItem, this.editedIndex);
                if(this.editedIndex === -1){
                    //new item
                    this.axios.post('api/users', this.editedItem);
                }else{
                    //edit item
                    let user = this.users[this.editedIndex]
                    this.axios.put('api/users/' + user.id, user);
                    console.log(user)
                }

                if (this.editedIndex > -1) {
                    Object.assign(this.users[this.editedIndex], this.editedItem)
                } else {
                    this.users.push(this.editedItem)
                }
                this.close()
            }
        },
    }
</script>

<style scoped>

</style>