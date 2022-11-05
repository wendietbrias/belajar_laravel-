require("./bootstrap");

import { createApp } from "vue";

import App from "./App.vue";

const app = createApp({});

app.component("example-component", require("./App.vue").default);

app.mount("#app");
