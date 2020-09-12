<template>
  <form class="form">
    <input v-model="_email" type="email" class="form__field" placeholder="Your E-Mail Address" />
    <button
      type="button"
      @click.prevent="handleSendEmail"
      class="btn btn--primary btn--inside uppercase"
      :style="ctaColor"
    >{{ ctaText }}</button>
    <p class="error-p" v-if="hasError">{{ errorMessage }}</p>
    <p v-else>&nbsp;</p>
  </form>
</template>

<script>
import { mapGetters, mapMutations, mapActions } from "vuex";
import EventBus from "@/config/EventBus";
import Swal from "@/config/modal/sweetalert2";

export default {
  props: {
    version: {
      default: null,
      type: String,
    },
  },
  computed: {
    ...mapGetters("form", [
      "email",
      "conversionParams",
      "isEmail",
      "hasError",
      "errorMessage",
      "pageVersion",
    ]),
    _email: {
      get() {
        return this.email;
      },
      set(value) {
        this.RESET_ERRORS();
        this.SET_EMAIL(value);
      },
    },
    ctaText() {
      return this.pageVersion.cta_text.toUpperCase();
    },
    ctaColor() {
      return {
        color: this.pageVersion.cta_text_color,
        backgroundColor: this.pageVersion.cta_button_color,
      };
    },
  },
  methods: {
    ...mapMutations("form", ["SET_EMAIL", "RESET_ERRORS"]),
    ...mapActions("form", ["handleSendEmail", "parseVersion"]),
    handleUserConvertEvent(payload) {
      const { data, status } = payload;

      if (status === 200) {
        this.thankYouAlert();
      }
    },
    thankYouAlert() {
      Swal.fire({
        icon: "success",
        title: "<strong>Thank you!</strong>",
        html: `Please check your inbox <span class="badge badge-pill badge-success">${this.email}</span> to download the list.`,
        footer:
          '<p>Share to your friends!</p><img style="margin: 0 0.5em;" src="https://cdns.iconmonstr.com/wp-content/assets/preview/2017/240/iconmonstr-facebook-6.png" alt="Facebook 6" width="50" height="50"><img style="margin: 0 0.5em;" src="https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-twitter-3.png" alt="Twitter 3" width="50" height="50"><img style="margin: 0 0.5em;" src="https://cdns.iconmonstr.com/wp-content/assets/preview/2016/240/iconmonstr-instagram-11.png" alt="Instagram 11" width="50" height="50"><img style="margin: 0 0.5em;" src="https://cdns.iconmonstr.com/wp-content/assets/preview/2012/240/iconmonstr-pinterest-1.png" alt="Pinterest 1" width="50" height="50">',
      });
    },
    showLoading(show = true) {
      if (show) {
        Swal.fire({
          allowOutsideClick: false,
          allowEscapeKey: false,
          allowEnterKey: false,
          onOpen() {
            Swal.showLoading();
          },
        });
        return;
      }

      Swal.close();
    },
  },
  created() {
    this.parseVersion(this.version);
  },
  mounted() {
    EventBus.$on("user-convert", (payload) =>
      this.handleUserConvertEvent(payload)
    );
    EventBus.$on("show-loading-modal", (payload) => this.showLoading(payload));
  },
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
