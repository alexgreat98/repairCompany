import axios from 'axios';

const state = {
    prices: [],
    types: [],
    editedPrice: {
        id: '',
        name: '',
        price: '',
        type: '',
        service: ''
    },
    services: null
};

// getters
const getters = {

};

// actions
const actions = {
    async getAllPrices({commit}) {
        await axios.get('/api/prices')
            .then(({data}) => {
                commit('setPrices', {items: data.prices});
            })
            .catch(({error}) => {
                console.log(error);
            });
    },
    async createPriceInfo({commit}) {
        commit('clearEditedPrice');
        await axios.get('/api/prices/create')
            .then(({data}) => {
                commit('clearEditedPrice');
                commit('setTypes', {items: data.type});
                commit('setServices', {items: data.services});
            })
            .catch(({error}) => {
                console.log(error);
            })

    },
    async createPrice({commit, state}) {
        await axios.post('/api/prices', state.editedPrice)
            .then(({data}) => {
                commit('setPrices', {items: data.prices});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async getPriceInfo({commit, state}, id) {
        await axios.get('/api/prices/' + id + '/edit')
            .then(({data}) => {
                commit('setEditedPrice', {items: data.price});
                commit('setTypes', {items: data.type});
                commit('setServices', {items: data.services});
            })
    },
    async updatePrice({commit, state}) {
        await axios.put('/api/prices/' + state.editedPrice.id, state.editedPrice)
            .then(({data}) => {
                commit('setPrices', {items: data.prices});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async deletePrice({commit, state}, id) {
        await axios.delete('/api/prices/' + id)
            .then(({data}) => {
                commit('setPrices', {items: data.prices});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },

};

// mutations
const mutations = {
    setPrices(state, {items}) {
        state.prices = items;
    },
    clearEditedPrice(state){
        state.editedPrice = {
            id: null,
            name: '',
            price: '',
            type: '',
            service: ''
        }
    },
    setEditedPrice(state, {items}) {
        state.editedPrice = items;
    },
    setTypes(state, {items}) {
        state.types = items;
    },
    setServices(state, {items}) {
        state.services = items;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
