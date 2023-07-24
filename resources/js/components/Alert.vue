<template>
    <v-alert :type="type" :title="title" :text="text" closable></v-alert>
</template>

<script>
    export default {
        props: [
            'type',
            'title',
            'text'
        ]
    }
</script>