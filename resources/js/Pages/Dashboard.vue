<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-2 bg-white border-b border-gray-200 flex">
            <TicketForm />
            <TicketList :list="tickets" />
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import TicketForm from "./TicketChunks/Form.vue";
import TicketList from "./TicketChunks/List.vue";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    TicketForm,
    TicketList,
  },
  data() {
    return {
      form: this.$inertia.form({
        name: "",
        phone: "",
        company: "",
        title: "",
        message: "",
        file: "",
      }),
    };
  },
  props: ["tickets"],

  methods: {
    
  },
};
</script>
