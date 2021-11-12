import './bootstrap'
import Vue from "vue"

Vue.component("todo-app", require('./Todo/TodoApp').default);

const todo = new Vue({
    el: '#app',
});
