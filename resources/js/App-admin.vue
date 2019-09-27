<template>
    <div class="container-fluid">
        <!-- Content here -->
    </div>
</template>

<script>
    export default {
        props: {
            source: String,
        },
        data: () => ({
            drawer: null,
            drawerRight: null,
            right: false,
            left: false,
        }),
    }
</script>
