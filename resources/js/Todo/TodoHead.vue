<template>
    <div class="todo__head">
        <h2 class="todo__head-title"><slot></slot></h2>
        <button class="btn">Add</button>
    </div>
    <!-- /.todo__head -->
</template>

<script>
    export default {
        name: "TodoHead"
    }
</script>
