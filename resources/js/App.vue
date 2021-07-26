<template>
<div>
    <WorkInProgress class="page d-flex flex-column justify-content-center align-items-center"/>
</div>
</template>

<script>
import WorkInProgress from './components/WorkInProgress.vue';
export default {
    name: 'App',
    components: {
        WorkInProgress,

    }
}
</script>

<style lang="scss">
    .page {
        height: 100vh;
    }
</style>