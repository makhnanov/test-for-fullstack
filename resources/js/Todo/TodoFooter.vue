<template>
    <div class="todo__footer">
        <button v-if="forDeleteCount" @click="realDelete" class="btn">Delete from db ({{ forDeleteCount }})</button>
        <button v-if="forDeleteCount" @click="fakeDelete" class="btn">Remove ({{ forDeleteCount }})</button>
    </div>
</template>

<script>
export default {
    name: 'TodoFooter',
    props: [ 'forDeleteCount' ],
    methods: {
        realDelete: function () {
            console.log('realDelete')
            this.$emit('realDelete');
        },
        fakeDelete: function () {
            console.log('fakeDelete')
            this.$emit('fakeDelete');
        },
    },
}
</script>

<style>
.todo__footer {
    display: flex;
    padding-top: 20px;
    justify-content: space-between;
}
</style>
