<template>
    <div class="todo">

        <TodoHead>
            Todo list
        </TodoHead>

        <div class="todo__list">
            <TodoItem v-for="todo in todos" :key="todo.id" :todo="todo" />
        </div>
        <!-- /.todo__list -->

    </div>
    <!-- /.todo -->
</template>

<script>
    import TodoHead from "./TodoHead"
    import TodoItem from "./TodoItem"


    export default {
        name: "TodoApp",
        data(){
            return {
                todos: [
                    {
                        id: 1,
                        title: "delectus aut autem",
                        description: "laboriosam mollitia et enim quasi adipisci quia provident illum",
                        completed: false,
                    },
                    {
                        id: 2,
                        title: "quo laboriosam deleniti aut qui",
                        description: null,
                        completed: false,
                    },
                    {
                        id: 3,
                        title: "laboriosam mollitia et enim quasi adipisci quia provident illum",
                        description: null,
                        completed: true,
                    },
                    {
                        id: 4,
                        title: "repellendus sunt dolores architecto voluptatum",
                        description: "accusamus eos facilis sint et aut voluptatem",
                        completed: false,
                    }
                ],
            }
        },
        components: {
            TodoHead,
            TodoItem,
        }
    }
</script>
