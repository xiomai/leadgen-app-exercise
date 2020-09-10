export default {
    SET_EMAIL(state, payload) {
        state.email = payload;
    },
    EMAIL_INVALID(state) {
        state.errorMessage = "Please enter a valid email address";
    },
    RESET_ERRORS(state) {
        state.errorMessage = "";
    }
};
