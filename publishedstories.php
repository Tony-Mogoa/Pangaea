<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap"
            rel="stylesheet"
        />

        <link
            rel="icon"
            href="assets/img/logo.svg"
            type="image/svg"
            sizes="16x16"
        />
        <link rel="stylesheet" href="./assets/css/style.css" />

        <script
            src="https://kit.fontawesome.com/1239ccb1ec.js"
            crossorigin="anonymous"
        ></script>
        <script src="assets/js/main.js"></script>
        <title>Pangaea</title>
    </head>
<body>
    <!-- html files will be injected into the divs defined here-->
    <div id="navbar"></div>

    <!-- JS file injections-->
    <script>
        $(function () {
            $("#navbar").load("./components/navbar.php");
        });
    </script>

    <!--Buttons-->
    <div>
        <div class="flex p-10 space-x-2">
            <button
                class="rounded-md text-blue-500 bg-white-500 w-full py-4 px-7 text-xs font-bold border border-gray-100 hover:bg-blue-300"
            >
                Drafts
            </button>

            <button
                class="rounded-md bg-white-500 text-blue-500 w-full py-4 px-7 text-xs font-bold border border-gray-100 hover:bg-blue-300"
            >
                Saved
            </button>

            <button
                class="rounded-md text-white bg-blue-500 w-full py-4 px-7 text-xs font-bold border border-gray-100 hover:bg-blue-300"
            >
                Published
            </button>
        </div>

        <!--Drafts State-->
        <div>
            <p class="text-5xl text-center text-black-500 py-2 px-4">You have no Drafts</p>
        </div>
        
       
        <div class="p-12">
            <!--Articles display-->
            <div class="grid grid-flow-col grid-cols-3 grid-rows-2 gap-4">
                
                <!--Article 1-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                <!--Article 2-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                <!--Article 3-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                <!--Article 4-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                <!--Article 5-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                <!--Article 6-->
                <div class="border border-gray-100 rounded-md">
                    <img src="\App\assets\img\person working.jpg" alt="" srcset="">
                    
                    <div class="flex text-gray-500 p-4 m-0 sm:w-8/12 w-full space-x-2 font-bold ">
                        <!--Tag-->
                        <p>Development</p>
                        <!--Date-->
                        <p class="text-right">July 2, 2020</p>
                    </div>
                    <!--Title-->
                   <p class="font-bold">Hybrid vs Nature - Here is how you can chose one over the other</p>
                   
                   <!--Statistics-->
                   <div class="border border-gray-100 rounded-md m-2">
                       <div class="flex space-x-10 ">
                            <p class="text-gray-500">THIS MONTH</p>
                            <a href="http://" class="text-blue-500" >MORE</a>
                       </div>
                       <div class="grid grid-cols-2 divide-x divide-gray-100">
                           <div>
                               <p class="text-green-500 font-bold">KES</p>
                               <p class="text-gray-500 font-bold text-4xl">3489</p>
                           </div>
                           <div>
                               <p class="text-green-500 font-bold">VIEWS</p>
                               <p class="text-gray-500 font-bold text-4xl">2.4K</p>
                           </div>
                       </div>
                   </div>
                </div>

                

            </div>

        </div>

    </div>

    
</body>
</html>