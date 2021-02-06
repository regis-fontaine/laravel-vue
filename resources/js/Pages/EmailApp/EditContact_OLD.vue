<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Email sender App - Edit contact: {{ contactEdit.receiver }}
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="flex flex-col">
            <div
              class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
            >
              <div
                class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
              >
                <!--  Current Profile -->
                <div>Current Profile</div>
                <div>{{ contactEdit.receiver }}</div>
                <div>{{ contactEdit.email }}</div>
                <div>{{ contactEdit.isActivate }}</div>
                <div>{{ contactEdit.interval }}</div>
                <div>{{ contactEdit.created_at }}</div>
                <div>{{ contactEdit.updated_at }}</div>
                <!-- Edit Profile -->
              </div>
            </div>
          </div>
        </div>
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
  props: ["contact"],
  data() {
    return {
      contactEdit: this.contact,
      active: false,
    };
  },
  methods: {
    StatusTriggerEvent(value) {
      this.active = value;
    },
  },
  mounted() {
    console.log(this.contactEdit);
  },
};
</script>

<style>
.toggle_container {
  margin: 0px auto;
  background: #efefef;
  width: 120px;
  padding: 10px 0;
  border-radius: 30px;
  transition: all 0.25s;
}
.toggle_container.active {
  background: #e9ffef;
}
</style>