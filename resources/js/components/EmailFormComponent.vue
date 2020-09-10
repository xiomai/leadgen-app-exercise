<template>
    <form class="form">
        <input
            v-model="_email"
            type="email"
            class="form__field"
            placeholder="Your E-Mail Address"
        />
        <button
            type="button"
            @click.prevent="handleSendEmail"
            class="btn btn--primary btn--inside uppercase"
        >
            SEND ME THE LIST
        </button>
        <p class="error-p" v-if="hasError">{{ errorMessage }}</p>
        <p v-else>&nbsp;</p>
    </form>
</template>

<script>
import Vue from "vue";
import VueSweetalert2 from "vue-sweetalert2";
import { mapGetters, mapMutations, mapActions } from "vuex";
import "sweetalert2/dist/sweetalert2.min.css";

const options = {
    confirmButtonColor: "#7f8ff4",
    cancelButtonColor: "salmon"
};
Vue.use(VueSweetalert2, options);

export default {
    computed: {
        ...mapGetters("form", [
            "email",
            "conversionParams",
            "isEmail",
            "hasError",
            "errorMessage"
        ]),
        _email: {
            get() {
                return this.email;
            },
            set(value) {
                this.RESET_ERRORS();
                this.SET_EMAIL(value);
            }
        }
    },
    methods: {
        ...mapMutations("form", ["SET_EMAIL", "RESET_ERRORS"]),
        ...mapActions("form", ["handleSendEmail"])
    }
};
</script>

<style scoped>
.error-p {
    margin-top: 3px;
    border-radius: 5px;
    padding: 5px;
    text-align: center;
    width: 70%;
    background-color: salmon;
    color: white;
    font-weight: bold;
    text-transform: none;
    font-size: 1em;
}
</style>
