<template>  
	 <li ><slot></slot></li>
</template>  
 <script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>