<?php
session_start();

if(!isset($_SESSION['userId'])){
    header("Location: login.php");
}

spl_autoload_register(function($name){
 $name = strtolower($name);
 require_once (getcwd()."/../logic/classes/$name.class.php");
});

$user = new Reader($_SESSION['userId']);

$firstname = empty($user->getFirstName())?"edit name":$user->getFirstName();
$lastname = empty($user->getLastName())?"edit name":$user->getLastName();
$email = $user->getEmail()
?>

<div class="relative">
    <div
        class="flex flex-row border border-gray-200 rounded-md p-1 items-center"
    >
       
        <span class="w-8 h-8 overflow-hidden rounded-full border shadow">
            <img id="avatar" src="assets/img/larry.jpeg" class="w-full h-full object-cover" alt="">
        </span>
        
        <span class="flex flex-col items-center mx-2">
            <span class="text-gray-500 text-xs"><?php echo $firstname ?></span>
            <span class="text-gray-500 text-xs"><?php echo $lastname ?></span>
        </span>
        <div
            class="mx-2 w-6 h-6 rounded-full hover:bg-gray-200 flex justify-center items-center"
        >
            <button id="drop-down-btn" class="focus:outline-none">
                <i class="fas fa-chevron-down text-gray-400 mx-2"></i>
            </button>
        </div>
        <div
            class="hidden absolute shadow text-sm top-16 right-0 rounded z-50 bg-white border text-gray-500 py-3"
            id="drop-down-list"
        >
            <ul class="flex flex-col items-center w-full">
                <li class="px-10 py-5 w-full border-b mb-1"><?php echo $email?></li>
                <a
                    href="logic/procedures/logout.php"
                    class="px-10 py-3 hover:bg-indigo-500 hover:text-white w-full"
                >
                    Logout
                </a>
                <a
                    href="profile.php"
                    class="px-10 py-3 hover:bg-indigo-500 hover:text-white w-full"
                >
                    Profile
                </a>
                <a
                    href="stories.php"
                    class="px-10 py-3 hover:bg-indigo-500 hover:text-white w-full"
                >
                    Stories
                </a>
            </ul>
        </div>
    </div>
</div>

<script>
    let isOpen = false;
    $("#drop-down-btn").click(function (event) {
        event.stopPropagation();
        $("#drop-down-list").removeClass("hidden");
        isOpen = true;
    });

    window.onclick = function (event) {
        if (isOpen) {
            $("#drop-down-list").addClass("hidden");
            isOpen = false;
        }
    };
</script>
