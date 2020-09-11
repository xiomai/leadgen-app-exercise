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
import Vue from "vue";
import { mapGetters, mapMutations, mapActions } from "vuex";

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
  },
  created() {
    this.parseVersion(this.version);
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
