import { parseJSON } from "jquery";

export default {
    SET_VERSION(state, payload) {
        state.pageVersion = parseJSON(payload);
    },
    SET_EMAIL(state, payload) {
        state.email = payload;
    },
    SET_ERROR_MESSAGE(state, payload) {
        state.errorMessage = payload;
    },
    EMAIL_INVALID(state) {
        state.errorMessage = "Please enter a valid email address";
    },
    RESET_ERRORS(state) {
        state.errorMessage = "";
    }
};
