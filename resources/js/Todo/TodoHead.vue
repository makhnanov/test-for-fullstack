<template>
    <div class="todo__head">
        <div class="todo__list_h">
            <h2 class="todo__head-title">
                <slot></slot>
            </h2>
            <input v-if="totalToDoCount" type="text" placeholder="Search ..." v-model="search">
        </div>
        <div style="margin-bottom: 20px; display: flex; justify-content: space-between">
            <input type="text" style="width: calc(100% - 80px);" placeholder="Title" v-model="title">
            <button @click="add" class="btn">Add</button>
        </div>
        <div>
            <textarea placeholder="Description" style="width: 100%;margin-bottom: 20px;" v-model="description">
            </textarea>
        </div>
    </div>
</template>

<script>
export default {
    name: "TodoHead",
    props: [ 'totalToDoCount' ],
    data: function () {
        return {
            search: '',
            title: '',
            description: '',
        }
    },
    methods: {
        add() {
            if (!this.title) {
                alert('Title can\'t be empty.');
                return
            }
            if (!this.description) {
                alert('Description can\'t be empty.');
                return
            }
            axios.post('http://localhost/api/todo', {
                params: {
                    title: this.title,
                    description: this.description,
                }
            }).then(response => {
                this.$emit('getApiToDo')
            })
        },
    },
    watch: {
        search: function (val) {
            this.$emit('search', val)
        },
    }
}
</script>
