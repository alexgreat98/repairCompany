import axios from 'axios';

const state = {
    form: (localStorage.form) ? JSON.parse(localStorage.form) : {
        name: '',
        phone: '',
    },
    submit: (localStorage.submitForm) ? localStorage.submitForm : 0,
    submitCallback: (localStorage.submitCallback) ? localStorage.submitCallback : 0,
    dialogCallback: false
};

// getters
const getters = {};

// actions
const actions = {

    async storeCallback({commit, state}, order) {
        let formData = Object.assign(state.form);
        formData['order'] = order;
        await axios.post('/api/callback/store', formData)
            .then(({data}) => {
                commit('saveForm');
                return data
            })
            .catch(({error}) => {
                console.log(error);
            })
    },


};

// mutations
const mutations = {
    clearForm(state) {
        state.form = {
            name: '',
            phone: null,
        };
        localStorage.form = JSON.stringify(state.form);
        localStorage.submitForm = state.submit;
    },
    saveForm(state) {
        localStorage.form = JSON.stringify(state.form);

    },

    saveSubmit(state) {
        state.submit = 1;
        localStorage.submitForm = state.submit;
    },
    clearSubmit(state) {
        state.submit = 0;
        localStorage.submitForm = state.submit;
    },
    saveSubmitCallback(state) {
        state.submitCallback = 1;
        localStorage.submitCallback = state.submitCallback;
    },
    clearSubmitCallback(state){
        state.submitCallback = 0;
        localStorage.submitCallback = state.submitCallback;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
