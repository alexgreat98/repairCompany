<template>
    <div>
        <v-dialog
            v-model="$root.dialogCallback"
            width="500"
        >
            <template v-slot:activator="{ on }">
                <v-btn
                    class="btn-primary top-callback-btn"
                    v-on="on"
                    color="orange darken-3"
                    dark
                >
                    Оставить заявку
                </v-btn>
            </template>

            <v-card class="callback-in-modal">
               <callback-client inModal></callback-client>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    import CallbackClient from "./CallbackClient";
    export default {
        name: "CallbackModalClient",
        components: {CallbackClient},
        data(){
            return {
            }
        }
    }
</script>

<style scoped>

</style>
