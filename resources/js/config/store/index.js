import Vue from "vue";
import Vuex from "vuex";

import form from "./form";

Vue.use(Vuex);

const formModule = {
    namespaced: true,
    state: form.state,
    mutations: form.mutations,
    getters: form.getters,
    actions: form.actions
};

const store = new Vuex.Store({
    modules: {
        form: formModule
    }
});

export default store;
