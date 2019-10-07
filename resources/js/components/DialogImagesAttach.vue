<template>
    <div>
        <v-btn
            @click="dialogImagesAttach"
        >
            <v-icon>mdi-file-image-outline</v-icon>
            Прикрепить изображения
        </v-btn>

        <v-dialog v-model="dialog" max-width="1200">

            <v-card v-if="dialog">
                <v-card-title class="headline">Прикрепить изображение к портфолио</v-card-title>
                <v-progress-linear
                    :active="btnLoad"
                    indeterminate
                ></v-progress-linear>
                <v-container>
                    <v-row>
                        <v-col
                            v-for="image in images"
                            :key="image.id"
                            class="d-flex child-flex"
                            cols="2"
                        >

                            <v-card flat tile class="d-flex position-relative">
                                <v-img
                                    :src="'/storage/portfolio/prev-'+image.url"
                                    aspect-ratio="1"
                                    class="grey lighten-2"

                                >
                                    <v-btn
                                        fab
                                        dark
                                        v-if="(selectedImages.find(obj => obj.id === image.id)!== undefined)"
                                        @click="detachImage(image.id)"
                                        small
                                        color="blue"
                                    >
                                        <v-icon>mdi-check-box-outline</v-icon>
                                    </v-btn>
                                    <v-btn
                                        fab
                                        dark
                                        v-else
                                        @click="attachImage(image.id)"
                                        small
                                        color="blue"
                                    >
                                        <v-icon>mdi-checkbox-blank-outline</v-icon>
                                    </v-btn>

                                </v-img>
                            </v-card>
                        </v-col>

                    </v-row>
                </v-container>
            </v-card>

        </v-dialog>
    </div>

</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        props: {
            serviceId: Number
        },
        data() {
            return {
                images: null,
                selectedImages: null,
                dialog: false,
                btnLoad: false

            }
        },
        name: "dialogImagesAttach",
        watch: {
            dialog(val) {
                if (!val) {
                    this.getImage(this.serviceId);
                }
            }
        },
        methods: {
            ...mapActions('servicesStore', {
                getImage: 'getItemImage',
            }),
            async getAllImages() {
                this.btnLoad = true;
                await this.axios.get('/api/images')
                    .then(({data}) => {
                        this.images = data.items;
                        this.btnLoad = false;
                    })
            },
            async getServiceImages() {
                this.btnLoad = true;
                await this.axios.get('/api/services_images/' + this.serviceId)
                    .then(({data}) => {
                        this.selectedImages = data.images;
                        this.btnLoad = false;
                    })
            },
            async dialogImagesAttach() {
                await this.getAllImages();
                await this.getServiceImages();
                this.dialog = true;

            },
            async attachImage(id) {
                this.btnLoad = true;
                await this.axios.put('/api/services_images_attach/' + this.serviceId + '/image/' + id,)
                    .then(({data}) => {
                        this.getServiceImages();
                    })
                    .catch(({error}) => {
                        console.log(error);
                    });
            },
            async detachImage(id) {
                this.btnLoad = true;
                await this.axios.delete('/api/services_images_detach/' + id)
                    .then(({data}) => {
                        this.getServiceImages();

                    })
                    .catch(({error}) => {
                        console.log(error);
                        this.btnLoad = false;
                    })
            }
        },
        created() {

        }
    }
</script>

<style scoped>

</style>
