<template>
    <v-card width="100%">
        <v-card-title>
            Заказы с форм
            <div class="flex-grow-1"></div>
            <v-text-field
                v-model="search"
                append-icon="search"
                label="Поиск заказов"
                single-line
                hide-details
            ></v-text-field>
        </v-card-title>
        <v-data-table
            :headers="headers"
            :items="callbackList"
            :search="search"
            :loading="progresses"
            dense
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
                    @click="deleteIt(item)"
                >
                    delete
                </v-icon>
            </template>
        </v-data-table>
        <v-dialog v-model="dialogEdit" persistent max-width="600">
            <v-card>
                <v-card-title class="headline">Просмотр заказа</v-card-title>
                <v-card-text>
                    <v-container grid-list-md v-if="openedItem">
                        <v-layout wrap>
                            <v-flex xs12 sm8>
                                <v-text-field v-model="openedItem.name" label="Название" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm8>
                                <v-text-field v-model="openedItem.phone" label="Цена" required></v-text-field>
                            </v-flex>

                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <div class="flex-grow-1"></div>
                    <v-btn small color="red darken-1" text @click="dialogEdit = false">Закрыть</v-btn>
                    <v-btn small color="green darken-1" outlined @click="updateItemAction()">
                        Сохранить
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-card>
</template>

<script>
    import {mapState, mapActions} from 'vuex'

    export default {
        name: "CallbackAdmin",
        computed: {
            ...mapState('callbackStore', {
                callbackList: state => state.callback,
                openedItem: state => state.openedItem,
            }),
        },
        watch: {
            dialogEdit(val) {
                if (!val) {

                }
            }
        },
        data() {
            return {
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
                    {text: 'Имя', value: 'name'},
                    {text: 'Телефон', value: 'phone'},
                    {text: 'Отвеченно', value: 'answer'},
                    {text: 'Просмотренно', value: 'look'},
                    {text: 'Время', value: 'created_at'},
                    {text: 'Actions', value: 'action', sortable: false},
                ],
            }
        },
        methods: {
            ...mapActions('callbackStore', [
                'getAllItems',
                'getItemInfo',
                'updateItem',
                'deleteItem',
            ]),
            async getItems() {
                this.progresses = true;
                await this.getAllItems({});
                this.progresses = false;
            },
            async editItem(item) {
                await this.getItemInfo(item.id);
                this.dialogEdit = true
            },
            async updateItemAction() {
                await this.updateItem({});
                this.getItems();
                this.dialogEdit = false
            },
            async deleteIt(item) {
                await this.deleteItem(item.id);
                this.getItems()
            },
        },
        created() {
            this.getItems();
        }
    }
</script>

<style scoped>

</style>
