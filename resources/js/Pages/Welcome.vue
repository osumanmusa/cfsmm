<script setup>
import { Head, Link, usePage } from '@inertiajs/vue3';
import Navbar from "../Components/Navbar.vue";
import Footer from "../Components/Footer.vue";
import pagination from "../Components/pagination.vue";
import Eventsmodal  from "../Components/Eventmodal.vue";
import { Modal } from 'flowbite';
import { ref, onMounted,  computed } from 'vue';
import { watch } from "vue";

const props = defineProps({
    events: Object,

}); 
const selectedCard = ref({});
const modalOptions = {
        backdropClasses:
            "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
    };
function modalopen(i){
    
       
  selectedCard.value= props.events.data[i];

    const $modalElement = document.querySelector("#modal");
    const $closeButton = document.querySelector("#closeButton");


    const modal = new Modal($modalElement, modalOptions);
         modal.toggle();
        $closeButton.addEventListener("click", () => modal.hide());
 
        
}
</script>

<template>
    <Head title="Welcome" />
    <Navbar/>
    <div
  class=" container-fluid   h-52 mb-12  " 
>
<section class="event-bg text-white">
  <div
    class="mx-auto max-w-screen-xl px-4 py-12 lg:flex  lg:items-center"
  >
    <div class="mx-auto max-w-3xl text-center">
      <h1
        class=" text-yellow-600 text-3xl font-extrabold text-transparent sm:text-5xl"
      >
        Our Events

      </h1>

      <p class="mx-auto mt-4 max-w-xl sm:text-xl/relaxed">
        Get more information for any of our events
      </p>


    </div>
  </div>
</section>
</div>

<section class="container-fluid px-10 mb-20">
  <div class="flex flex-wrap lg:grid lg:grid-cols-3 gap-16">

    <div
                v-for="(e,i) in events.data"
                :key="e.id">
      <article class="lg:grid lg:grid-cols-2 flex-wrap flex flex-col bg-white border transition hover:shadow-xl">

  <div class=" sm:block sm:basis-56 col-span-1">
    <img
      alt="Guitar"
      :src="'/img/events/'+ e.event_image "
      class="aspect-square h-64 lg:w-full object-fill w-[90vw]"
    />
  </div>
<div class="col-span-1">
  <div class="flex flex-1 flex-col justify-between">
    <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
      <a href="#">
        <h3 class="font-bold uppercase text-gray-900">
          {{e.title}}
        </h3>
      </a>

      <p class="mt-2 line-clamp-4 text-sm/relaxed text-gray-700">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo eos fuga neque harum consectetur. Quia itaque fuga debitis et. Vel cumque earum est repellendus temporibus non qui velit veritatis iure.
      </p>
    </div>
    
    <div>
      
  <div class="sm:flex sm:items-start sm:justify-start lg:ml-8 ml-4 ">
    <div class="inline-flex pb-2">
      <span class=" pr-2 text-xs text-gray-900">Date:{{ e.event_date }} </span>
    </div>
  </div>

    <div class="sm:flex sm:items-end sm:justify-end mt-4">
      <button  @click="modalopen(i)"
        class="block bg-yellow-300 px-5 py-3 text-center text-xs font-bold uppercase text-gray-900 transition hover:bg-yellow-400"
      >
        More Info
      </button>
    </div>

    </div>
  </div>
</div>
</article>

    </div>


 


  </div>
<!--Pagination-->

<pagination :links="events.links" />
</section>


<Footer class="mt-40"/>

 
<!-- Main modal -->

<div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white py-6 mb-4 rounded-lg shadow">
                <!-- Modal header -->
                <div class="flex items-start p-3 rounded-t ">
                    <a id="closeButton" type="button" class="inline-flex text-gray-800  bg-gray-200 hover:text-gray-900 rounded-lg text-lg p-1.5 inline-flex items-center ">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </a>
                    <h3 class="text-xl ml-9 my-2 text-black  font-bold">
                        Event Details
                    </h3>
                </div>
                
                <!-- Modal body -->
                
                <div class="flex justify-center">
                    <img :src="'/img/events/'+ selectedCard.event_image" class="h-full w-full object-cover px-10"/>
                </div>

                <div class="flex items-start ml-10 mt-4">
                    <span class="py-2 text-lg font-bold">Title: </span><span class="py-2 text-base px-2">{{ selectedCard.title }}</span>
                </div>
                <div class="mx-10">
                <p class="py-2 ">
                  <span class="font-bold  text-lg">Date:</span> <span class="py-2 text-base px-2">{{ selectedCard.event_date }}</span>
                </p>
                </div>
                <div class="mx-10">
                <p class="py-2 ">
                  <span class="font-bold text-lg">Time:</span> <span class="py-2 text-base px-2">{{ selectedCard.event_date }}</span>
                </p>
                </div>
                <div class="mx-10">
                <p class="py-2 ">
                  <span class="font-bold text-lg">Location:</span> <span class="py-2 text-base px-2">{{ selectedCard.location }}</span>
                </p>
                </div>
                <div class="mx-10">
                <p class="py-2 ">
                  <span class="font-bold text-lg">
                        Event Description:</span> 
                </p>
                </div>
                
              <div class="mx-10">
                <div class=" space-y-6">
                    <div >
                        <p class="t-color text-base text-jusify">{{ selectedCard.description }}</p>

<p class="py-2 ">
  <span class="font-bold text-lg">Sponsors:</span><span class="py-2 text-base px-2">{{ selectedCard.sponsors }}</span>
</p>

    

               
                    </div>

                  
                </div>
                <!-- Modal footer -->
              
                
            </div>
            </div>
        </div>
    </div>

<!--Modal end-->
</template>

<style scoped >
.event-bg{
  background-color: #150337;
}
    @media only all and (max-width: 768px)  {
.hidden-small{
  display: none;
}
      


    }



    @media only screen and (min-width: 1440px)
{ /* Your Styles... */ 

  

}


</style>
