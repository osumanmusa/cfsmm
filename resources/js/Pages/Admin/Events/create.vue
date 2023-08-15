<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AdminNavbar from "../../../Components/Admin/AdminNavbar.vue";
import AdminSidebar from "../../../Components/Admin/AdminSidebar.vue";
import { ref, onMounted,  computed } from 'vue';
import { Modal } from "flowbite";
import { watch } from "vue";
const props = defineProps({
    user: Object,
    message:String,
    successmessage: Object,
    errormessage: Object,
    voice: Object,
    quiz: Object,

});

const form = useForm({
    title: '',
    location: '',
    sponsors: '',
    date:'',
    description:'', 
    image:'',
});

const fileInput = ref(null);
const imageUrl = ref(null);
const submit = () => {
    form.post(route('admin.events.store'));
};
function selectFile($event) {
            form.image = $event.target.files[0];
            const file = $event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = ($event) => {
      imageUrl.value = $event.target.result;
    };
    reader.readAsDataURL(file);
  }
        }


</script>
<template>
    <Head title="Dashboard" />
    <div class="flex h-screen bg-black">
        <AdminSidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <AdminNavbar />

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container mx-auto px-6 py-8">

      
                    <!--Table start-->
                    
<!--Create form sart-->
<div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 ">
<h2 class="P-3 mb-6 text-black"><b>ADD NEW ADMIN</b></h2>

<form @submit.prevent="submit" enctype="multipart/form-data">
    <div class="grid gap-4 mb-3 md:grid-cols-2 p-3">
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Title</label>
            <input type="text" v-model="form.title" id="floating_email" class="block py-2.5 px-1 w-full text-sm text-gray-900 bg-transparent  border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        </div>
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Location</label>
            <input type="text" v-model="form.location" id="floating_email" class="block py-2.5 px-1 w-full text-sm text-gray-900 bg-transparent  border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        </div>
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Sponsors (seperate each by a comma)</label>
            <input type="tel" v-model="form.sponsors" id="floating_email" class="block py-2.5 px-1 w-full text-sm text-gray-900 bg-transparent  border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " multiple/>
        </div>
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Date</label>
            <input type="date" v-model="form.date" id="floating_email" class="block py-2.5 px-1 w-full text-sm text-gray-900 bg-transparent border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        </div>
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Description</label>
            <textarea type="text" v-model="form.description" id="floating_email" class="block px-1 w-full h-full text-sm text-gray-900 bg-transparent border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" 
            placeholder=" " required ></textarea>
        </div>
        <div >
            <label for="input-label" class="block text-sm  mb-1 ">Event Image</label>
            <input type="file"  id="image"  v-on:change="selectFile"  class="block py-2.5 px-1 w-full text-sm text-gray-900 bg-transparent border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        </div>
    </div>

  <div class="p-3 ">

<button class="py-3 px-4 text-right rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm " :disabled="form.processing">
    Submit

</button>

  </div>
</form>

</div>


<!--ceate form end-->


                    <!--Table end-->
                </div>
            </main>
        </div>
    </div>
</template>
<style scoped>


    @media (max-width: 768px) {
      .hidden-small {
        display: none;
      }
    }
.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
  float:right;
}
.fade-enter-active,
.fade-leave-active {
    transition: opacity 2.5s ease-out;
}
.fade-enter,
.fade-leave-to {
    opacity: 0;
}

</style>
