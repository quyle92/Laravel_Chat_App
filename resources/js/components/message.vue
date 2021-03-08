<template>  
     <div>         
        <small  :class="badgeClass" >{{user}} : {{time}}</small> 
        <span id='time'>{{time}}</span>
        <li class="list-group-item" :class="className" style="margin:1.1em 0;"><slot></slot></li>
         
    </div>

</template>

<script>
    export default {
        props:[
            'color',
            'badgeColor',
            'user',
            'nguoiGui',
            'time'
        ],
        computed:{
            className(){
                return this.user == this.nguoiGui ? 'list-group-item-' + this.color[0] : 'list-group-item-' + this.color[1];
            },
            badgeClass(){
                //return 'badge badge-' + this.badgeColor;
                return this.user == this.nguoiGui ? 'float-right badge badge-' + this.badgeColor : 'float-left badge badge-' + this.badgeColor;
            }
        },  
        mounted() {
            //console.log('message.vue mounted.')
        }
    }
</script>

<style>
span#time {
    font-size: 10px;
}
</style>