<template>
  <button
    @click="submit"
    class="bg-red-400 hover:bg-red-600 text-white text-sm px-2 py-1 rounded"
  >
    Delete 🗑️
  </button>
</template>

<script>
import Button from "../Jetstream/Button.vue";
export default {
  components: { Button },
  props: ["id"],

  methods: {
    submit() {
      this.$inertia.post("/emailApp/delete/" + this.id, this.id);
    },
  },
};
</script>

