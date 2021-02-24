<template>  
     <div>         
        <li class="list-group-item" :class="className"><slot></slot></li>
        <small class="float-right" :class="badgeClass">you</small>  
    </div>
</template>

<script>
    export default {
        props:[
            'color',
            'badgeColor'
        ],
        computed:{
            className(){
                return 'list-group-item-' + this.color;
            },
            badgeClass(){
                return 'badge badge-' + this.badgeColor
            }
        },  
        mounted() {
            console.log('message.vue mounted.')
        }
    }
</script>
