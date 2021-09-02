<template>
  <div class="p-4 form flex-1">
    <form @submit.prevent="submit">
      <div class="mb-4">
        <h2>Make your ticket</h2>
      </div>
      <div>
        <BreezeLabel for="name" value="Name" />
        <BreezeInput
          id="name"
          type="text"
          class="mt-1 block w-full"
          v-model="form.name"
          required
          autofocus
          autocomplete="username"/>
      </div>

      <div class="mt-4">
        <BreezeLabel for="phone" value="Phone" />
        <BreezeInput
          id="phone"
          type="text"
          class="mt-1 block w-full"
          v-model="form.phone"
          required
          autofocus
          autocomplete="userphone"/>
      </div>

      <div class="mt-4">
        <BreezeLabel for="company" value="Company" />
        <BreezeInput
          id="company"
          type="text"
          class="mt-1 block w-full"
          v-model="form.company"
          required
          autofocus
          autocomplete="usercompany"/>
      </div>

      <div class="mt-4">
        <BreezeLabel for="ticket" value="Ticket name" />
        <BreezeInput
          id="ticket"
          type="text"
          class="mt-1 block w-full"
          v-model="form.title"
          required
          autofocus
          autocomplete="userticket"/>
      </div>

      <div class="mt-4">
        <BreezeLabel for="message" value="Message" />
        <BreezeTextArea
          id="message"
          type="text"
          class="mt-1 block w-full"
          v-model="form.message"
          required
          autofocus
          autocomplete="usermessage"/>
      </div>
      <div class="mt-4">
        <BreezeLabel for="file" value="File" />
        <BreezeInput
          id="file"
          type="file"
          class="mt-1 block w-full"
          @input="form.file = $event.target.files[0]"
          required
          autofocus/>
      </div>

      <div class="flex items-center justify-between mt-4">
        <div>
          <BreezeValidationErrors class="mr-4" />
        </div>
        <BreezeButton
          class="ml-4"
          :class="{ 'opacity-25': form.processing }"
          :disabled="form.processing">
          Send
        </BreezeButton>
      </div>
    </form>
  </div>
</template>
<script>
import BreezeButton from '@/Components/Button.vue';
import BreezeInput from "@/Components/Input.vue";
import BreezeTextArea from "@/Components/TextArea.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";

export default {
  components: {
    BreezeInput,
    BreezeLabel,
    BreezeButton,
    BreezeValidationErrors,
    BreezeTextArea,
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

  methods: {
    submit() {
      this.form.post(this.route("tickets.store"), {
        
      });
    },
  },
};
</script>
