<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Email sender App - Create Contact
      </h2>
    </template>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form
          @submit.prevent="submit"
          class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4"
        >
          <div class="mb-4">
            <label
              for="receiver"
              class="block text-sm text-gray-700 font-bold mb-2"
              >Receiver</label
            >

            <input
              id="receiver"
              class="rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              v-model="form.receiver"
            />

            <div class="text-red-600 mt-2" v-if="$page.props.errors.receiver">
              {{ $page.props.errors.receiver }}
            </div>
          </div>
          <div class="mb-4">
            <label
              for="email"
              class="block text-sm text-gray-700 font-bold mb-2"
              >email</label
            >
            <input
              id="email"
              type="text"
              class="rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              v-model="form.email"
            />

            <div class="text-red-600 mt-2" v-if="$page.props.errors.email">
              {{ $page.props.errors.email }}
            </div>
          </div>
          <!-- select interval   -->
          <div class="mb-4">
            <label
              for="interval"
              class="block text-sm text-gray-700 font-bold mb-2"
              >Interval</label
            >
            <select
              name="interval"
              id="interval"
              class="rounded shadow appearance-none w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              v-model="form.interval"
            >
              <option value="">Choose the interval</option>
              <option value="1m">1 minute</option>
              <option value="5m">5 minutes</option>
              <option value="10m">10 minutes</option>
            </select>
            <div class="text-red-600 mt-2" v-if="$page.props.errors.interval">
              {{ $page.props.errors.interval }}
            </div>
          </div>
          <button
            type="submit"
            class="block rounded bg-indigo-800 py-2 px-3 hover:bg-indigo-600 text-white"
          >
            Create Contact
          </button>
        </form>
      </div>
    </div>
  </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import ToggleButton from "@/components/ToggleButton.vue";

export default {
  components: {
    AppLayout,
    ToggleButton,
  },
  props: [],
  data() {
    return {
      form: {
        receiver: null,
        email: null,
        status: false,
        interval: "",
      },
    };
  },
  methods: {
    StatusTriggerEvent(value) {
      this.active = value;
    },
    submit() {
      this.$inertia.post("/emailapp/create/contact/new", this.form);
    },
  },
};
</script>

