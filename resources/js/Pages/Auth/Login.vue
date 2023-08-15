<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import LoginNav from "../../Components/LoginNav.vue";
import Footer from "../../Components/Footer.vue";
import { ref, onMounted } from "vue";

const props = defineProps({
    successmessage: Object,
    errormessage: Object,

}); 
onMounted(() => {

const eye = document.getElementById('eye');
const offeye = document.getElementById('offeye');
const p = document.getElementById('pwd');
eye.addEventListener('click', () => p.setAttribute('type', 'text'));

offeye.addEventListener('click', () => p.setAttribute('type', 'password'));


})
const hideeye=ref(true);
const showeye = ref(false);
function hide(){
hideeye.value = !hideeye;
showeye.value = true

}
const form = useForm({
    email: '',
    password: '',
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};

</script>

<template>
    <Head title="Login" />

            <LoginNav />

<Transition name="fade" mode="out-in">
            <div
                v-if="$page.props.flash.successmessage"
                class="tostr flex mt-2 items-center w-full max-w-xs p-4 space-x-4 text-green-500 bg-gray-100 divide-x divide-gray-200 rounded-lg shadow "
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-green-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.successmessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="
                        $page.props.flash.successmessage = false
                    "
                >
                    <svg
                        class="block w-4 h-3 fill-green-800"
                        xmlns="http://www.w3.org/2000/svg"
                        width="235.908"
                        height="235.908"
                        viewBox="278.046 126.846 235.908 235.908"
                    >
                        <path
                            d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                        />
                    </svg>
                </button>
            </div>
        </Transition>

        <Transition name="Efade">
            <div
                v-if="$page.props.flash.errormessage"
                id="toast-simple"
                class="tostr flex mt-2 mr-3 items-center w-full max-w-xs p-4 space-x-4 text-red-500 bg-white divide-x divide-gray-200 rounded-lg shadow "
                role="alert"
            >
                <svg
                    class="w-7 h-7 text-red-600"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="1.5"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    aria-hidden="true"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                </svg>
                <div class="pl-4 text-sm font-normal">
                    {{ $page.props.flash.errormessage }}
                </div>
                <button
                    type="button"
                    class="justify-end group mr-2 p-2"
                    @click="$page.props.flash.errormessage = false"
                >
                    <svg
                        class="block w-4 h-3 fill-red-600"
                        xmlns="http://www.w3.org/2000/svg"
                        width="235.908"
                        height="235.908"
                        viewBox="278.046 126.846 235.908 235.908"
                    >
                        <path
                            d="M506.784 134.017c-9.56-9.56-25.06-9.56-34.62 0L396 210.18l-76.164-76.164c-9.56-9.56-25.06-9.56-34.62 0-9.56 9.56-9.56 25.06 0 34.62L361.38 244.8l-76.164 76.165c-9.56 9.56-9.56 25.06 0 34.62 9.56 9.56 25.06 9.56 34.62 0L396 279.42l76.164 76.165c9.56 9.56 25.06 9.56 34.62 0 9.56-9.56 9.56-25.06 0-34.62L430.62 244.8l76.164-76.163c9.56-9.56 9.56-25.06 0-34.62z"
                        />
                    </svg>
                </button>
            </div>
        </Transition>
        <!-- Breadcrumb -->
<section class=" my-20">

    <div class="md:flex md:justify-center px-10">
        <form @submit.prevent="submit">
        <span class="py-6">Sign in</span>
        <div class="grid gap-4  md:grid-cols-1 py-3 ">
        <div >
            <label for="input-label" class="block text-sm  mb-2 dark:text-white">Email Address</label>
            <input type="email" id="title" v-model="form.email"  class="py-3 px-4 block w-full border-gray-300 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 " required placeholder="Enter your email">
        </div>
        </div>

        <div class="grid gap-4  md:grid-cols-1 py-3 ">
        <div >
            <label for="input-label" class="block text-sm  mb-2 dark:text-white">Password</label>

<div class="relative">
  <input
    type="password"  id="pwd" v-model="form.password"
    class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
    placeholder="" required
  />

  <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
  
  <i class="fa fa-eye " aria-hidden="true"  type="button" id="eye" v-if="hideeye" @click="hide()"></i>
  <!-- <i class="fa fa-eye-slash" aria-hidden="true"  type="button" id="offeye" v-if="showeye" @click="toggleeye()"></i> -->
  </span>
 
</div>
        </div>
        </div>
        <div>
            <span class="text-base">By signing in, I agree to the <span style="color: #132A7B;">Terms and Conditions </span> and <span style="color:#132A7B;"> Privacy Statement.</span></span>
        </div>

        <div class="flex-auto  justify-center py-3 mt-6 ">
        <div class=" ">
            <button  type="submit" value="Submit" class="text-white w-full item-center rounded-sm text-sm px-5 py-2.5 text-center font-medium  py-4 " style="background: #69231B; ">Sign in</button>

        </div>
        </div>


        </form>
    </div>
</section >
  

</template>

<style scoped>
.tostr{
  
  position:fixed;
  right:1rem;
  top:1rem;
  z-index: 1000;
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
