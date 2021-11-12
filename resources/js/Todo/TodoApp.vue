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
                        title: "Сделайте так, чтобы Vue получал список дел из БД (из таблицы todos)",
                        description: "laboriosam mollitia et enim quasi adipisci quia provident illum",
                        completed: false,
                    },
                    {
                        id: 4,
                        title: "repellendus sunt dolores architecto voluptatum",
                        description: "accusamus eos facilis sint et aut voluptatem",
                        completed: true,
                    },
                    {
                        id: 2,
                        title: "Добавьте сортировку списка дел. Все завершённые дела должны быть снизу",
                        description: null,
                        completed: false,
                    },
                    {
                        id: 3,
                        title: "Сделайте так, чтобы по нажатию на кнопку Delete все завершённые дела удалялись из массива. Удалять из БД их не нужно",
                        description: null,
                        completed: true,
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
