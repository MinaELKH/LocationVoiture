<?php
ob_start();
session_start();
require("../../sweetAlert/sweetAlert.php"); 
require_once __DIR__ . "/../backend/classe_Vehicule.php";
require_once __DIR__ . "/../backend/classe_Categorie.php";
require_once __DIR__ . "/../backend/classe_Reservation.php";
require_once __DIR__ . "/../backend/classe_client.php";
require_once __DIR__ . '/../../includ/DB.php';
require_once __DIR__ . '/../../includ/DatabaseManager.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head data-pg-collapsed>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Design of the Week Template 12 - Pinegrow Web Editor</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="js/main.js"  defer></script>
        <link href="PrimeDrive_TW/PrimeDrive_TW/tailwind_theme/tailwind.css" rel="stylesheet" type="text/css">
        <script>/* Pinegrow Interactions, do not remove */ (function(){try{if(!document.documentElement.hasAttribute('data-pg-ia-disabled')) { window.pgia_small_mq=typeof pgia_small_mq=='string'?pgia_small_mq:'(max-width:767px)';window.pgia_large_mq=typeof pgia_large_mq=='string'?pgia_large_mq:'(min-width:768px)';var style = document.createElement('style');var pgcss='html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';if(document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {pgia_small_mq='(min-width:0)';pgia_large_mq='(min-width:99999px)'} pgcss+='@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';pgcss+='@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';style.innerHTML=pgcss;document.querySelector('head').appendChild(style);}}catch(e){console&&console.log(e);}})()</script>
    </head>
    <body class="font-serif text-gray-500"> 
        <header class="bg-gray-900 bg-opacity-95 py-2">
            <div class="container mx-auto relative"> 
                <nav class="flex flex-wrap items-center px-4"> 
                    <a href="#" class="font-bold font-sans hover:text-opacity-75 inline-flex items-center leading-none mr-4 space-x-1 text-primary-500 text-xl uppercase"><svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="2.5em" xml:space="preserve" fill="currentColor" viewBox="0 0 100 100" height="2.5em">
                            <path d="M38.333 80a11.571 11.571 0 0 1-7.646-2.883A11.724 11.724 0 0 1 26.834 70H10V46.667L43.333 40l20-20H90v26.667H43.995l-27.328 5.465v11.2h11.166a11.787 11.787 0 0 1 4.212-4.807 11.563 11.563 0 0 1 12.577 0 11.789 11.789 0 0 1 4.213 4.807h7.833V70h-6.837a11.719 11.719 0 0 1-3.853 7.117A11.571 11.571 0 0 1 38.333 80Zm0-16.667a5 5 0 1 0 5 5 5.006 5.006 0 0 0-5.001-5Zm27.761-36.666L52.762 40h30.571V26.667Z"></path>
                            <path d="M56.667 63.333h-7.833a11.6 11.6 0 0 0-21 0H16.667v-11.2l27.328-5.465h12.672Z" opacity="0.2"></path>
                            <path d="M90 63.333H80v-10h-6.667v10h-10V70h10v10H80V70h10Z"></path>
                            <path d="M52.762 40h30.571V26.667H66.094Z" opacity="0.2"></path>
                        </svg><span>Prime Drive</span> </a> 
                    <button class="hover:bg-primary-500 hover:text-white ml-auto px-3 py-2 rounded text-white lg:hidden" data-name="nav-toggler" data-pg-ia='{"l":[{"name":"NabMenuToggler","trg":"click","a":{"l":[{"t":"^nav|[data-name=nav-menu]","l":[{"t":"set","p":0,"d":0,"l":{"class.remove":"hidden"}}]},{"t":"#gt# span:nth-of-type(1)","l":[{"t":"tween","p":0,"d":0.2,"l":{"rotationZ":45,"yPercent":300}}]},{"t":"#gt# span:nth-of-type(2)","l":[{"t":"tween","p":0,"d":0.2,"l":{"autoAlpha":0}}]},{"t":"#gt# span:nth-of-type(3)","l":[{"t":"tween","p":0,"d":0.2,"l":{"rotationZ":-45,"yPercent":-300}}]}]},"pdef":"true","trev":"true"}]}' data-pg-ia-apply="$nav [data-name=nav-toggler]"> 
                        <span class="block border-b-2 border-current my-1 w-6"></span> 
                        <span class="block border-b-2 border-current my-1 w-6"></span> 
                        <span class="block border-b-2 border-current my-1 w-6"></span> 
                    </button>                     
                    <div class="flex-1 hidden space-y-2 w-full lg:flex lg:items-center lg:space-x-4 lg:space-y-0 lg:w-auto" data-name="nav-menu"> 
                        <div class="flex flex-col mr-auto lg:flex-row"> 
                            <a href="#" class="hover:text-gray-400 lg:p-4 py-2 text-white">Acceuil</a>
                            <a href="#" class="hover:text-gray-400 lg:p-4 py-2 text-white">Offre</a>
                            <a href="#" class="hover:text-gray-400 lg:p-4 py-2 text-white">Locations</a>
                            <a href="#" class="hover:text-gray-400 lg:p-4 py-2 text-white">Support</a> 
                        </div>
                 <?php
                 if(isset($_SESSION['id_role']) &&  $_SESSION['id_role']==2){
                   echo  "   <a href='#' class='flex items-center hover:text-[#FEA116] text-3xl'>
                            <i class='fa-solid fa-user-tie'></i>
                            </a>
                        " ; 
                  } else {
                    echo  '<div class="flex-wrap inline-flex items-center py-1 space-x-2"> 
                                <a href="../login/login.php" class="border border-primary-500 hover:bg-primary-500 hover:text-white inline-block px-6 py-2 text-primary-500">
                                Log In</a>
                                <a href="../login/register.php" class="bg-primary-500 border border-primary-500 hover:bg-primary-600 inline-block px-6 py-2 text-white">
                                Sign Up</a> 
                            </div>
                         ' ; 
                  }
                 ?>
                    </div>                     
                </nav>                 
            </div>
        </header>
        <main>
        <section class="bg-secondary-500 poster relative text-gray-300">
                <div class="container mx-auto pb-24 pt-72 px-4">
                    <div class="-mx-4 flex flex-wrap items-center space-y-6 lg:space-y-0">
                        <div class="px-4 w-full md:w-9/12 xl:w-7/12 2xl:w-6/12"> 
                            <p class="font-bold font-sans mb-1 text-2xl text-white">Location de voitures</p>
                            <h1 class="font-bold mb-6 text-5xl text-white md:leading-tight lg:leading-tight lg:text-6xl">For Your <span class="text-primary-500">Trajet quotidien</span> or <span class="text-primary-500">Leisure</span></h1>
                            <div class="bg-white p-6">
                                <h2 class="font-bold mb-2 text-gray-900 text-xl">Trouvons votre voiture idéale</h2>
                                <form> 
                                    <div class="-mx-2 flex flex-wrap items-center">
                                        <div class="p-1 w-full sm:flex-1">
                                            <input class="appearance-none border px-5 py-2 text-gray-600 w-full" type="email" required placeholder="Enter your pick up location..."/>
                                        </div>
                                        <div class="p-1 w-full sm:w-4/12">
                                            <input class="appearance-none border px-5 py-2 text-gray-600 w-full" type="date" required/>
                                        </div>
                                        <div class="p-1 text-right w-full sm:flex-initial sm:w-auto">
                                            <a href="#" class="bg-primary-500 hover:bg-primary-600 inline-block px-6 py-2 text-center text-white"><span>Recherche</span></a>
                                        </div>                                         
                                    </div>                                     
                                </form>
                            </div>                             
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-gray-50 py-24"> 
                <div class="container mx-auto px-4"> 
                    <div class="-mx-4flex flex-wrap items-center mb-6"> 
                        <div class="px-4 w-full md:w-10/12"> 
                            <h2 class="font-medium mb-1 text-primary-500 text-xl">Our Top Cars</h2>
                            <h3 class="capitalize font-bold mb-4 text-4xl text-gray-900">Cars for all your needs</h3>
                            <div class="bg-primary-500 mb-6 pb-1 w-2/12"></div>                             
                        </div>                         
                    </div>
                    <div class="-mx-3  grid grid-cols-3 justify-center mb-12"> 
                    <!-- debut card -->

                    <?php 
                            $dbManager = new DatabaseManager();
                            $newVehicule = new Vehicule($dbManager);
                            $result = $newVehicule->getAll(); 
                        ?>
                    <?php  
foreach($result as $objet) :
    echo   '<div class="p-3 w-full md:grid-cols-2 lg:w-full">
    <div class="bg-white border shadow-md text-gray-500">
        <a href="#" class="block w-full h-[450px] bg-gray-300">
            <img src="' . $objet->photo . '" class="hover:opacity-90 w-full h-full object-cover" alt="..." />
        </a>

        <div class="p-4">
            <h4 class="font-bold mb-2 text-gray-900 text-xl">
                <a href="#" class="hover:text-gray-500">' . $objet->nom . ' ' . $objet->model . ' ' . $objet->marque . '</a>
            </h4> 
      <!-- les icons d option -->
     <p class="mb-2 text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
       <div class="group mt-2.5 inline-flex flex-wrap items-center gap-3">
      <span
        data-tooltip-target="money"
        class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3  text-[#54616b]  transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          aria-hidden="true"
          class="h-5 w-5"
        >
          <path d="M12 7.5a2.25 2.25 0 100 4.5 2.25 2.25 0 000-4.5z"></path>
          <path
            fill-rule="evenodd"
            d="M1.5 4.875C1.5 3.839 2.34 3 3.375 3h17.25c1.035 0 1.875.84 1.875 1.875v9.75c0 1.036-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 14.625v-9.75zM8.25 9.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM18.75 9a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V9.75a.75.75 0 00-.75-.75h-.008zM4.5 9.75A.75.75 0 015.25 9h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H5.25a.75.75 0 01-.75-.75V9.75z"
            clip-rule="evenodd"
          ></path>
          <path d="M2.25 18a.75.75 0 000 1.5c5.4 0 10.63.722 15.6 2.075 1.19.324 2.4-.558 2.4-1.82V18.75a.75.75 0 00-.75-.75H2.25z"></path>
        </svg>
      </span>
      <span
        data-tooltip-target="wifi"
        class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3  text-[#54616b]  transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          aria-hidden="true"
          class="h-5 w-5"
        >
          <path
            fill-rule="evenodd"
            d="M1.371 8.143c5.858-5.857 15.356-5.857 21.213 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.06 0c-4.98-4.979-13.053-4.979-18.032 0a.75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182c4.1-4.1 10.749-4.1 14.85 0a.75.75 0 010 1.061l-.53.53a.75.75 0 01-1.062 0 8.25 8.25 0 00-11.667 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.204 3.182a6 6 0 018.486 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0 3.75 3.75 0 00-5.304 0 .75.75 0 01-1.06 0l-.53-.53a.75.75 0 010-1.06zm3.182 3.182a1.5 1.5 0 012.122 0 .75.75 0 010 1.061l-.53.53a.75.75 0 01-1.061 0l-.53-.53a.75.75 0 010-1.06z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </span>
   
      <span
        data-tooltip-target="bedrooms"
        class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3  text-[#54616b]  transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          aria-hidden="true"
          class="h-5 w-5"
        >
          <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z"></path>
          <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z"></path>
        </svg>
      </span>

      <span
        data-tooltip-target="tv"
        class="cursor-pointer rounded-full border border-pink-500/5 bg-pink-500/5 p-3  text-[#54616b]  transition-colors hover:border-pink-500/10 hover:bg-pink-500/10 hover:!opacity-100 group-hover:opacity-70"
      >
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          fill="currentColor"
          aria-hidden="true"
          class="h-5 w-5"
        >
          <path d="M19.5 6h-15v9h15V6z"></path>
          <path
            fill-rule="evenodd"
            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v11.25C1.5 17.16 2.34 18 3.375 18H9.75v1.5H6A.75.75 0 006 21h12a.75.75 0 000-1.5h-3.75V18h6.375c1.035 0 1.875-.84 1.875-1.875V4.875C22.5 3.839 21.66 3 20.625 3H3.375zm0 13.5h17.25a.375.375 0 00.375-.375V4.875a.375.375 0 00-.375-.375H3.375A.375.375 0 003 4.875v11.25c0 .207.168.375.375.375z"
            clip-rule="evenodd"
          ></path>
        </svg>
      </span>
 
   

    </div>
            <hr class="border-gray-200 my-4">
            <div class="flex items-center justify-between">
                <div class="flex flex-col justify-between">
                <p class="font-bold text-gray-900">' . $objet->prix . '/day</p>
                <div class="inline-flex items-center py-1 space-x-1">
                    <span>4.7</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="1.125em" height="1.125em" class="text-primary-500">
                        <g>
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path d="M12 18.26l-7.053 3.948 1.575-7.928L.587 8.792l8.027-.952L12 .5l3.386 7.34 8.027.952-5.935 5.488 1.575 7.928z"></path>
                        </g>
                    </svg>
                    <span>(245 reviews)</span>
                </div>
                </div>
                <div>
                <button 
                class="btn_louer bg-gray-300 hover:bg-primary-600 inline-block px-6 py-2 text-gray-700" 
                 value='.$objet->prix.'  onclick="openModal(\'modalReservation\' , '.$objet->id_vehicule.' )">
                Louer
               </button>
                </div>
              
            </div>
      <!-- les option-->
      
 
        </div>
    </div>
</div> ' ;

endforeach; 
?>
            </div>                 
            </section>
            <section class="py-24"> 
                <div class="container mx-auto px-4"> 
                    <div class="-mx-4 flex flex-wrap items-center mb-6"> 
                        <div class="px-4 w-full md:flex-1"> 
                            <h2 class="font-medium mb-1 text-primary-500 text-xl">Our Fleet</h2>
                            <h3 class="capitalize font-bold mb-4 text-4xl text-gray-900">Browse by Category</h3>
                            <div class="bg-primary-500 mb-6 pb-1 w-2/12"></div>                             
                        </div>
                        <div class="px-4 w-full md:w-auto"> 
                            <a href="#" class="bg-primary-500 hover:bg-primary-600 inline-block px-6 py-2 text-white">View All</a> 
                        </div>                         
                    </div>
                    <div class="-mx-3 flex flex-wrap justify-center"> 
                        <div class="p-3 w-full md:w-6/12 lg:w-3/12"> 
                            <a href="#" class="bg-white block border group hover:text-gray-500 shadow-md text-gray-900"><img src="https://images.unsplash.com/photo-1619767886558-efdc259cde1a?ixid=MnwyMDkyMnwwfDF8c2VhcmNofDMyM3x8c3V2fGVufDB8fHx8MTYzMTY4Njc4Nw&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=600&h=450&fit=crop" class="group-hover:opacity-90 w-full" alt="..." width="600" height="450"/><div class="px-6 py-4">
                                    <h4 class="font-bold text-xl">Sedans</h4>
                                </div></a> 
                        </div>
                        <div class="p-3 w-full md:w-6/12 lg:w-3/12"> 
                            <a href="#" class="bg-white block border group hover:text-gray-500 shadow-md text-gray-900"><img src="https://images.unsplash.com/photo-1511527844068-006b95d162c2?ixid=MnwyMDkyMnwwfDF8c2VhcmNofDQzfHxjYXIlMjBzdXZ8ZW58MHx8fHwxNjMxNjg0ODkw&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=600&h=450&fit=crop" class="group-hover:opacity-90 w-full" alt="..." width="600" height="450"/><div class="px-6 py-4">
                                    <h4 class="font-bold text-xl">SUVs</h4>
                                </div></a> 
                        </div>
                        <div class="p-3 w-full md:w-6/12 lg:w-3/12"> 
                            <a href="#" class="bg-white block border group hover:text-gray-500 shadow-md text-gray-900"><img src="https://images.unsplash.com/photo-1597210159614-966c9f632c89?ixid=MnwyMDkyMnwwfDF8c2VhcmNofDh8fGNhciUyMGNvbnZlcnRpYmxlfGVufDB8fHx8MTYzMTY4NTExMA&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=600&h=450&fit=crop" class="group-hover:opacity-90 w-full" alt="..." width="600" height="450"/><div class="px-6 py-4">
                                    <h4 class="font-bold text-xl">Convertibles</h4>
                                </div></a> 
                        </div>
                        <div class="p-3 w-full md:w-6/12 lg:w-3/12"> 
                            <a href="#" class="bg-white block border group hover:text-gray-500 shadow-md text-gray-900"><img src="https://images.unsplash.com/photo-1552519507-da3b142c6e3d?ixid=MnwyMDkyMnwwfDF8c2VhcmNofDMwfHxzcG9ydHMlMjBjYXJ8ZW58MHx8fHwxNjMxNjg3MzQ4&ixlib=rb-1.2.1q=85&fm=jpg&crop=faces&cs=srgb&w=600&h=450&fit=crop" class="group-hover:opacity-90 w-full" alt="..." width="600" height="450"/><div class="px-6 py-4">
                                    <h4 class="font-bold text-xl">Sports Cars</h4>
                                </div></a> 
                        </div>                         
                    </div>
                </div>                 
            </section>
            <section class="bg-gray-900 bg-opacity-95 py-24 text-gray-400"> 
                <div class="container mx-auto px-4"> 
                    <div class="-mx-4 flex flex-wrap items-center mb-6"> 
                        <div class="px-4 w-full md:w-10/12"> 
                            <h2 class="font-medium mb-1 text-primary-500 text-xl">Testimonials</h2>
                            <h3 class="capitalize font-bold mb-4 text-4xl text-white">What Our Customers Say About Us</h3>
                            <div class="bg-primary-500 mb-6 pb-1 w-2/12"></div>                             
                        </div>                         
                    </div>
                    <div class="flex flex-wrap -mx-4  items-center"> 
                        <div class="p-4 w-full lg:w-4/12"> 
                            <img src="https://images.unsplash.com/photo-1537151625747-768eb6cf92b2?ixid=MXwyMDkyMnwwfDF8c2VhcmNofDE5fHxkb2d8ZW58MHx8fA&amp;ixlib=rb-1.2.1q=85&amp;fm=jpg&amp;crop=faces&amp;cs=srgb&amp;w=360&amp;h=360&amp;fit=crop" alt="..." width="360" height="360"> 
                        </div>                         
                        <div class="p-4 w-full lg:w-8/12"> 
                            <svg viewBox="0 0 24 24" fill="currentColor" class="h-16 inline-block mb-4 text-primary-500 w-16"> 
                                <path d="M23 1V5.06504C21.9136 5.67931 21.0807 6.43812 20.5012 7.34146C19.958 8.24481 19.5416 9.20235 19.2519 10.2141C18.9621 11.2258 18.8173 12.346 18.8173 13.5745H23V22.4634H14.0914V16.935C14.0914 13.6107 14.3992 11.0813 15.0148 9.34688C15.6667 7.61246 16.6444 6.02258 17.9481 4.57723C19.2519 3.09575 20.9358 1.90334 23 1ZM9.90864 1V5.06504C8.82222 5.67931 7.9893 6.43812 7.40988 7.34146C6.83045 8.24481 6.39588 9.20235 6.10617 10.2141C5.81646 11.2258 5.67161 12.346 5.67161 13.5745H9.90864V22.4634H1V16.935C1 13.6107 1.30782 11.0813 1.92346 9.34688C2.57531 7.61246 3.55309 6.02258 4.85679 4.57723C6.16049 3.09575 7.84444 1.90334 9.90864 1Z"></path>                                 
                            </svg>                             
                            <p class="font-light mb-5 text-xl">Aliqua id fugiat nostrud irure ex duis ea quis id quis ad et. Sunt qui esse pariatur duis deserunt mollit dolore cillum minim tempor enim. Elit aute irure tempor cupidatat incididunt sint deserunt ut voluptate aute id deserunt nisi.</p> 
                            <h4 class="font-bold mb-1 text-2xl text-primary-500">Kathryn Murphy</h4>
                            <p class="text-white">Chief Technology Officer</p> 
                        </div>                         
                    </div>
                </div>                 
            </section>
            <section class="bg-primary-500 py-16 text-center text-gray-300"> 
                <div class="container mx-auto px-4 relative"> 
                    <h2 class="capitalize font-bold mb-6 text-4xl text-white">Download Our App &amp; Get Started</h2>
                    <div class="flex-wrap inline-flex items-center py-1 space-x-2"> 
                        <a href="#" class="border border-white hover:bg-white hover:inline-flex hover:items-center hover:space-x-2 hover:text-gray-900 inline-flex items-center px-6 py-2 space-x-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1.5em" height="1.5em" fill="currentColor" class="me-1">
                                <path d="M11.624 7.222c-.876 0-2.232-.996-3.66-.96-1.884.024-3.612 1.092-4.584 2.784-1.956 3.396-.504 8.412 1.404 11.172.936 1.344 2.04 2.856 3.504 2.808 1.404-.06 1.932-.912 3.636-.912 1.692 0 2.172.912 3.66.876 1.512-.024 2.472-1.368 3.396-2.724 1.068-1.56 1.512-3.072 1.536-3.156-.036-.012-2.94-1.128-2.976-4.488-.024-2.808 2.292-4.152 2.4-4.212-1.32-1.932-3.348-2.148-4.056-2.196-1.848-.144-3.396 1.008-4.26 1.008zm3.12-2.832c.78-.936 1.296-2.244 1.152-3.54-1.116.048-2.46.744-3.264 1.68-.72.828-1.344 2.16-1.176 3.432 1.236.096 2.508-.636 3.288-1.572z"></path>
                            </svg><span>App Store</span></a>
                        <a href="#" class="border border-white hover:bg-white hover:inline-flex hover:items-center hover:space-x-2 hover:text-gray-900 inline-flex items-center px-6 py-2 space-x-2 text-white"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="1.5em" height="1.5em" fill="currentColor" class="me-1">
                                <path d="M3.609 1.814L13.792 12 3.61 22.186a.996.996 0 0 1-.61-.92V2.734a1 1 0 0 1 .609-.92zm10.89 10.893l2.302 2.302-10.937 6.333 8.635-8.635zm3.199-3.198l2.807 1.626a1 1 0 0 1 0 1.73l-2.808 1.626L15.206 12l2.492-2.491zM5.864 2.658L16.802 8.99l-2.303 2.303-8.635-8.635z"></path>
                            </svg><span>Google Play</span></a> 
                    </div>                     
                </div>
            </section>
        </main>
        <footer class="bg-black bg-opacity-90 pt-12 text-gray-300"> 
            <div class="container mx-auto px-4 relative"> 
                <div class="flex flex-wrap -mx-4"> 
                    <div class="p-4 w-full lg:w-4/12"> 
                        <a href="#" class="font-bold font-sans hover:text-opacity-90 inline-flex items-center leading-none mb-4 space-x-2 text-3xl text-primary-500 uppercase"> <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="3em" xml:space="preserve" fill="currentColor" viewBox="0 0 100 100" height="3em">
                                <path d="M38.333 80a11.571 11.571 0 0 1-7.646-2.883A11.724 11.724 0 0 1 26.834 70H10V46.667L43.333 40l20-20H90v26.667H43.995l-27.328 5.465v11.2h11.166a11.787 11.787 0 0 1 4.212-4.807 11.563 11.563 0 0 1 12.577 0 11.789 11.789 0 0 1 4.213 4.807h7.833V70h-6.837a11.719 11.719 0 0 1-3.853 7.117A11.571 11.571 0 0 1 38.333 80Zm0-16.667a5 5 0 1 0 5 5 5.006 5.006 0 0 0-5.001-5Zm27.761-36.666L52.762 40h30.571V26.667Z"></path>
                                <path d="M56.667 63.333h-7.833a11.6 11.6 0 0 0-21 0H16.667v-11.2l27.328-5.465h12.672Z" opacity="0.2"></path>
                                <path d="M90 63.333H80v-10h-6.667v10h-10V70h10v10H80V70h10Z"></path>
                                <path d="M52.762 40h30.571V26.667H66.094Z" opacity="0.2"></path>
                            </svg><span>Prime Drive</span> </a>
                        <ul class="mb-4 space-y-1">
                            <li>9056 Fairground Ave., New York, USA</li>
                            <li>
                                <a href="#" class="hover:text-gray-400 text-white">+0 123 456 7890</a>
                            </li>
                            <li>
                                <a href="mailto:hello@fafo.com" class="hover:text-gray-400 text-white">info@company.com</a>
                            </li>
                        </ul>                         
                        <div class="flex-wrap inline-flex space-x-3"> 
                            <a href="#" aria-label="facebook" class="hover:text-gray-400"> <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"> 
                                    <path d="M14 13.5h2.5l1-4H14v-2c0-1.03 0-2 2-2h1.5V2.14c-.326-.043-1.557-.14-2.857-.14C11.928 2 10 3.657 10 6.7v2.8H7v4h3V22h4v-8.5z"/> 
                                </svg></a> 
                            <a href="#" aria-label="twitter" class="hover:text-gray-400"> <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"> 
                                    <path d="M22.162 5.656a8.384 8.384 0 0 1-2.402.658A4.196 4.196 0 0 0 21.6 4c-.82.488-1.719.83-2.656 1.015a4.182 4.182 0 0 0-7.126 3.814 11.874 11.874 0 0 1-8.62-4.37 4.168 4.168 0 0 0-.566 2.103c0 1.45.738 2.731 1.86 3.481a4.168 4.168 0 0 1-1.894-.523v.052a4.185 4.185 0 0 0 3.355 4.101 4.21 4.21 0 0 1-1.89.072A4.185 4.185 0 0 0 7.97 16.65a8.394 8.394 0 0 1-6.191 1.732 11.83 11.83 0 0 0 6.41 1.88c7.693 0 11.9-6.373 11.9-11.9 0-.18-.005-.362-.013-.54a8.496 8.496 0 0 0 2.087-2.165z"/> 
                                </svg></a> 
                            <a href="#" aria-label="instagram" class="hover:text-gray-400"> <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"> 
                                    <path d="M12 2c2.717 0 3.056.01 4.122.06 1.065.05 1.79.217 2.428.465.66.254 1.216.598 1.772 1.153a4.908 4.908 0 0 1 1.153 1.772c.247.637.415 1.363.465 2.428.047 1.066.06 1.405.06 4.122 0 2.717-.01 3.056-.06 4.122-.05 1.065-.218 1.79-.465 2.428a4.883 4.883 0 0 1-1.153 1.772 4.915 4.915 0 0 1-1.772 1.153c-.637.247-1.363.415-2.428.465-1.066.047-1.405.06-4.122.06-2.717 0-3.056-.01-4.122-.06-1.065-.05-1.79-.218-2.428-.465a4.89 4.89 0 0 1-1.772-1.153 4.904 4.904 0 0 1-1.153-1.772c-.248-.637-.415-1.363-.465-2.428C2.013 15.056 2 14.717 2 12c0-2.717.01-3.056.06-4.122.05-1.066.217-1.79.465-2.428a4.88 4.88 0 0 1 1.153-1.772A4.897 4.897 0 0 1 5.45 2.525c.638-.248 1.362-.415 2.428-.465C8.944 2.013 9.283 2 12 2zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm6.5-.25a1.25 1.25 0 0 0-2.5 0 1.25 1.25 0 0 0 2.5 0zM12 9a3 3 0 1 1 0 6 3 3 0 0 1 0-6z"/> 
                                </svg></a>
                            <a href="#" aria-label="linkedin" class="hover:text-gray-400"> <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"> 
                                    <path d="M6.94 5a2 2 0 1 1-4-.002 2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z"/> 
                                </svg></a>
                            <a href="#" aria-label="youtube" class="hover:text-gray-400"> <svg viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"> 
                                    <path d="M21.543 6.498C22 8.28 22 12 22 12s0 3.72-.457 5.502c-.254.985-.997 1.76-1.938 2.022C17.896 20 12 20 12 20s-5.893 0-7.605-.476c-.945-.266-1.687-1.04-1.938-2.022C2 15.72 2 12 2 12s0-3.72.457-5.502c.254-.985.997-1.76 1.938-2.022C6.107 4 12 4 12 4s5.896 0 7.605.476c.945.266 1.687 1.04 1.938 2.022zM10 15.5l6-3.5-6-3.5v7z"/> 
                                </svg></a> 
                        </div>                         
                    </div>                     
                    <div class="p-4 w-full sm:w-6/12 md:flex-1 lg:w-3/12">
                        <h2 class="font-bold text-color3-500 text-xl">Company</h2>
                        <hr class="border-gray-600 inline-block mb-6 mt-4 w-3/12">
                        <ul> 
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">FAQ</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">News</a> 
                            </li>                             
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Careers</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">About Us</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Contact Us</a> 
                            </li>                             
                        </ul>
                    </div>
                    <div class="p-4 w-full sm:w-6/12 md:flex-1 lg:w-3/12">
                        <h2 class="font-bold text-color3-500 text-xl">Vehicles</h2>
                        <hr class="border-gray-600 inline-block mb-6 mt-4 w-3/12">
                        <ul> 
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">SUVs</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Sedans</a> 
                            </li>                             
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Mini Vans</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Sports Cars</a> 
                            </li>
                            <li class="mb-4"> 
                                <a href="#" class="hover:text-gray-400">Convertibles</a> 
                            </li>                             
                        </ul>
                    </div>
                    <div class="p-4 w-full md:w-5/12 lg:w-4/12"> 
                        <h2 class="font-bold text-color3-500 text-xl">Top Cities</h2>
                        <hr class="border-gray-600 inline-block mb-6 mt-4 w-3/12">
                        <div class="-mx-4 flex flex-wrap"> 
                            <div class="pb-4 px-4 w-full sm:w-6/12"> 
                                <ul> 
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Taxes</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Boston</a> 
                                    </li>                                     
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Colorado</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">California</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Manhattan</a> 
                                    </li>                                     
                                </ul>
                            </div>
                            <div class="pb-4 px-4 w-full sm:w-6/12"> 
                                <ul> 
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Dallas</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Huston</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Seattle</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Denver</a> 
                                    </li>
                                    <li class="mb-4"> 
                                        <a href="#" class="hover:text-gray-400">Phoenix</a> 
                                    </li>                                     
                                </ul>
                            </div>                             
                        </div>                         
                    </div>                     
                </div>                 
                <div class="py-4"> 
                    <hr class="mb-4 opacity-25"> 
                    <div class="flex flex-wrap -mx-4  items-center"> 
                        <div class="px-4 py-2 w-full md:flex-1"> 
                            <p>&copy; 2002 - 2021. All Rights Reserved - Company Name</p> 
                        </div>                         
                        <div class="px-4 py-2 w-full md:w-auto"> 
                            <a href="#" class="hover:text-gray-400">Privacy Policy</a> |                      
                            <a href="#" class="hover:text-gray-400">Terms of Use</a> 
                        </div>                         
                    </div>                     
                </div>                 
            </div>             
        </footer>
    </body>



                        <!-- formulaire de reservation -->

                        <?php require_once ('formReservation.php') ; ?>







</html>
