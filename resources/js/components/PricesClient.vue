<template>
    <v-content>
        <v-flex>
            <v-text-field
                v-model.trim="search"
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
            >
                <v-checkbox v-model="price.check" color="orange darken-3">
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
                        hide-details
                        height="30"
                        class="m-0"
                        outlined
                    ></v-text-field>
                </div>

                <div class="services-price-table-price">
                    <span class="price">{{price.price}}</span>p <span class="d-none d-sm-inline-block">за</span>
                    <span class="services-price-table-price-type">{{price.type}}</span>
                </div>
            </div>

        </v-flex>


        <v-snackbar
            v-model="!!selected.length && !$root.dialogCallbackStore && !$root.dialogCallback"
            bottom
            color="orange accent-4"
            class="services-price-calculated"
            :timeout="0"
            z-index="200"
        >
            <span>
                На сумму: <b>{{sum}}</b>р
            </span>

            <v-btn
                dark
                text
                @click="openDialog"
            >
                Оставить заявку
            </v-btn>
        </v-snackbar>
        <callback-store-modal-client v-bind:order="selected"></callback-store-modal-client>
    </v-content>
</template>

<script>
    import {mask} from 'vue-the-mask'
    import {mapMutations} from 'vuex'
    import CallbackStoreModalClient from "./CallbackStoreModalClient";

    export default {
        directives: {mask},
        name: "PricesClient",
        components: {
            CallbackStoreModalClient
        },
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
                    let sumPre = this.selected.reduce(
                        (sum, {price, value}) => sum + price * ((value) ? value : 1), 0
                    );

                    if (sumPre) {
                        sumPre = (sumPre + (sumPre / 6)).toFixed(2)
                    }
                    this.sum = sumPre;
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
                clearSubmit: 'clearSubmit'
            }),
            openDialog() {
                this.clearSubmit();
                this.$root.dialogCallbackStore = true
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
