import Vue from "vue";
import Vuex from "vuex";
import axios from 'axios'


Vue.use(Vuex);
export default new Vuex.Store({
    state: {
       contacts: [],
    },


   
    mutations: {
        CREATE_CONTACT(state, contact) {
            state.contacts.unshift(contact)
        },
       
    },

    actions: {
        createContact({commit}, contact) {
            console.log(contact);
            axios.post('/api/contacts', contact)
                .then(res => {
                    console.log(res);
                    commit('CREATE_CONTACT', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
     
    }


});