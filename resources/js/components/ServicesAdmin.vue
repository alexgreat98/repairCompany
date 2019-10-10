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
            <template v-slot:item.text="{ item }">
                <p v-html="item.text"></p>
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
        </v-data-table>
        <v-dialog v-model="dialogEdit" fullscreen hide-overlay scrollable
                  transition="dialog-bottom-transition">

            <v-card tile>
                <v-card-title class="p-0">
                    <v-toolbar dark flat color="primary">

                        <v-btn icon dark @click="dialogEdit = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title>{{(userCreatedBtn)?'Создание услуги':'Редактирование услуги'}}</v-toolbar-title>
                        <div class="flex-grow-1"></div>
                        <v-toolbar-items>
                            <v-btn small dark text @click="dialogEdit = false">Отмена</v-btn>
                            <v-btn small dark text v-if="userCreatedBtn===true" @click="createItem()">
                                Создать
                            </v-btn>
                            <v-btn small v-else dark text @click="updateItem()">
                                Сохранить
                            </v-btn>
                        </v-toolbar-items>
                    </v-toolbar>

                </v-card-title>

                <v-card-text three-line subheader>
                    <v-container grid-list-md v-if="editedItem">
                        <v-layout wrap>

                            <v-flex xs12 wrap>
                                <v-switch
                                    v-model="editedItem.show_on_main"
                                    :label="`Показывать на главной: ${(editedItem.show_on_main)?'да': 'нет'}`"
                                ></v-switch>

                                <v-select
                                    v-model="editedItem.sort"
                                    :items="this.sortList"
                                    menu-props="auto"
                                    label="Сортировка"
                                    hide-details
                                    single-line
                                ></v-select>
                            </v-flex>
                            <v-flex xs12 sm6>
                                <v-text-field v-model="editedItem.name" label="Название" required></v-text-field>
                            </v-flex>
                            <v-flex xs12 sm6 row>
                                <v-btn @click="translit" icon>
                                    <v-icon>mdi-link</v-icon>
                                </v-btn>
                                <v-text-field
                                    v-model="editedItem.slug"
                                    label="Ссылка алиас"
                                    required
                                ></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                            </v-flex>
                            <v-flex xs12>
                                <div class="subtitle-2">Детальный текст</div>
                                <ckeditor :editor="this.editor" v-model="editedItem.text"
                                          :config="this.editorConfig"></ckeditor>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <v-container grid-list-md>
                        <v-card width="100%" class="mb-5" v-if="editedItem.id">
                            <v-card-title>Изображение из портфолио</v-card-title>
                            <v-container>
                                <v-row>

                                    <v-col
                                        v-for="image in images"
                                        :key="image.id"
                                        class="d-flex child-flex"
                                        cols="3"
                                    >
                                        <v-card flat tile class="d-flex position-relative">
                                            <v-img
                                                :src="'/storage/portfolio/prev-'+image.url"
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
                                                    @click="deleteImage(editedItem.id, image.id)"
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

                                <dialog-images-attach :serviceId="editedItem.id"></dialog-images-attach>

                            </v-container>
                        </v-card>

                        <prices-admin v-if="editedItem.id" :serviceId="editedItem.id"></prices-admin>
                    </v-container>
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
    import DialogImagesAttach from "./DialogImagesAttach";


    export default {
        name: "ServicesAdmin",
        components: {DialogImagesAttach, PricesAdmin},
        computed: {
            ...mapState('servicesStore', {
                items: state => state.items,
                editedItem: state => state.editedItem,
                images: state => state.editedItemImages
            }),
        },
        watch: {
            dialogEdit(val) {
                if (!val) {
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
                    {text: 'Текст', value: 'text'},
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
                delete: 'deleteItem',
                getImage: 'getItemImage',
                deleteItemImage: 'deleteItemImage',
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
                await this.clear();
                this.dialogEdit = true
            },
            async createItem() {
                await this.create();
                this.getItems();
                this.userCreatedBtn = false;
            },
            async editItem(item) {
                await this.getItem(item.id);
                this.getImage(item.id);
                this.dialogEdit = true
            },
            async updateItem() {
                await this.update();
                this.dialogEdit = false;
                this.getItems();
            },
            async deleteItem(item) {
                await this.delete(item.id);
                this.getItems();
            },
            async deleteImage(item, image) {
                await this.deleteItemImage(image);
                this.getImage(item)
            },
            translit: function () {
                this.editedItem.slug = this.cyrillicToTranslit().transform(this.editedItem.name, "-").toLowerCase().replace('?', '')
            }

        },
        created() {
            this.getItems()
        }
    }
</script>

<style scoped>

</style>
