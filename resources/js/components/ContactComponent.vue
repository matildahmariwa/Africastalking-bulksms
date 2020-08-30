<template>
  <div>
      
      <form >
           <div class="form-group">
          <p class="h4 text-center mb-4">Create contact</p>

         <label  class="grey-text">Enter first contact name</label>     
    <input class='form-control'  type="text" v-model="contact.first_name" placeholder="Matildah">
   
      <label  class="grey-text">Enter contact last name</label>
    <input class='form-control'  type="text" v-model="contact.last_name" placeholder="Njumwa">
  
   <label  class="grey-text">Enter county of residence</label> 
    <input class='form-control' type="text" v-model="contact.residence" placeholder="Isiolo">
 
   <label  class="grey-text">Enter phone number</label> 
    <input class='form-control' type="text" v-model="contact.phone_number" placeholder="+25472814..">

  <label for="defaultFormLoginEmailEx" class="grey-text">Enter ID number</label>

    <input class='form-control'  type="text" v-model="contact.id_number" placeholder="33067836">
 
           </div>
      </form>
       <button class="btn btn-primary" v-on:click="createContact">Add contact</button>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                contact:{},
            }
        },
        methods: {
            createContact(contact) {
                this.$store.dispatch('createContact', this.contact);
                this.contact = '';
                alert('A contact has been added!')
            }
        },
    }
</script>
