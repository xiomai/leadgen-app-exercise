export default {
    email: state => state.email,
    isEmail: state => {
        const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(String(state.email).toLowerCase());
    },
    conversionParams: state => ({
        email: state.email
    }),
    errorMessage: state => state.errorMessage,
    hasError: state => !!state.errorMessage
};
