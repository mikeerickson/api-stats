<template id="v-stat-form">
    <div>
        <pre>Component Data</pre>
    </div>
</template>

<script id="v-stat-form">
    export default {
    	props: ['propData'],
    	data() {
    		return {}
        }
    	mounted() {
    		console.log('Stat Form Component Mounted')
        }
    }
</script>

<style scoped id="v-stat-form">
    pre {
        font-family: 'Source Code Pro', sans-serif;
        font-size: 13px;
    }
</style>