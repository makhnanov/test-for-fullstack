<template>
    <div class="todo__list-item" :class="{'todo__list-item_completed': todo.completed}" @click="toggleComplete">
        <div class="todo__list-item-info">
            <h4 class="todo__list-item-info-title">{{ todo.title }}</h4>
            <h6 class="todo__list-item-info-description">{{ todo.description }}</h6>
        </div>
        <!-- /.todo__list-item-info -->
    </div>
    <!-- /.todo__list-item -->
</template>

<script>
    export default {
        name: "TodoItem",
        props: {
            todo: Object,
        },
        methods: {
            toggleComplete(){
                this.todo.completed = !this.todo.completed
            }
        }
    }
</script>
