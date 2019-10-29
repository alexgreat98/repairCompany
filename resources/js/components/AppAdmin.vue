<template>
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="drawer"
            :clipped="$vuetify.breakpoint.lgAndUp"
            app
        >
            <v-list dense>
                <template v-for="item in navItems">
                    <v-row
                        v-if="item.heading"
                        :key="item.heading"
                        align="center"
                    >
                        <v-col cols="6">
                            <v-subheader v-if="item.heading">
                                {{ item.heading }}
                            </v-subheader>
                        </v-col>
                        <v-col
                            cols="6"
                            class="text-center"
                        >
                            <a
                                href="#!"
                                class="body-2 black--text"
                            >EDIT</a>
                        </v-col>
                    </v-row>
                    <v-list-group
                        :to="item.link"
                        v-else-if="item.children"
                        :key="item.text"
                        v-model="item.model"
                        :prepend-icon="item.model ? item.icon : item['icon-alt']"
                        append-icon=""
                    >
                        <template v-slot:activator>
                            <v-list-item>
                                <v-list-item-content>
                                    <v-list-item-title>
                                        {{ item.text }}
                                    </v-list-item-title>
                                </v-list-item-content>
                            </v-list-item>
                        </template>
                        <v-list-item
                            v-for="(child, i) in item.children"
                            :key="i"
                            @click=""
                        >
                            <v-list-item-action v-if="child.icon">
                                <v-icon>{{ child.icon }}</v-icon>
                            </v-list-item-action>
                            <v-list-item-content>
                                <v-list-item-title>
                                    {{ child.text }}
                                </v-list-item-title>
                            </v-list-item-content>
                        </v-list-item>
                    </v-list-group>
                    <v-list-item
                        v-else
                        :to="item.link"
                        :key="item.text"
                        @click=""
                    >
                        <v-list-item-action>
                            <v-icon>{{ item.icon }}</v-icon>
                        </v-list-item-action>
                        <v-list-item-content>
                            <v-list-item-title>
                                {{ item.text }}
                            </v-list-item-title>
                        </v-list-item-content>
                    </v-list-item>
                </template>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar
            :clipped-left="$vuetify.breakpoint.lgAndUp"
            app
            color="blue darken-3"
            dark
            class="justify-space-between"
        >
            <v-toolbar-title
                style="width: 300px"
                class="ml-0 pl-4"
            >
                <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <span class="hidden-xs-only">Администрирование</span>
            </v-toolbar-title>
            <v-btn small text route-to="/" href="/" target="_blank">Сайт
                <v-icon>mdi-open-in-new</v-icon>
            </v-btn>
            <div class="flex-grow-1"></div>
            <v-btn small color="red" text @click="logout">Выход</v-btn>


        </v-app-bar>
        <v-content>
            <v-container
                class="fill-height d-flex justify-center align-start"
                fluid
            >

                <router-view></router-view>
            </v-container>
        </v-content>

        <!--errors snackbar-->
        <v-snackbar
            v-model="$root.errorsSnackbar"
            color="error"
            right
            :timeout="3000"
            top
        >
            {{ $root.errorsSnackbarText }}
            <v-btn
                dark
                @click="$root.errorsSnackbar = false"
                icon
            >
                <v-icon>mdi-close</v-icon>
            </v-btn>
        </v-snackbar>


    </v-app>
</template>

<script>
    export default {
        props: {
            source: String,
        },
        data: () => ({
            dialog: false,
            drawer: null,
            navItems: [
                {icon: 'phone', text: 'Заказы', link: 'callback'},
                {icon: 'mdi-clipboard-list-outline', text: 'Услуги', link: 'services'},
                {icon: 'mdi-image-filter', text: 'Портфолио', link: 'portfolios'},
                {icon: 'mdi-currency-usd', text: 'Прайсы', link: 'prices'},
                {icon: 'settings', text: 'Параметры', link: 'parameters'},
                {icon: 'mdi-account-card-details-outline', text: 'Пользователи', link: 'users'},
                // { icon: 'help', text: 'Help' },
                // { icon: 'phonelink', text: 'App downloads' },
                // { icon: 'keyboard', text: 'Go to the old version' },
            ],
        }),
        methods: {
            logout() {
                this.axios.post('logout').then(data => {
                    console.log(data);
                })
                window.location = '/';
            }
        }
    }
</script>
