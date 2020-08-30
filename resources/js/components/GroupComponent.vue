<template>
<div>
    
<form >
     <h3>Enter Group information</h3>

         <div class="form-group">

      <label  class="grey-text">Enter group name</label>      
    <input class='form-control'  v-model="group.group_name"  placeholder="Enter group name">
    
        <label  class="grey-text">Enter group description</label>
   <textarea class='form-control' v-model="group.description" placeholder="enter description"></textarea>
    
         </div>
      </form>
       <button class="btn btn-primary" v-on:click="createGroup">Add group</button>
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