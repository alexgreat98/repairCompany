<template>
    <v-row justify="center">
        <v-dialog v-model="dialog" persistent max-width="600px">
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
                                <v-text-field label="Название*" required></v-text-field>
                            </v-col>
                            <v-col cols="12" sm="6" md="4">
                                <v-text-field label="Заголовок"
                                              hint="example of helper text only on focus"></v-text-field>
                            </v-col>
                        </v-row>
                    </v-container>
                    <small>*обязательно к заполнению</small>
                </v-card-text>
                <v-card-actions>
                    <div class="flex-grow-1"></div>
                    <v-btn color="red darken-1" text @click="dialog = false">Отмена</v-btn>
                    <v-btn color="green darken-1" text @click="dialog = false">Сохранить</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-row>
</template>

<script>
    export default {
        name: "PortfolioAdmin",
        data(){
            return{
                dialog : true
            }
        }
    }
</script>

<style scoped>

</style>