<template>
<div>
     <h3>Enter Group information</h3>
<form>
          <div>
            
    <input  v-model="group.group_name"  placeholder="Enter group name">
    </div>
    <div>
   <textarea v-model="group.description" placeholder="enter description"></textarea>
    </div>
    
      </form>
       <button v-on:click="createGroup">Add group</button>
</div>
      </template>
 <script>
    export default {
        data(){
            return{
                group:{},
            }
        },
        methods: {
            createGroup(group) {
                this.$store.dispatch('createGroup', this.group);
                this.group = '';
               
            },
            getContacts: function(){
              axios.get('/api/getusers')
              
              .then(function (response) {
                //    console.log(response)
                 this.contacts = response.data;
                 
              }.bind(this));
              
         
            },
        },
    }
</script>