import EventBus from "@/config/EventBus";

export default {
    parseVersion({ commit }, version) {
        commit("SET_VERSION", version);
    },
    async handleSendEmail({ getters, commit }) {
        const { isEmail, pageVersion } = getters;
        if (!isEmail) {
            commit("EMAIL_INVALID");
            return;
        }

        EventBus.$emit("show-loading-modal", true);

        try {
            const url = `/api/v1/lp/${pageVersion.id}/convert`;

            const res = await axios.post(url, getters.conversionParams);
            EventBus.$emit("user-convert", res);
            commit("RESET_ERRORS");
        } catch (error) {
            console.log(error.message);
            const { message } = error.response.data;
            commit("SET_ERROR_MESSAGE", message);
            EventBus.$emit("show-loading-modal", false);
        }
    }
};
