<template>
  <div>
      <h3>Enter contact details</h3>
      <form>
          <div>
    <input  type="text" v-model="contact.first_name" placeholder="Enter first name">
    </div>
    <div>
    <input  type="text" v-model="contact.last_name" placeholder="Enter last name">
    </div>
    <div>
    <input  type="text" v-model="contact.residence" placeholder="Enter county name">
    </div>
    <div>
    <input  type="text" v-model="contact.phone_number" placeholder="Enter phone number">
    <div>
    <input  type="text" v-model="contact.id_number" placeholder="Enter id number">
    </div>
    </div>
      </form>
       <button v-on:click="createContact">Add contact</button>
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