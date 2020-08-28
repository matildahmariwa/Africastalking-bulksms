import Vue from "vue";
import Vuex from "vuex";
import axios from 'axios'


Vue.use(Vuex);
export default new Vuex.Store({
    state: {
       contacts: [],
       groups:[],
       subs:[],
       
    },


   
    mutations: {
        CREATE_CONTACT(state, contact) {
            state.contacts.unshift(contact)
        },
        CREATE_GROUP(state, group) {
            state.groups.unshift(group)
        },
        CREATE_SUB(state, sub) {
            state.subs.unshift(sub)
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
        createGroup({commit}, group) {
            console.log(group);
            axios.post('/api/groups', group)
                .then(res => {
                    console.log(res);
                    commit('CREATE_GROUP', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
        createSub(state, sub) {
            console.log(sub);
            axios.post('/api/addsub', sub)
                .then(res => {
                    console.log(res);
                    state.commit('CREATE_SUB', res.data)
                }).catch(err => {
                console.log(err)
            })
        },
     
    }


});