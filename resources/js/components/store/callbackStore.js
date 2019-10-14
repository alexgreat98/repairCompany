import axios from 'axios';

const state = {
    callback: [],
    openedItem: null,
};

// getters
const getters = {};

// actions
const actions = {
    async getAllItems({commit}) {
        await axios.get('/api/callback')
            .then(({data}) => {
                commit('setItems', {items: data.items});
            })
            .catch(({error}) => {
                console.log(error);
            });
    },
    async getItemInfo({commit, state}, id) {
        await axios.get('/api/callback/' + id + '/edit')
            .then(({data}) => {
                commit('setEditedItem', {items: data.item});
            })
    },
    async updateItem({commit, state}) {
        await axios.put('/api/callback/' + state.openedItem.id, state.openedItem)
            .then(({data}) => {
                return data
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async deleteItem({commit, state}, id) {
        await axios.delete('/api/callback/' + id)
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
    setItems(state, {items}) {
        state.callback = items;
    },
    clearEditedItem(state) {
        state.openedItem = null
    },
    setEditedItem(state, {items}) {
        state.openedItem = items;
    },
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
