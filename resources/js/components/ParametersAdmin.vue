<template>
    <v-row
            align="center"
            justify="center"
    >
        <v-data-table dense
                :headers="headers"
                :items="params"
                :items-per-page="10"
                class="elevation-1"
        >
            <template v-slot:item.value="props">
                <v-edit-dialog
                        :return-value.sync="props.item.value"
                        large
                        persistent
                        @save="save(props.item)"
                        @cancel="cancel"
                        @open="open"
                        @close="close"
                >
                    <div>{{ props.item.value }}</div>
                    <template v-slot:input>
                        <div class="mt-4 title">Обновить значение</div>
                    </template>
                    <template v-slot:input>
                        <v-text-field
                                v-model="props.item.value"
                                label="Редактирование"
                                single-line
                                counter
                                autofocus
                        ></v-text-field>
                    </template>
                </v-edit-dialog>
            </template>
        </v-data-table>
        <v-snackbar v-model="snack" :timeout="3000" :color="snackColor">
            {{ snackText }}
            <v-btn text @click="snack = false">Close</v-btn>
        </v-snackbar>
    </v-row>

</template>

<script>
    export default {
        name: "ParametersAdmin",
        data(){
            return {
                snack: false,
                snackColor: '',
                snackText: '',
                headers: [
                    {
                        text: 'Параметр',
                        align: 'left',
                        sortable: false,
                        value: 'key',
                        width : '150px'
                    },
                    {   text: 'Описание',
                        value: 'description',
                        align: 'left'
                    },
                    {   text: 'Значение',
                        value: 'value',
                        align: 'left'
                    },

                ],
                params: []
            }
        },
        mounted() {
            this.axios.get('api/params')
                .then(data=>{
                    console.log(data);
                    this.params = data.data;
                })
        },
        methods: {
            save (item) {
                this.axios.put('api/params/' + item.id, item);
                console.log(item)
                this.snack = true
                this.snackColor = 'success'
                this.snackText = 'Данные сохранены'
            },
            cancel () {
                this.snack = true
                this.snackColor = 'error'
                this.snackText = 'Изменения отклонены'
            },
            open () {
                this.snack = true
                this.snackColor = 'info'
                this.snackText = 'Редактирование'
            },
            close () {
                console.log('Dialog closed')
            },
        },
    }
</script>

<style scoped>

</style>