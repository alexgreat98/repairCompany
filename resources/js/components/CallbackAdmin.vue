<template>
    <v-card>
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
            :items-per-page="50"
            :footer-props="{
                itemsPerPageOptions: [20,50,100]
            }"
            sort-by="created_at"
            sort-desc
        >
            <template v-slot:item.answer="{ item }">
                <v-icon
                    small
                    :color="item.answer? 'light-blue darken-1': 'grey lighten-2'"
                >
                    mdi-check-underline-circle-outline
                </v-icon>
            </template>
            <template v-slot:item.look="{ item }">
                <v-icon
                    small
                    :color="item.look? 'light-blue darken-1': 'grey lighten-2'"
                >
                    mdi-eye-check-outline
                </v-icon>
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
                    @click="deleteIt(item)"
                >
                    delete
                </v-icon>
            </template>
        </v-data-table>
        <v-dialog v-model="dialogEdit" persistent max-width="600">
            <v-card v-if="openedItem">
                <v-card-title class="headline">
                    <v-flex xs6>
                        Просмотр заказа
                    </v-flex>
                    <v-flex xs6>
                        <v-switch
                            v-model="openedItem.answer"
                            :label="`Дозвонились: ${(openedItem.answer)?'да': 'нет'}`"
                            class="m-0 justify-content-end"
                            hide-details
                        ></v-switch>
                    </v-flex>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12 sm4>
                                <v-text-field v-model="openedItem.name" label="Имя" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm4>
                                <v-text-field v-model="openedItem.phone" label="Телефон" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 v-if="openedItem.comment">
                                <v-textarea v-model="openedItem.comment" label="Заказ" required></v-textarea>
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
                    this.getItems()
                }
            }
        },
        data() {
            return {
                progresses: false,
                search: '',
                dialogEdit: false,
                headers: [

                    {text: 'Ответ', value: 'answer', align: 'center', width: 100},
                    {text: 'Просм.', value: 'look', align: 'center', width: 95},
                    {text: 'Имя', value: 'name'},
                    {text: 'Телефон', value: 'phone'},
                    {text: 'Время', value: 'created_at'},
                    {text: 'Actions', value: 'action', sortable: false, width: 70},
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
