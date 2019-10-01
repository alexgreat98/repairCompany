<template>
    <v-container fluid>
        <v-data-iterator
                :items="items"
                :items-per-page.sync="itemsPerPage"
                :footer-props="{ itemsPerPageOptions }"
        >
            <template v-slot:default="props">
                <v-row>
                    <v-col
                            v-for="item in props.items"
                            :key="item.name"
                            cols="12"
                            sm="6"
                            md="4"
                            lg="3"
                    >
                        <v-card >
                            <v-card-title><h4>{{ item.name }}</h4></v-card-title>
                            <v-divider></v-divider>
                            <v-container fluid v-on:click="showPortfolio" class="my-card">
                                <v-row>
                                    <v-col
                                            v-for="n in 9"
                                            :key="n"
                                            class="d-flex child-flex"
                                            cols="4"
                                    >
                                        <v-card flat tile class="d-flex">
                                            <v-img
                                                    :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                                                    :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
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
                <v-btn color="primary" dark v-on="on">Open Dialog</v-btn>
            </template>
            <v-card>
                <v-card-title>К какой категории относится это фото</v-card-title>
                <v-divider></v-divider>
                <v-card-text style="height: 500px;">
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                            <tr>
                                <th class="text-left">Фото</th>
                                <th class="text-left">Категория</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="n in 9"
                                :key="n">
                                <td><v-img
                                        :src="`https://picsum.photos/500/300?image=${n * 5 + 10}`"
                                        :lazy-src="`https://picsum.photos/10/6?image=${n * 5 + 10}`"
                                        aspect-ratio="1"
                                        class="grey lighten-2"
                                ></v-img></td>
                                <td>Селектор выбора категории</td>
                            </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
                <v-divider></v-divider>
                <v-card-actions>
                    <v-btn color="blue darken-1" text @click="dialog = false">Отмена</v-btn>
                    <v-btn color="blue darken-1" text @click="dialog = false">Сохранить</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-container>
</template>

<script>
    export default {
        data (){
            return {
                itemsPerPageOptions: [4, 8, 12],
                itemsPerPage: 4,
                name : "PortfoliosAdmin",
                items: [
                    {
                        name: 'Объект № 1',
                        calories: 159,
                        fat: 6.0,
                        carbs: 24,
                        protein: 4.0,
                        sodium: 87,
                        calcium: '14%',
                        iron: '1%',
                    },
                    {
                        name: 'Объект № 3',
                        calories: 237,
                        fat: 9.0,
                        carbs: 37,
                        protein: 4.3,
                        sodium: 129,
                        calcium: '8%',
                        iron: '1%',
                    },
                    {
                        name: 'Объект № 2',
                        calories: 262,
                        fat: 16.0,
                        carbs: 23,
                        protein: 6.0,
                        sodium: 337,
                        calcium: '6%',
                        iron: '7%',
                    },
                    {
                        name: 'Объект № 4',
                        calories: 305,
                        fat: 3.7,
                        carbs: 67,
                        protein: 4.3,
                        sodium: 413,
                        calcium: '3%',
                        iron: '8%',
                    },
                    {
                        name: 'Объект № 5',
                        calories: 356,
                        fat: 16.0,
                        carbs: 49,
                        protein: 3.9,
                        sodium: 327,
                        calcium: '7%',
                        iron: '16%',
                    },
                    {
                        name: 'Объект № 6',
                        calories: 375,
                        fat: 0.0,
                        carbs: 94,
                        protein: 0.0,
                        sodium: 50,
                        calcium: '0%',
                        iron: '0%',
                    },
                ],
                dialog : false
            }
        },
        methods : {
            showPortfolio(){
               this.dialog = true;
            }
        }
    }
</script>
<style scoped>
.my-card:hover{
    cursor: pointer;
}
</style>