<template>
    <v-app>
        <v-form @submit.prevent="sendCallback" class="index__page-banner-form" v-show="submitSuccess != 1">
            <div class="index__page-banner-form-services">
                <v-select
                    v-model="comment"
                    :items="services"
                    item-text="name"
                    label="Выберите услугу"
                    hide-details
                    required
                    dense
                    solo
                ></v-select>

            </div>
            <div class="index__page-banner-form-name">
                <v-text-field
                    v-model.trim.number="form.name"
                    @input="$v.form.name.$touch()"
                    @blur="$v.form.name.$touch()"
                    label="Имя"
                    :error-messages="nameErrors"
                    type="tel"
                    required
                    solo
                    hide-details
                    dense
                ></v-text-field>
            </div>
            <div class="index__page-banner-form-phone">
                <v-text-field
                    v-model.trim="form.phone"
                    @input="$v.form.phone.$touch()"
                    @blur="$v.form.phone.$touch()"
                    label="+7(___) ___-___-__"
                    :error-messages="phoneErrors"
                    v-mask="mask"
                    type="tel"
                    required
                    maxlength="18"
                    hide-details
                    solo
                    dense
                ></v-text-field>
            </div>
            <v-btn class="btn-primary"
                   color="orange darken-3"
                   type="submit"
                   dark
            >
                Оставить заявку
            </v-btn>
        </v-form>
        <div class="index__page-banner-success-block" v-show="submitSuccess != 0">

            <span class="icon">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 286.054 286.054" style="enable-background:new 0 0 286.054 286.054;"
                     xml:space="preserve">
<g>
<path style="fill:#3DB39E;" d="M143.031,0C64.027,0,0.004,64.04,0.004,143.027c0,78.996,64.031,143.027,143.027,143.027
c78.987,0,143.018-64.031,143.018-143.027C286.049,64.049,222.018,0,143.031,0z M143.031,259.236
c-64.183,0-116.209-52.026-116.209-116.209S78.857,26.818,143.031,26.818s116.2,52.026,116.2,116.209
S207.206,259.236,143.031,259.236z M199.241,82.187c-6.079-3.629-13.847-1.475-17.342,4.827l-47.959,86.147l-26.71-32.512
c-4.836-5.569-11.263-8.456-17.333-4.827c-6.079,3.638-8.591,12.39-4.657,18.004l37.169,45.241c2.78,3.611,5.953,5.775,9.27,6.392
l0.027,0.054l0.34,0.018c0.751,0.116,11.979,2.19,16.815-6.463l55.048-98.876C207.402,93.879,205.32,85.825,199.241,82.187z"/>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
                <g>
</g>
</svg>
            </span>
            <div class="index__page-banner-success-text">
                <div class="index__page-banner-success-title">
                    Вы отправили заявку
                </div>
                <div class="index__page-banner-success-desc">
                    Пожалуйста, ожидайте звонка мастера
                </div>
            </div>
        </div>
    </v-app>
</template>

<script>
    import {required, minLength, maxLength, numeric} from 'vuelidate/lib/validators'
    import {mapState, mapActions, mapMutations} from 'vuex'
    import {mask} from 'vue-the-mask'

    export default {
        props: {
            services: Array
        },
        name: "IndexBannerFormClient",
        data() {
            return {
                form: {
                    phone: '',
                    name: ''
                },
                mask: '!+!7!(###!) ###-###-##',
                comment: null
            }

        },
        methods: {
            ...mapActions('callbackStore', {
                storeCallback: 'storeCallback',

            }),
            ...mapMutations('callbackStore', {
                clearForm: 'clearForm',
                clearSubmitCallback: 'clearSubmitCallback',
                saveSubmitCallback: 'saveSubmitCallback'
            }),
            sendCallback() {
                console.log(this.comment);
                this.$v.$touch();
                if (this.$v.$invalid) {
                    console.log(this.form)
                } else {
                    if (this.storeCallback({form: this.form, order: null, comment: this.comment})) {
                        this.saveSubmitCallback();
                        setTimeout(() => {
                            this.$root.dialogCallback = false
                        }, 3000);
                    }
                }
            },
        },
        directives: {mask},
        computed: {
            ...mapState('callbackStore', {
                submitSuccess: state => state.submitCallback,
            }),
            nameErrors() {
                const errors = [];
                if (!this.$v.form.name.$dirty) return errors;
                !this.$v.form.name.minLength && errors.push('Не забудьте Имя');
                !this.$v.form.name.maxLength && errors.push('Должно быть не больше 40 символов');
                !this.$v.form.name.required && errors.push('Не забудьте имя!');
                return errors
            },
            phoneErrors() {
                const errors = [];
                if (!this.$v.form.phone.$dirty) return errors;
                !this.$v.form.phone.minLength && errors.push('Введите корректный номер не менее 9 символов');
                !this.$v.form.phone.maxLength && errors.push('Введите корректный номер не более 9 символов');
                !this.$v.form.phone.required && errors.push('Ваш телефон?');
                return errors
            },
        },
        validations: {
            form: {
                name: {
                    required,
                    minLength: minLength(1),
                    maxLength: maxLength(40)
                },
                phone: {
                    required,
                    // numeric,
                    minLength: minLength(18),
                    maxLength: maxLength(18)

                }
            }
        },
        mounted() {
            // console.log(this.services)
        }
    }
</script>

<style scoped>
    .btn-primary {
        height: 38px !important;
    }

</style>
