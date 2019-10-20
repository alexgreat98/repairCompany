<template>
        <v-content>
            <v-flex>
                <v-text-field
                    v-model.trim="search"
                    @keyup="updateData()"
                    type="text"
                    placeholder="Начните вводить название услуги"
                    label="Поиск услуг"
                    class="pt-4"
                    clearable
                ></v-text-field>
            </v-flex>
            <v-flex class="services-price-table">

                <div
                    v-for="price in filteredList"
                    class="services-price-table-item"
                    v-bind:class="{ active: price.check }"
                    @click="price.check = !price.check"
                >
                    <v-checkbox @click.self v-model="price.check" color="orange darken-3">
                    </v-checkbox>

                    <div class="services-price-table-name">
                        {{price.name}}
                    </div>
                    <div>
                        <v-text-field
                            v-show="price.check"
                            :label="price.type"
                            v-model="price.value"
                            v-mask="mask"
                            @click.stop
                            hide-details
                            height="30"
                            class="m-0"
                            outlined
                        ></v-text-field>
                    </div>

                    <div class="services-price-table-price">
                        <span class="price">{{price.price}}</span>p за {{price.type}}
                    </div>
                </div>

            </v-flex>


            <v-snackbar
                v-model="selected.length"
                bottom
                color="orange accent-4"
                class="services-price-calculated"
                :timeout="0"
            >
                На сумму: <b>{{sum}}</b>р
                <v-btn
                    dark
                    text
                    @click="openDialog"
                >
                    Оставить заявку
                </v-btn>
            </v-snackbar>
        </v-content>
</template>

<script>
    import {mask} from 'vue-the-mask'
    import {mapMutations} from 'vuex'
    export default {
        directives: {mask},
        name: "PricesClient",
        props: {
            prices: Array
        },

        data() {
            return {
                mask: '####',
                checkbox: false,
                localPrices: this.prices.map(function (price) {
                    price['check'] = false;
                    price['value'] = null;
                    return price;
                }),
                selected: [],
                sum: null,
                search: '',
            }
        },
        watch: {
            localPrices: {
                handler: function (val) {
                    this.selected = val.filter((price) => {
                        if ((price.check)) {
                            return price;
                        }
                    });
                    this.sum = this.selected.reduce(
                        (sum, {price, value}) => sum + price * ((value) ? value : 1), 0
                    ).toFixed(0)
                },
                deep: true
            },
            search(val) {
                if (val == null) {
                    this.search = '';
                }
            }
        },
        computed: {
            filteredList() {
                return this.localPrices.filter(price => {
                    return price.name.toLowerCase().includes(this.search.toLowerCase().replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, ''))
                })
            }
        },
        methods: {
            ...mapMutations('callbackStore', {
                clearForm: 'clearForm'
            }),
            openDialog(){
                // this.clearForm();
                this.$root.dialogCallback = true
            }
        }
    }
</script>

<style scoped>

    .services-price-calculated b {
        font-size: 1.1rem;
        font-weight: 800;
    }
</style>
