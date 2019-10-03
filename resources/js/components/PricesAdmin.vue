<template>
    <v-card width="100%">
        <v-card-title>
            Цены
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
            :items="editedItemPrices || prices"
            :search="search"
            :loading="progresses"
        >
            <template v-slot:item.action="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    @click="editPrice(item)"
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
        <v-dialog v-model="dialogEdit" persistent max-width="600">
            <v-card>
                <v-card-title class="headline">Редактировать цену</v-card-title>
                <v-card-text>
                    <v-container grid-list-md v-if="editedPrice">
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field v-model="editedPrice.name" label="Название" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm8>
                                <v-text-field v-model="editedPrice.price" label="Цена" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm4>
                                <v-select
                                    v-model="editedPrice.type"
                                    :items="types"
                                    label="Ед. изм."
                                >
                                </v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                    v-model="editedPrice.service"
                                    :items="services"
                                    label="Ед. изм."
                                >
                                </v-select>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <div class="flex-grow-1"></div>
                    <v-btn  small color="red darken-1" text @click="dialogEdit = false">Отмена</v-btn>
                    <v-btn  small color="green darken-1" text v-if="userCreatedBtn===true" outlined
                           @click="createItem()">
                        Создать
                    </v-btn>
                    <v-btn  small color="green darken-1"  v-else outlined  @click="updatePriceAction()">
                        Сохранить
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-btn
            bottom
            small
            color="pink"
            dark
            fab
            absolute
            right
            @click="createItemInfo"
        >
            <v-icon>mdi-plus</v-icon>
        </v-btn>
    </v-card>
</template>

<script>
    import {mapState, mapActions} from 'vuex'

    export default {
        props: {
            editedItemPrices: Array
        },
        name: "PricesAdmin",
        computed: {
            ...mapState('pricesStore', {
                types: state => state.types,
                prices: state => state.prices,
                editedPrice: state => state.editedPrice,
            }),
        },
        watch: {
            dialogEdit(val) {
                if(!val){
                    this.userCreatedBtn = false;
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
                    {text: 'Цена', value: 'price'},
                    {text: 'Ед.Изм.', value: 'type'},
                    {text: 'Actions', value: 'action', sortable: false},
                ],
            }
        },
        methods: {
            ...mapActions('pricesStore', [
                'getAllPrices',
                'getPriceInfo',
                'createPriceInfo',
                'createPrice',
                'updatePrice',
                'deletePrice'
            ]),
            async getPrices() {
                this.progresses = true;
                await this.getAllPrices({});
                this.progresses = false;
            },
            async createItemInfo() {
                this.userCreatedBtn = true;
                await this.createPriceInfo({});
                this.dialogEdit = true
            },
            async createItem(){
                await this.createPrice({});
                this.dialogEdit = false;
            },
            async editPrice(item) {
                await this.getPriceInfo(item.id);
                this.dialogEdit = true
            },
            async updatePriceAction() {
                await this.updatePrice({});
                this.dialogEdit = false
            },
            async deleteItem(item){
                await this.deletePrice(item.id);
            },
        },
        created() {
            this.getPrices()
        }
    }
</script>

<style scoped>

</style>
