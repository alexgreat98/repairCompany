import axios from 'axios';

const state = {
    submit: (localStorage.submitForm) ? localStorage.submitForm : 0,
    submitCallback: (localStorage.submitCallback) ? localStorage.submitCallback : 0,
    dialogCallback: false
};

// getters
const getters = {};

// actions
const actions = {

    async storeCallback({commit, state}, {form, order, comment}) {
        console.log('org_phone', form.phone);

        form.phone = parseInt(form.phone.replace(/[()]|-|\s+|\+/g, ''));
        console.log('org_phone', form.phone);
        let formData = Object.assign(form);
        formData['order'] = order;
        formData['token'] = localStorage.token;
        if (comment) formData['comment'] = comment;
        console.log(formData);
        await axios.post('/api/callback/store', formData)
            .then(({data}) => {
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
        localStorage.submitForm = state.submit;
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
    clearSubmitCallback(state) {
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
