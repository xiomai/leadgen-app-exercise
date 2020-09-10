export default {
    async handleSendEmail({ getters, commit }) {
        if (!getters.isEmail) {
            commit("EMAIL_INVALID");
            return;
        }

        try {
            const res = await axios.post(
                "/api/v1/lp/convert",
                getters.conversionParams
            );
            console.log(res);
            commit("RESET_ERRORS");
        } catch (error) {
            console.log(error.message);
        }
    }
};
