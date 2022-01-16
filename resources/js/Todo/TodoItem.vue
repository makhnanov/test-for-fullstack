<template>
    <div class="todo__list-item" :class="{'todo__list-item_completed': todo.completed}" @click="toggleComplete">
        <div class="todo__list-item-info">
            <div class="todo__list-item-info-title" v-html="todo.title"></div>
            <div class="todo__list-item-info-description" v-html="todo.description"></div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'TodoItem',
    props: {
        todo: Object,
    },
    methods: {
        toggleComplete() {
            this.todo.completed = !this.todo.completed
            axios.patch('http://localhost/api/todo', {
                params: {
                    id: this.todo.id,
                    completed: this.todo.completed
                }
            })
            this.$emit('sort')
        }
    }
}
</script>
