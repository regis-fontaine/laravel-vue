<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard - Email sender App
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div class="mt-8">
            <div class="flex flex-col mt-6">
              <CreateButton />
              <div
                @click="hideNotification"
                v-if="$page.props.flash.success"
                id="successMessage"
                class="bg-green-600 text-white text-sm px-2 py-1 rounded successMessage"
              >
                {{ $page.props.flash.success }}
              </div>
              <div
                class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
              >
                <div
                  class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200"
                >
                  <table class="min-w-full">
                    <thead>
                      <tr>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Receiver
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Email address
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Status
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider"
                        >
                          Interval
                        </th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100"
                        ></th>
                        <th
                          class="px-6 py-3 border-b border-gray-200 bg-gray-100"
                        ></th>
                      </tr>
                    </thead>

                    <tbody class="bg-white">
                      <tr
                        v-for="contact in this.contactList"
                        v-bind:key="contact.id"
                      >
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <div class="text-sm leading-5 text-gray-500">
                            {{ contact.receiver }}
                          </div>
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <div class="text-sm leading-5 text-gray-500">
                            {{ contact.email }}
                          </div>
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200"
                        >
                          <toggle-button
                            :defaultState="
                              contact.isActivate && 1 ? true : false
                            "
                            :id="'statusBtn_' + contact.id"
                            v-on:change="StatusTriggerEvent"
                            v-on:change.native="
                              switchStatus(contact.id, contact.isActivate)
                            "
                            disabled
                          />
                        </td>

                        <td
                          class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center text-sm leading-5 text-gray-500"
                        >
                          {{ contact.interval }}
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium"
                        >
                          <a
                            :href="'emailapp/edit/contact/' + contact.id"
                            class="bg-indigo-600 hover:bg-indigo-900 text-white text-sm px-2 py-1 rounded"
                            >Edit ⚙️
                          </a>
                        </td>
                        <td
                          class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium"
                        >
                          <delete-button
                            :id="contact.id"
                            v-on:click.native="reloadContact(contact)"
                          />
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
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
import DeleteButton from "@/components/DeleteButton.vue";
import CreateButton from "@/components/CreateButton.vue";

export default {
  components: {
    AppLayout,
    ToggleButton,
    DeleteButton,
    CreateButton,
  },
  props: ["contacts"],
  data() {
    return {
      contactList: this.contacts,
      active: false,
      showModal: false,
    };
  },
  methods: {
    StatusTriggerEvent(value) {
      this.active = value;
    },
    hideNotification() {
      document.getElementById("successMessage").style.display = "none";
    },
    reloadContact(contact) {
      //Get id of the current contact
      const id = contact.id;
      for (let i = 0; i < this.contactList.length; i++) {
        if (this.contactList[i].id == id) {
          // Get id of the current obj-contact from contactList
          const idInContactList = this.contactList.indexOf(this.contactList[i]);
          this.contactList.splice(idInContactList, 1);
        }
      }
    },
    switchStatus(id, statusContact) {
      // console.log(statusContact);
      let status = statusContact === 0 ? 1 : 0;
      // console.log(status);
      this.$inertia.post("/emailApp/switchStatus/" + id + "/" + status);
    },
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