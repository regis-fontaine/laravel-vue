<template>
  <button
    @click="deleteContact(id)"
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
    deleteContact(id) {
      axios
        .post("/emailApp/delete/{id}", {
          id: this.id,
        })
        .then((res) => console.log(res))
        .catch((err) => console.log(err));
    },
  },
};
</script>

