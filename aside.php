<?php
if($_SESSION['admin']==1){
echo '
<aside id="menu" class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      
        <div class="py-4 text-gray-500 dark:text-gray-400">
         <div>
          
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="index.php"
          >
            
            <img style="height: 70px; position: relative; transform: translate(50%,50%); margin-top: -30px; margin-top: -56px; margin-bottom: 53px;" src="logo.png" alt="">
          </a>
  

          <ul class="mt-6">
            <li class="relative px-6 py-3">

              <a
                class="text-gray-800 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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
                <!-- PURPLE LINE -->
                <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true">
              </span>   
              <!-- PURPLE LINE -->
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>


          <div>
          <ul id="table0">
              ';

              try {
                $conn = connectionDb();
                $statement = $conn->prepare("select *
                from pfe.table");
                $statement->execute();
                $sideResults = $statement->fetchall();
              } catch (PDOException $e) {
                  echo $e;
              }
              
              if (count($sideResults) != 0) {
                  // echo("not empty");
                  foreach ($sideResults as $row) {
                    // echo($row['Name']);
                    echo ('
                    <li class="flex relative px-6 py-3">

                    <a class="dark:text-gray-100 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.php?Id_table='.$row['Id_table'].'" >
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
      
      
                      <span  class="ml-4" style="width: 170%; width: 87%; overflow-wrap: break-word;">
                        <p id="table-name0">'.$row['Name'].'</p>
                      </span>

                      <!-- <button style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </button> -->

                      
                      

                    </div>
                    </a>
                    <button onclick="javascript:Edit(\'c\');" style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </buttons>

                    </li>
                    ');
                  }
              }

              echo '


            <!-- 

              $host="localhost";
              $user="root";
              $password="";
              $db="pfe";
              
              // Create connection
              $conn = new mysqli($host, $user, $password);
              
              try {
                // $conn = connectionDb();
                $statement = $conn->prepare("select *
                from table");
                $statement->execute();
                $Results = $statement->fetchall();
              } catch (PDOException $e) {
                  echo $e;
              }

              // if (count($Results) != 0) {
              //   echo("notempty");
              // }

             -->




            <!-- <li class="relative px-6 py-3">

              
              <a class="dark:text-gray-100 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.php" >
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


                <span  class="ml-4" style="width: 170%; width: 87%; overflow-wrap: break-word;">
                  <p id="table-name0">Sites francais </p>
                </span>
                <button style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </button>
              </div>
              </a>
            </li> -->
            
          </ul>
            </div>
          </div>

          <div class="px-6 my-6">
            <button
              onclick="javascript:createTable();"
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            Créer un tableau
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>';

      echo '    <div id="table" style="z-index: 70; display: none;" class=" fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center appear-done enter-done">
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
          <p class="mt-4 mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Créer un tableau</p>
          
          <form action="addTable.php" method="post">


          <div class="mb-6 text-sm text-gray-700 dark:text-gray-400">
          
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nom </span>
              
              <input id="tableName" name="tableName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="ex:tableau2">
            </label>          
          
          </div>
          <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

            <div class=" sm:block">
              <button onclick="javascript:hide();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-gray-600 border-gray-300 border dark:text-gray-400 focus:outline-none active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:shadow-outline-gray" type="button">
                Annuler</button>
            </div>
            <div class="sm:block cursor-pointer">
              

                <input type="submit" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-white bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple" value="J\'accepte">
            </div>
           </div>
           </form>

           <div data-focus-guard="true" tabindex="0" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;"></div></div></div>';
              }
     ?>




      <?php 
      
      if($_SESSION['admin']==0){
        echo'
        <aside id="menu" class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
      
        <div class="py-4 text-gray-500 dark:text-gray-400">
         <div>
          
          <a
            class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
            href="index.php"
          >
            
            <img style="height: 70px; position: relative; transform: translate(50%,50%); margin-top: -30px; margin-top: -56px; margin-bottom: 53px;" src="logo.png" alt="">
          </a>
  

          <ul class="mt-6">
            <li class="relative px-6 py-3">

              <a
                style="display:none;"
                class="text-gray-800 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
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
                <!-- PURPLE LINE -->
                <span
                class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true">
              </span>   
              <!-- PURPLE LINE -->
                <span class="ml-4">Dashboard</span>
              </a>
            </li>
          </ul>


          <div>
          <ul id="table0">
              ';

              try {
                $conn = connectionDb();
                $statement = $conn->prepare("select *
                from pfe.table");
                $statement->execute();
                $sideResults = $statement->fetchall();
              } catch (PDOException $e) {
                  echo $e;
              }
              
              if (count($sideResults) != 0) {
                  // echo("not empty");
                  foreach ($sideResults as $row) {
                    // echo($row['Name']);
                    echo ('
                    <li class="flex relative px-6 py-3">

                    <a class="dark:text-gray-100 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.php?Id_table='.$row['Id_table'].'" >
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
      
      
                      <span  class="ml-4" style="width: 170%; width: 87%; overflow-wrap: break-word;">
                        <p id="table-name0">'.$row['Name'].'</p>
                      </span>

                      <!-- <button style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </button> -->

                      
                      

                    </div>
                    </a>
                    <button onclick="javascript:Edit(\'c\');" style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </buttons>

                    </li>
                    ');
                  }
              }

              echo '


            <!-- 

              $host="localhost";
              $user="root";
              $password="";
              $db="pfe";
              
              // Create connection
              $conn = new mysqli($host, $user, $password);
              
              try {
                // $conn = connectionDb();
                $statement = $conn->prepare("select *
                from table");
                $statement->execute();
                $Results = $statement->fetchall();
              } catch (PDOException $e) {
                  echo $e;
              }

              // if (count($Results) != 0) {
              //   echo("notempty");
              // }

             -->




            <!-- <li class="relative px-6 py-3">

              
              <a class="dark:text-gray-100 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200" href="tables.php" >
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


                <span  class="ml-4" style="width: 170%; width: 87%; overflow-wrap: break-word;">
                  <p id="table-name0">Sites francais </p>
                </span>
                <button style="margin-right: 4px; margin-left: 5px;" class="mpy-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="">
                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                  </svg>
                </button>
              </div>
              </a>
            </li> -->
            
          </ul>
            </div>
          </div>

          <div class="px-6 my-6">
            <button
              onclick="javascript:createTable();"
              class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
            >
            Créer un tableau
              <span class="ml-2" aria-hidden="true">+</span>
            </button>
          </div>
        </div>
      </aside>';

      echo '    <div id="table" style="z-index: 70; display: none;" class=" fixed inset-0 z-40 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center appear-done enter-done">
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
          <p class="mt-4 mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">Créer un tableau</p>
          
          <form action="addTable.php" method="post">


          <div class="mb-6 text-sm text-gray-700 dark:text-gray-400">
          
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Nom </span>
              
              <input id="tableName" name="tableName" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="ex:tableau2">
            </label>          
          
          </div>
          <footer class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">

            <div class=" sm:block">
              <button onclick="javascript:hide();" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-gray-600 border-gray-300 border dark:text-gray-400 focus:outline-none active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:shadow-outline-gray" type="button">
                Annuler</button>
            </div>
            <div class="sm:block cursor-pointer">
              

                <input type="submit" class="align-bottom inline-flex items-center justify-center cursor-pointer leading-5 transition-colors duration-150 font-medium focus:outline-none px-4 py-2 rounded-lg text-sm text-white bg-purple-600 border border-transparent active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple" value="J\'accepte">
            </div>
           </div>
           </form>

           <div data-focus-guard="true" tabindex="0" style="width: 1px; height: 0px; padding: 0px; overflow: hidden; position: fixed; top: 1px; left: 1px;"></div></div></div>';
 


              }
      
      
      ?>