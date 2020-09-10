export default () => {
    const baseURL = "/api/v1/";

    const httpClientConfig = {
        baseURL
    };

    console.log(baseURL);
    return window.axios.create(httpClientConfig);
};
