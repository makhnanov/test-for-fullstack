<template>
    <div class="todo">
        <TodoHead :total-to-do-count="totalToDoCount" v-on:getApiToDo="getApiToDo" v-on:search="search" >
            Todo list
        </TodoHead>
        <div class="todo__list">
            <transition-group name="flip-list" tag="div">
                <slot>
                <TodoItem v-for="todo in todos" :key="todo.id" :todo="todo" v-on:sort="sort"/>
                </slot>
            </transition-group>
        </div>
        <TodoFooter :forDeleteCount="forDeleteCount" v-on:fakeDelete="fakeDelete" v-on:realDelete="realDelete"/>
    </div>
</template>

<script>
import TodoHead from "./TodoHead"
import TodoFooter from "./TodoFooter"
import TodoItem from "./TodoItem"

export default {
    name: "TodoApp",
    components: {
        TodoHead,
        TodoItem,
        TodoFooter,
    },
    data: function () {
        return {
            todos: [],
        }
    },
    mounted() {
        this.getApiToDo()
    },
    methods: {
        getApiToDo: function () {
            axios.get('http://localhost/api/todo')
                .then(response => {
                    this.todos = response.data.todos
                    this.sort()
                })
        },
        sort: function () {
            let unCompleted = [], completed = []
            for (let i in this.todos) {
                this.todos[i].completed ? completed.push(this.todos[i]) : unCompleted.push(this.todos[i])
            }
            this.todos = unCompleted.concat(completed)
        },
        fakeDelete: function () {
            let unCompleted = []
            for (let i in this.todos) {
                if (!this.todos[i].completed) {
                    unCompleted.push(this.todos[i])
                }
            }
            this.todos = unCompleted
        },
        realDelete: function () {
            let completed = []
            for (let i in this.todos) {
                if (this.todos[i].completed) {
                    completed.push(this.todos[i].id)
                }
            }
            axios.delete('http://localhost/api/todo', {
                params: {
                    completed: completed
                }
            }).then(response => {
                this.todos = response.data.todos
                this.sort()
            })
        },
        search: function (val) {
            for (let i in this.todos) {
                if (this.todos[i].title) {
                    this.todos[i].title = this.todos[i].title.replace(/<\/?[^>]+(>|$)/g, "")
                }
                if (this.todos[i].description) {
                    this.todos[i].description = this.todos[i].description.replace(/<\/?[^>]+(>|$)/g, "")
                }
            }
            if (!val) {
                return
            }
            for (let i in this.todos) {
                if (this.todos[i].title) {
                    this.todos[i].title = this.todos[i].title.replace(
                        new RegExp(val, 'g'),
                        '<span style="background-color: #83831c">' + val + '</span>'
                    )
                }
                if (this.todos[i].description) {
                    this.todos[i].description = this.todos[i].description.replace(
                        new RegExp(val, 'g'),
                        '<span style="background-color: #83831c">' + val + '</span>'
                    )
                }
            }
        }
    },
    computed: {
        forDeleteCount: function () {
            let forDelete = 0
            for (let i in this.todos) {
                if (this.todos[i].completed) {
                    forDelete++
                }
            }
            return forDelete
        },
        totalToDoCount: function () {
            return this.todos.length
        }
    }
}
</script>

<style>
.flip-list-move {
    transition: transform 0.13s cubic-bezier(.42, 0, .58, 1);
}
</style>
