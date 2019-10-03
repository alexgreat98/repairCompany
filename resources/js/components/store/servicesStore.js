import axios from 'axios';

const state = {
    items: [],
    editedItem: {
        id: '',
        name: '',
        text: '',
    },
    editedItemPrices: []
};

// getters
const getters = {

};

// actions
const actions = {
    async getAllItems({commit}) {
        await axios.get('/api/services')
            .then(({data}) => {
                commit('setItems', {items: data.items});
            })
            .catch(({error}) => {
                console.log(error);
            });
    },
    async createItemInfo({commit}) {
        await axios.get('/api/services/create')
            .then(({data}) => {
                commit('clearEditedItem');
            })
            .catch(({error}) => {
                console.log(error);
            })

    },
    async createItem({commit, state}) {
        await axios.post('/api/services', state.editedItem)
            .then(({data}) => {
                commit('setItems', {items: data.items});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async updateItemInfo({commit, state}, id) {
        await axios.get('/api/services/' + id + '/edit')
            .then(({data}) => {
                commit('setEditedItem', {items: data.item});
                commit('setEditedItemPrices', {items: data.prices});
            })
    },
    async updateItem({commit, state}) {
        await axios.put('/api/services/' + state.editedItem.id, state.editedItem)
            .then(({data}) => {
                commit('setItems', {items: data.items});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async deleteItem({commit, state}, id) {
        await axios.delete('/api/services/' + id)
            .then(({data}) => {
                commit('setItems', {items: data.items});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },

};

// mutations
const mutations = {
    setItems(state, {items}) {
        state.items = items;
    },
    clearEditedItem(state){
        state.editedItem = {
            id: null,
            name: '',
            price: '',
            type: '',
        }
    },
    setEditedItem(state, {items}) {
        state.editedItem = items;
    },
    setEditedItemPrices(state, {items}) {
        state.editedItemPrices = items;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
