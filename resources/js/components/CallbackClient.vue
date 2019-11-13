<template>
    <v-content>
        <div class="main-callback-form-center">
            <div class="main-callback-form">
                <div class="main-callback-form-image" v-if="!inModal && windowsWidth > 768">
                    <v-img
                        src="/storage/site/mainForm.jpg"
                        aspect-ratio="1"
                        class="grey lighten-2"
                        max-height="300"
                    ></v-img>
                </div>
                <div class="main-callback-form-wrap" v-show="submitSuccess == 0">
                    <div class="main-callback-form-title">
                        Доверьте дело профессионалам!
                    </div>
                    <div class="main-callback-form-description">
                        Оставьте свои контактные данные и мы сами свяжемся с вами
                    </div>
                    <div class="main-callback-form-inputs">
                        <v-form @submit.prevent="sendCallback">
                            <v-container>
                                <v-row>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model.trim="form.name"
                                            @input="$v.form.name.$touch()"
                                            @blur="$v.form.name.$touch()"
                                            label="Как к вам обращаться"
                                            type="text"
                                            :error-messages="nameErrors"
                                            required
                                        ></v-text-field>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-text-field
                                            v-model.trim="form.phone"
                                            @input="$v.form.phone.$touch()"
                                            @blur="$v.form.phone.$touch()"
                                            label="Контактный номер"
                                            :error-messages="phoneErrors"
                                            v-mask="mask"
                                            type="tel"
                                            required
                                            maxlength="18"
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                                <div class="form-group row" v-if="!!captchaKey">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="g-recaptcha" :data-sitekey="captchaKey"></div>
                                        <!--@if ($errors->has('g-recaptcha-response'))
                                        <span class="invalid-feedback" style="display: block;">
                                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                        </span>
                                        @endif-->
                                    </div>
                                </div>
                                <v-btn
                                    class="btn-primary"
                                    type="submit"
                                    color="orange darken-3"
                                    dark
                                >
                                    Оставить заявку
                                </v-btn>
                            </v-container>
                        </v-form>
                    </div>
                </div>
                <div class="main-callback-form-success" v-show="submitSuccess == 1">
                    <div class="main-callback-form-success-block">

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
                        <div class="main-callback-form-success-text">
                            <div class="main-callback-form-success-title">
                                Вы отправили заявку
                            </div>
                            <div class="main-callback-form-success-desc">
                                Пожалуйста, ожидайте звонка мастера
                            </div>
                        </div>
                    </div>
                    <div class="main-callback-form-success-btn"><span
                        @click="resendCallback">Отправить еще одну заявку</span></div>
                </div>
            </div>
        </div>
    </v-content>
</template>

<script>

    import {required, minLength, maxLength, numeric} from 'vuelidate/lib/validators'
    import {mapState, mapActions, mapMutations} from 'vuex'
    import {mask} from 'vue-the-mask'

    export default {

        name: "CallbackClient",
        props: {
            inModal:{
                type: Boolean,
                default: false
            },
            captchaKey :{
                type: String,
                default: ''
            },

        },
        directives: {mask},
        data() {
            return {
                windowsWidth: window.innerWidth,
                submitStatus: null,
                form: {
                    phone: '',
                    name: ''
                },
                mask: '!+!7!(###!) ###-###-##',
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
                console.log(this.form.phone);
                this.$v.$touch();
                if (this.$v.$invalid) {
                    this.submitStatus = 'Заполните все данные'
                } else {
                    if(this.storeCallback({form: this.form})){
                        this.saveSubmitCallback();
                        setTimeout(() => {
                            this.$root.dialogCallback = false
                        }, 3000);
                    }
                }
            },
            resendCallback() {
                this.clearSubmitCallback();
                this.clearForm()
            }
        },
        computed: {
            ...mapState('callbackStore', {
                // form: state => state.form,
                submitSuccess: state => state.submitCallback,
            }),
            nameErrors() {
                const errors = [];
                if (!this.$v.form.name.$dirty) return errors;
                !this.$v.form.name.minLength && errors.push('Должно быть не меньше 2 символов');
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
                    minLength: minLength(2),
                    maxLength: maxLength(40)
                },
                phone: {
                    required,
                    minLength: minLength(18),
                    maxLength: maxLength(18)

                }
            }
        },
        mounted() {
            console.log(this.inModal, this.captchaKey)
        }
    }
</script>

<style scoped>
    .main-callback-form-success .icon {
        width: 100px;
        margin-right: 15px;
    }

    .main-callback-form-success {
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .main-callback-form-success-block {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-grow: 1;
    }

    .main-callback-form-success-text {
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: left;
    }

    .main-callback-form-success-title {
        font-size: 1.3rem;
        color: #3eb39e;;
    }

    .main-callback-form-success-btn span {
        font-size: 0.8rem;
        cursor: pointer;
    }

</style>
