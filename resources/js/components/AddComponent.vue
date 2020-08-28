<template>
    <div>
        <h1>Add contact to group</h1>
        <form >
       <div>
          <label>Select Contact:</label>
                            <select class='form-control' v-model='sub.contact' @change='getContacts()'>
                              <option value='0'>Select Contact</option>
                             <option v-bind:value="data.id" v-for='data in contacts' :key="data.id">{{ data.first_name }}</option>
                            </select>
       </div>
       <div>
           <label>Select Group:</label>
           <select class='form-control' v-model='sub.group' @change='getGroups()'>
                              <option value='0'>Select Group</option>
                             <option v-bind:value="data.id" v-for='data in groups' :key="data.id">{{ data.group_name }}</option>
                            </select>
       </div>
        </form>
         <button v-on:click="createSub">Join group</button>
    </div>
</template>
<script>  
    export default {
        
        data(){
            return {
                group:0,
                contact: 0,
                contacts: [],
                groups: [],
                sub:{},
            }
        },
         mounted (){
            this.getContacts()
              this.getGroups()
        },
        methods:{
        
          getContacts: function(){
              axios.get('/api/getusers')
              
              .then(function (response) {
                //    console.log(response)
                 this.contacts = response.data;
                 
              }.bind(this));
              
         
            },
            getGroups: function(){
              axios.get('/api/getgroups')
              
              .then(function (response) {
                   console.log(response)
                 this.groups = response.data;
                 
              }.bind(this));
              
         
            },
            createSub(sub) {
                this.$store.dispatch('createSub', this.sub);
                this.sub = '';
                
            }
        
        },
        
    }
</script>