import axios from 'axios';

const state = {
    items: [],
    editedItem: {
        id: null,
        name: '',
        text: '',
        type: null,
        slug: null,
        sort: 250,
        show_on_main: false
    },
    editedItemImages: null
};

// getters
const getters = {};

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
                commit('setEditedItem', {items: data.item});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async updateItemInfo({commit, state}, id) {
        await axios.get('/api/services/' + id + '/edit')
            .then(({data}) => {
                commit('setEditedItem', {items: data.item});
            })
    },
    async updateItem({commit, state}) {
        await axios.put('/api/services/' + state.editedItem.id, state.editedItem)
            .then(({data}) => {
                commit('setEditedItem', {items: data.item});
            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async deleteItem({commit, state}, id) {
        await axios.delete('/api/services/' + id)
            .then(({data}) => {

            })
            .catch(({error}) => {
                console.log(error);
            })
    },
    async getItemImage({commit}, id) {
        await axios.get('/api/services_images/' + id)
            .then(({data}) => {
                commit('setEditedItemImages', {images: data.images});
            })
    },
    async deleteItemImage({commit, state}, id) {
        await axios.delete('/api/services_images_detach/' + id)
            .then(({data}) => {

            })
            .catch(({error}) => {
                console.log(error);
            })
    }

};

// mutations
const mutations = {
    setItems(state, {items}) {
        state.items = items;
    },
    clearEditedItem(state) {
        state.editedItem = {
            id: null,
            name: '',
            price: '',
            type: null,
            slug: null,
            sort: 250,
            show_on_main: false
        };
        state.editedItemImages = null
    },
    setEditedItem(state, {items}) {
        state.editedItem = items;
    },
    setEditedItemImages(state, {images}) {
        state.editedItemImages = images
    },

};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
}
