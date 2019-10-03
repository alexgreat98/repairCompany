<template>

        <v-card width="100%">
            <v-card-title>
                Услуги
                <div class="flex-grow-1"></div>
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Поиск цен"
                    single-line
                    hide-details
                ></v-text-field>
            </v-card-title>
            <v-data-table
                :headers="headers"
                :items="items"
                :search="search"
                :loading="progresses"
            >
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
            </v-data-table>
            <v-dialog v-model="dialogEdit" persistent max-width="900">
                <v-card>
                    <v-card-title class="headline">Редактировать услугу</v-card-title>
                    <v-card-text>
                        <v-container grid-list-md v-if="editedItem">
                            <v-layout wrap>
                                <v-flex xs12>
                                    <v-text-field v-model="editedItem.name" label="Название" required></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-textarea v-model="editedItem.text" label="Текст" required></v-textarea>
                                </v-flex>
                            </v-layout>
                        </v-container>
                        <prices-admin v-if="editedItem.id" :serviceId="editedItem.id"></prices-admin>
                    </v-card-text>
                    <v-card-actions class="pt-5">
                        <div class="flex-grow-1"></div>
                        <v-btn small color="red darken-1" text @click="dialogEdit = false">Отмена</v-btn>
                        <v-btn small color="green darken-1" text v-if="userCreatedBtn===true" outlined
                               @click="createItem()">
                            Создать
                        </v-btn>
                        <v-btn small color="green darken-1" v-else outlined @click="updateItem()">
                            Сохранить
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <v-btn
                bottom
                color="pink"
                dark
                fab
                fixed
                right
                @click="createItemInfo"
            >
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-card>

</template>

<script>
    import {mapState, mapActions, mapMutations} from 'vuex'
    import PricesAdmin from "./PricesAdmin";


    export default {
        name: "ServicesAdmin",
        components: {PricesAdmin},
        computed: {
            ...mapState('servicesStore', {
                items: state => state.items,
                editedItem: state => state.editedItem,
            }),
        },
        watch: {
            dialogEdit(val) {
                if(!val){
                    this.userCreatedBtn = false;
                    this.clear()
                }
            }
        },
        data() {
            return {
                userCreatedBtn: false,
                progresses: false,
                search: '',
                dialogEdit: false,
                headers: [
                    {
                        text: 'id',
                        align: 'left',
                        sortable: false,
                        value: 'id',
                    },
                    {text: 'Название', value: 'name'},
                    {text: 'Создан', value: 'created_at'},
                    {text: 'Изменен', value: 'updated_at'},
                    {text: 'Действия', value: 'action', sortable: false},
                ],
            }
        },
        methods: {
            ...mapActions('servicesStore', {
                getAllItems: 'getAllItems',
                createInfo: 'createItemInfo',
                create: 'createItem',
                getItem: 'updateItemInfo',
                update: 'updateItem',
                delete: 'deleteItem'
            }),
            ...mapMutations('servicesStore', {
                clear: 'clearEditedItem'
            }),
            async getItems() {
                this.progresses = true;
                await this.getAllItems();
                this.progresses = false;
            },
            async createItemInfo() {
                this.userCreatedBtn = true;
                await this.createInfo();
                this.dialogEdit = true
            },
            async createItem(){
                await this.create();
                this.dialogEdit = false;
            },
            async editItem(item) {
                await this.getItem(item.id);
                this.dialogEdit = true
            },
            async updateItem() {
                await this.update();
                this.dialogEdit = false
            },
            async deleteItem(item){
                await this.delete(item.id);
            },


        },
        created() {
            this.getItems()
        }
    }
</script>

<style scoped>

</style>
