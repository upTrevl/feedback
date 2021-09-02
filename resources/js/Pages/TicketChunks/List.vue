<template>
  <div class="p-4 list flex-1">
    <div class="mb-4">
      <h2>Your tickets</h2>
    </div>
    <div v-for="item in list" :key="item.id" class="item mb-6">
      <div class="item-title py-3 px-5 bg-gray-300 rounded-t-md flex justify-between">
        <span class="font-semibold">
          {{ item.title }}
        </span>
        <span>
          {{ item.created_at }}
        </span>
      </div>
      <div class="item-description py-3 bg-gray-100 rounded-b-md px-5">
        <div class="flex flex-row justify-between mb-3">
          <div>
              <span class="font-semibold">Name: </span>{{ item.name }}
              </div>
          <div>
            <span class="font-semibold">Company: </span>{{ item.company }}
          </div>
          <div><span class="font-semibold">Phone: </span>{{ item.phone }}</div>
        </div>
        <div class="mb-3">{{ item.message }}</div>
        <div><a :href="'/storage/'+item.file.src" target="_blank">File</a></div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {};
  },
  props: ["list"],
};
</script>
