import axios from 'axios';

const state = {
    form: (localStorage.form) ? JSON.parse(localStorage.form) : {
        name: '',
        phone: null,
    },
    submit: (localStorage.submitForm) ? localStorage.submitForm : 0
};

// getters
const getters = {};

// actions
const actions = {

    async storeCallback({commit, state}) {
        await axios.post('/api/callback/store', state.form)
            .then(({data}) => {
                commit('saveForm');
                commit('saveSubmit');
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
        state.submit = 0;
        localStorage.form = JSON.stringify(state.form);
        localStorage.submitForm = state.submit;
    },
    saveForm(state) {
        localStorage.form = JSON.stringify(state.form);

    },
    saveSubmit(state) {
        state.submit = 1;
        localStorage.submitForm = state.submit;
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
