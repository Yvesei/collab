<?php 
session_start();

// echo($_GET['Id_table']);
include "conn.php";


if(!isset($_SESSION['name'])){
    header('location:/project/public/pages/login.php');
    exit();
}

else{ 

  try {
    $conn = connectionDb();
    $statement = $conn->prepare("SELECT * FROM pfe.site natural join pfe.table
    where Id_table = ?");
    $statement->bindParam(1, $_GET['Id_table']);
    $statement->execute();

    $Results = $statement->fetchall();
  } catch (PDOException $e) {
      echo $e;
  }

  
  try {
    // $conn = connectionDb();
    $statement = $conn->prepare("SELECT Name FROM pfe.table where Id_table = ?");
    $statement->bindParam(1, $_GET['Id_table']);
    $statement->execute();

    $tName = $statement->fetchall();
  } catch (PDOException $e) {
      echo $e;
  }

  $tableName = $tName[0]['Name'];

  if (empty($tableName)) {
    header('Location: ' . 'index.php');
  }
            
?>

<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Oriental Group</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"
    />
    <link rel="stylesheet" href="style.css">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
      defer
    ></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>
    <script src="functions.js"></script>
  </head>




  <body
    style="width:100%"
  >


  <script>
    function Edit() {
    document.getElementById('edit').style.display = 'flex';


    
    // console.log(value);


}
function createLine(){
    var line = document.getElementById('line');
    var clone = line.cloneNode(true);
    line.parentNode.appendChild(clone);
    clone.style.display = '';
}
  </script>


    <div
      class="flex  bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
      style=" height:100vh; width: 100%;"
    >
      <!-- Desktop sidebar -->


      <?php include "aside.php"; ?>
      



      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
      ></div>
      <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
      >
        <div class="py-4 text-gray-500 dark:text-gray-400">

          <!--  logo -->
           <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="#"
          >
            <img style="height: 70px; position: relative; transform: translate(50%,50%); margin-top: -30px; margin-top: -56px; margin-bottom: 53px;" src="logo.png" alt="">
          </a>

          <!-- Dashboard  -->
            <ul class="mt-6">
              <li class="relative px-6 py-3">

                <a
                  class="inline-flex items-center w-full text-sm font-semibold  transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                  href="index.php"
                >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path
                      d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                    ></path>
                  </svg>
                  <span class="ml-4">Dashboard</span>
                </a>
              </li>
            </ul>






          <!--  tables...  -->
            <ul>
              <li class="relative px-6 py-3">
                <a class=" text-gray-800 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                 href="tables.php" >
                  <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                  >
                    <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                  </svg>
                  <div style="display:flex; width: 90%;;"> 


                    <span
                    class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"
                  ></span>


                  <span class="ml-4" style="width: 170%; width: 87%; overflow-wrap: break-word;">
                  
                    Sites francais


                  </span>
                  <button style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                    </svg>
                  </button>
                </div>
                </a>
              </li>
            </ul>










          <!--  create table  -->
          <div class="px-6 my-6">
            <button onclick="javascript:createTable();" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Créer un tableau
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>



        </div>
      </aside>

      <!--  main  -->

      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800" style="width:92%;">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >

            <!-- Mobile hamburger -->
            <button
              class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
              @click="toggleSideMenu"
              aria-label="Menu"
            >
              <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
              >
                <path
                  fill-rule="evenodd"
                  d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>

            <!-- Search input -->
            <button onclick="hideMenu();" id="ham" class="p-1 mr-5 -ml-1 rounded-md  focus:shadow-outline-purple" aria-label="Menu">
              <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
              </svg>
            </button>

            <div class="flex justify-center flex-1 lg:mr-32">
              <div
                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"
              >
                <div class="absolute inset-y-0 flex items-center pl-2">
                <button onclick="javascript:searchSite();" >
                  <svg
                    class="w-4 h-4"
                    aria-hidden="true"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                  </button>
                </div>
                <input
                  class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"
                  type="text"
                  id="search"
                  placeholder="chercher un site.."
                  aria-label="Search"
                />
              </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
             
             
              <!-- Theme toggler -->

              <li class="flex">
                <button
                  class="rounded-md focus:outline-none focus:shadow-outline-purple"
                  @click="toggleTheme"
                  aria-label="Toggle color mode"
                >
                  <template x-if="!dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                  </template>
                  <template x-if="dark">
                    <svg
                      class="w-5 h-5"
                      aria-hidden="true"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                    >
                      <path
                        fill-rule="evenodd"
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </template>
                </button>
              </li>


              <li class="flex">
                <p style="font-variant: all-small-caps;
    font-size: 24px;" class="dark:text-gray-300 text-gray-800 text-sm font-semibold "><?php echo $_SESSION['name'];?></p>
              </li>


              <!-- Profile menu -->
              <li style="margin-left: calc(0.4rem*(1 - var(--space-x-reverse))); " class="relative">
                <button
                  class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                  @click="toggleProfileMenu"
                  @keydown.escape="closeProfileMenu"
                  aria-label="Account"
                  aria-haspopup="true"
                >
                  <img
                    class="object-cover w-8 h-8 rounded-full"
                    src="profile.png"
                    alt=""
                    aria-hidden="true"
                  />
                </button>
                <template x-if="isProfileMenuOpen">
                  <ul
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    @click.away="closeProfileMenu"
                    @keydown.escape="closeProfileMenu"
                    class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700"
                    aria-label="submenu"
                  >
                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="profile.php"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                          ></path>
                        </svg>
                        <span>Profile</span>
                      </a>
                    </li>

                    <li class="flex">
                      <a
                        class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                        href="/project/public/logout.php"
                      >
                        <svg
                          class="w-4 h-4 mr-3"
                          aria-hidden="true"
                          fill="none"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          viewBox="0 0 24 24"
                          stroke="currentColor"
                        >
                          <path
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                          ></path>
                        </svg>
                        <span>Déconnection</span>
                      </a>
                    </li>
                  </ul>
                </template>
              </li>
            </ul>
          </div>
        </header>


        <!--  main stuff   -->

        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
          <form action="saveSites.php" method="post" onSubmit="return formSubmit('formId');" id="formId">

            <input hidden name="Id_table" value="<?php echo $_GET['Id_table'] ?>">
            
            <h2
            style="justify-content: space-between; width:90%"
              class="flex my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              <p id="name-above" ><?php echo $tableName;?></p>
              <div class="flex">
                <button onclick="javascript:createLine();"
                style="height: 39px;"  
                class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" type="button">
                  <span>Nouveau ligne</span>
                  <span class="ml-2" aria-hidden="true">+</span>
                </button>
                

                <!-- <button
                style="margin-left: 15px;"
                class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                  <span>Enregistrer</span>
                  <span class="ml-2" aria-hidden="true">></span>
                </button> -->
                <input type="submit"
                style="margin-left: 15px;"
                class=" flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" value="Enregistrer">
                  <!-- <span>Enregistrer</span> -->
                  <span class="ml-2" aria-hidden="true"></span>
            </input>
              </div>
            </h2>

            <!-- CTA -->

            <!-- Cards -->


            <!-- New Table -->
            
            <div style="width:90%"  class=" overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table id="mytable" class="w-full whitespace-no-wrap ">
                  <thead>
                    <tr
                      class="ce text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                      >
                      <th  colspan="1" style=" color: #7e3af2 ;" class="px-4 py-3"></th>

                      <th id="orga" colspan="2" style=" color: #7e3af2 ;" class="px-4 py-3">oriental group</th>

                      <th id="user" colspan="2" style=" color: #7e3af2 ; "class="px-4 py-3"><span style="right: 28px; position: relative;"> Username</span></th>

                      <th id="orga" style=" color: #7e3af2 ;" class="px-4 py-3"></th>

                    </tr> 

                  </thead>
                  <thead>
                    <tr 
                      class="ce text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Site</th>
                      <th id="Login" class="px-4 py-3">Login</th>
                      <th id="pass" class="px-4 py-3">mot de passe</th>
                      <th class="px-4 py-3">Works ?</th>
                      <th class="px-4 py-3">comment</th>
                      <th class="px-4 py-3"></th>
                    </tr>
                  </thead>
                  <tbody
                    class=" ce bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >

                  <!--   hidden line   -->

                 

                  <tr id="line" style="display:none;" class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3" style=" display: flex;justify-content: center; ">
                            <svg style="align-self: center; margin-right: 10px; " class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                            </svg>
                            <input value="" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="url" name="Url[]">                       
                      </td>
                      <td class="w200 px-4 py-3 text-sm">
                        <input value="" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="email" name="Email[]">

                      </td><td class="px-4 py-3 text-xs">
                        <input value="" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="mot de passe" name="Pass[]">

                      </td>
                      <td class="px-4 py-3 text-sm">
                        <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" checked="" name="checkbox[]">
                      </td>
                      <td class="w-200 x-4 py-3 text-sm">
                        <input value="" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Pourquoi ?" name="comment[]">
                      </td>
                      <td class=" x-4 oy-3 text-sm">
                        <a href="deleteSite.php?Id_site=1" onclick="javascript:deleteLine();" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                          </svg>
                        
                      </a></td>
                      
                      </tr>
                  
                  <?php 
                    if (count($Results) != 0) {
                      foreach ($Results as $row) {
                      // echo $row['Id_site'];
                      
                    
                      $checkbox = $row['Works'];
                      if ($row['Works'] == 1){
                        $checkbox = "checked";
                      } else {
                        $checkbox = '';
                      }


                    echo '
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3" style=" display: flex;justify-content: center; ">
                          
                            <svg style="align-self: center; margin-right: 10px; " class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                              <path d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                            </svg>
                            <input id="sit" name="Url[]" value="'.$row['Url'].'" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="url">
                          
                        
                      </td>
                      <td class="w200 px-4 py-3 text-sm">
                        <input name="Email[]" value="'.$row['Email'].'" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="email">

                      <td class="px-4 py-3 text-xs">
                        <input name="Pass[]" value="'.$row['Pass'].'" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="mot de passe">

                      </td>
                      <td class="px-4 py-3 text-sm">
                        <input name="checkbox[]" type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"'.' '.$checkbox.'>
                      </td>
                      <td class="w-200 x-4 py-3 text-sm">
                        <input name="comment[]" value="'.$row['comment'].'" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Pourquoi ?">
                      </td>
                      <td class=" x-4 oy-3 text-sm">
                        <a href="deleteSite.php?Id_site='.$row['Id_site'].'" onclick="javascript:deleteLine();" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                          </svg>
                        </aa>
                      </td>
                      </td>
                      </tr>';
                    }
                  }
                    ?>



                  </tbody>
                </table>






              </div>
           
            </div>

            <!-- Charts -->
           
            </form>
          </div>
        </main>
      </div>
    </div>






<!--             rename table form                               -->



<div id="edit" style="z-index: 70; display: none;" class=" fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center appear-done enter-done">
      <div  class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl appear-done enter-done" role="dialog">
        <div data-focus-guard="true" tabindex="0" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;">
        </div>
        <div data-focus-guard="true" tabindex="1" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;">
        </div>
        <div data-focus-lock-disabled="false">
          <header class="flex justify-end">
            <button onclick="javascript:hide();"  class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close">
              <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
              </svg>
            </button>
          </header>

          <form action="renameTable.php" method="POST">

            <div class="flex" style="justify-content: space-between; align-items: center;">
          <p class="mt-4 mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Renommer</p>


          <a href="deleteTable.php?Id_table=<?php echo $_GET['Id_table'] ?>" onclick="javascript:deleteLine();" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">



                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                          </svg>
                        
                      </a></div>

          <div class="mb-6 text-sm text-gray-700 dark:text-gray-400">
          
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nom </span>
                
              <input name="Id_table" value="<?php echo $_GET['Id_table'] ?>" name="Id_table" hidden>


              <input id="table-input" name="tableName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" value="<?php echo $tableName ?>">
            </label>          
          
          </div>
          <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

            <div class=" sm:block">
              <button onclick="javascript:hide();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-gray-600 border-gray-300 border dark:text-gray-400 focus:outline-none active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:shadow-outline-gray" type="button">
                Annuler</button>
            </div>
            <div class="sm:block">
              <input onclick="EditTable();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-white bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple" type="submit" value=" j'accepte">
              </input>
            </div>
            </form>
      </div>





  <div data-focus-guard="true" tabindex="0" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;"></div></div></div>










      <!--   Create organisation   i added hidden in class  -->
      <div  id="org" style="z-index: 70;" class="hidden fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center appear-done enter-done">
        <div class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl appear-done enter-done" role="dialog">
          <div data-focus-guard="true" tabindex="0" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;">
          </div>
          <div data-focus-guard="true" tabindex="1" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;">
          </div>
          <div data-focus-lock-disabled="false">
            <header class="flex justify-end">
              <button onclick="javascript:hide();" class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                  <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
              </button>
            </header>
            <p class="mt-4 mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Ajouter une organisation</p>
            <div class="mb-6 text-sm text-gray-700 dark:text-gray-400">
            
              <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nom </span>
                <input id="orgN" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="organisation...">
              </label>          
            
            </div>
            <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
              <div class=" sm:block">
                <button onclick="javascript:hide();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-gray-600 border-gray-300 border dark:text-gray-400 focus:outline-none active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:shadow-outline-gray" type="button">
                  Cancel</button>
              </div>
              <div class=" sm:block">
                <button onclick="javascript:Org();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-white bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple" type="button">
                  Accept</button>
              </div>
              </footer>
  

              <!-- edit table-->

        

  </body>



<script>

function formSubmit(formId){

var theForm = document.getElementById(formId); // get the form

var cb = theForm.getElementsByTagName('input'); // get the inputs

for(var i=0;i<cb.length;i++){ 
    if(cb[i].type=='checkbox' && !cb[i].checked)  // if this is an unchecked checkbox
    {
       cb[i].value = 0; // set the value to "off"
       cb[i].checked = true; // make sure it submits
    }
}

return true;

}


function searchSite(){
    let input, filter, table, tr, td, txtValue, inpu;
    input = document.getElementById("search").value;
    filter = input.toUpperCase();
    table = document.getElementById("mytable");
    tr = table.getElementsByTagName("tr");

    for (let i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[1];
      inpu = document.getElementById("sit");
        if (td) {
            txtValue = inpu.textContent || inpu.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }



  }
                   
                  



</script>

</html>





<?php  }  ?>