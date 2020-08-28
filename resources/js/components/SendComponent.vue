<template>
    <div>
        <h4>Send Message to group</h4>
        <form >
            <div>
           <label>Select Group:</label>
           <select class='form-control' name="group_name" id="group_name" v-model="group" @change='getGroups()'>
                              <option value='0'>Select Group</option>
                             <option v-bind:value="data.group_name" v-for='data in groups' :key="data.group_name">{{ data.group_name }}</option>
                            </select>
                          
       </div>
       <div>
           <label>Enter Message description:</label>
  <textarea name="" id="" cols="30" rows="10"></textarea>

       </div>
        </form>
       <button v-on:click="sendsms" class="button">Send message</button>
    </div>
</template>
<script>  
    export default {
        
        data(){
            return {
                group:0,
                groups: [],
                
            }
        },
         mounted (){
            // this.getContacts()
              this.getGroups()
        },
        methods:{
        
          sendsms: function(){
              
              axios.post('/api/sms', {
                group_name:'Farmers',
                            
                    headers: {
                        'Content-Type': 'application/json',
                    }
                }
                        
                            )
                .then((response) => {
                console.log(response);
                }, (error) => {
                console.log(error);
                });
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