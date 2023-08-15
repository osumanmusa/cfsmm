<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { ref,  onMounted  } from 'vue';
let showMenu = ref(false);
    const toggleNav = () => (showMenu.value = !showMenu.value);
</script>
<template>
    <header class="sticky">
	<nav class=" top-0 nav px-4 py-7 flex  justify-between items-center nav-bg shadow-md border-b-4 border-yellow-600 ">
		<a class="text-3xl font-bold leading-none mx-16 flex items-center" href="/">
			<img :src="'/img/logo.png'" class="h-24"/>
		</a>

		<div class="lg:hidden">
			<button @click="toggleNav" class="navbar-burger flex items-center text-white p-3">
				<svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
					<title>Mobile menu</title>
					<path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
				</svg>
			</button>
		</div>
		<ul class="hidden absolute top-1/2 right-0 transform -translate-y-1/2 px-28  lg:flex  lg:items-center lg:space-x-4">
			<!-- <li><a class="text-xl text-white hover:text-blue-700" href="/">HOME</a></li>
			<li class="text-gray-300">
		
			</li>
			<li><a class="text-xl text-white hover:text-blue-700" href="/">WHO WE ARE <i class="fa-solid fa-angle-down"></i></a></li>
			<li class="text-gray-300">

			</li>
			<li><a class="text-xl text-white hover:text-blue-700" href="/">GET INVOLVED <i class="fa-solid fa-angle-down"></i></a></li>
			<li class="text-gray-300">
	
			</li>
			<li><a class="text-xl text-white hover:text-blue-700" href="/">PRAYER REQUEST </a></li>
			<li class="text-gray-300">
	
			</li>
			<li><a class="text-xl text-white hover:text-blue-700" href="/">SERMONS <i class="fa-solid fa-angle-down"></i></a></li>
			<li class="text-gray-300">
	
			</li>
			 -->
			<li><a href="//www.cfsmm.org/" class="block p-4  text-center text-sm border border-2 border-yellow-400 lg:ml-auto  py-2 px-6   text-sm text-white   rounded transition duration-200" ><i class="fa fa-arrow-left"></i> Back to Homepage</a>
			</li>
			<li><a href="/login" class="block p-4  text-center text-sm border border-2 border-yellow-400 lg:ml-auto  py-2 px-6   text-sm text-white   rounded transition duration-200" > Login</a>
			</li>
		</ul>
    </nav>
	
</header>
	<div 
        :class="showMenu ? 'flex' : 'hidden'"
         class="navbar-menu relative z-50 lg:hidden">
		<div 
        :class="showMenu ? 'flex' : 'hidden'" @click="toggleNav"  class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
		<nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 nav-bg  border-r overflow-y-auto">
			<div class="flex items-center mb-8">
				<a class="mr-auto text-3xl font-bold leading-none" href="/">
					<img :src="'/img/logo.png'" class="h-8"/>
				</a>
				<button @click="toggleNav"  class="navbar-close">
					<svg class="h-6 w-6 text-white font-bold cursor-pointer hover:text-white font-bold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
						<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</button>
			</div>
			<div>
				<ul>
					
			<li><a href="//www.cfsmm.org/" class="block p-4  text-center text-sm border border-2 border-yellow-400 lg:ml-auto  py-2 px-6   text-sm text-white   rounded transition duration-200" ><i class="fa fa-arrow-left"></i> Back to Homepage</a>
			</li>
				<!--
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-white hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 rounded" :href="'/Searchpackage'" :class="{ 'activated': $page.url === '/Searchpackage' }">Packages</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-white hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 rounded" :href="'/Support'" :class="{ 'activated': $page.url === '/Events' }">Support</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-white hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 rounded" :href="'/Contact'" :class="{ 'activated': $page.url === '/Contact' }">Contact</a>
					</li>
					<li class="mb-1">
						<a class="block p-4 text-sm font-semibold text-white hover:text-gray-100 hover:bg-gray-700 hover:bg-opacity-25 rounded" :href="'/login'" :class="{ 'activated': $page.url === '/login' }">Log in</a>
					</li>
					<li class="mb-1 flex justify-between ">
						
					<a href="/register" class="block p-4 text-sm font-semibold lg:ml-auto lg:mr-3 py-2 px-6 btn-red hover:bg-white text-sm text-white font-bold font-bold  rounded-xl transition duration-200" >Sign up</a>
					</li> -->
				</ul>
			</div>

		</nav>
	</div>
</template>
<style scoped>

.nav-bg{
    background: #69231B;
}
.navbar-bg{

}
.activated {
      background-color: rgb(55 65 81);
      color:#fff;
    }
.sticky{
	
position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0;
  
  z-index: 30;
}

.btn-red{
  background:#AD0909;
}
.red-bg{
background: rgb(165,37,39);
}
.blue-bg{
	background: #002147;
}
.hover-blue-bg:hover{
	
	background: #002147;
}
.black-bg{
	background: #282C31;

}
.text-blue-bg:hover{
	color: #002147;
	background-color: white;
	border: 1px solid #002147 ;
}
.text-bg-blue{

	border: 1px solid #002147 ;
}
.text-bg-blue:hover{
	color: white;
	background-color: #002147;
	border: 1px solid white ;
}
</style>