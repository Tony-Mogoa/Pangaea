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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet" />

    <link rel="icon" href="assets/img/logo.svg" type="image/svg" sizes="16x16" />
    <link rel="stylesheet" href="./assets/css/style.css" />

    <script src="https://kit.fontawesome.com/1239ccb1ec.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <title>Pangaea</title>
</head>

<body>
    <!-- html files will be injected into the divs defined here-->
    <div id="navbar"></div>

    <!-- JS file injections-->
    <script>
        $(function() {
            $("#navbar").load("./components/navbar.php");
        });
    </script>

    <div class="flex flex row items-center p-12 ">
        <!--Left-->
        <div>
            <div>
                <i class="far fa-thumbs-up text-gray-400"></i>
                <p class="text-gray-500">4.4K</p>
            </div>

            <div>
                <i class="fas fa-share text-gray-400"></i>
                <p class="text-gray-500">18</p>
            </div>
        </div>

        <!--Right-->
        <div class="p-10 m-2">
            <p class="text-2xl font-bold text-center mb-8">How I grew my youtube channel</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget quam arcu. Donec felis turpis, luctus in felis laoreet, facilisis consectetur orci. Quisque at elit augue. Sed venenatis risus vitae pulvinar porttitor. Duis tempor lacinia mauris, venenatis tristique enim venenatis in. Quisque nec dui facilisis, sodales lacus fermentum, vulputate tortor. Aliquam porttitor ut ante et vestibulum. Suspendisse et imperdiet mauris. Nulla imperdiet odio eu massa rhoncus, sit amet porta leo sodales. Cras porta tempor odio, a scelerisque nunc mollis sit amet. Nam sed tempor metus. Morbi sapien urna, varius a sem ornare, porttitor tempor risus. Quisque in risus ex. Sed sapien dui, scelerisque sed sodales posuere, bibendum nec sapien.

                Duis iaculis diam odio, ut commodo urna eleifend sit amet. Suspendisse potenti. Pellentesque nec tortor imperdiet, fermentum nulla id, euismod diam. Mauris ut enim vel nisi elementum malesuada. Nunc maximus risus eu rutrum facilisis. Donec vitae ligula sit amet dui pellentesque dictum non sit amet neque. Maecenas at nunc eget nibh efficitur sodales. Sed euismod magna nisl, ut efficitur mi commodo ullamcorper. Duis egestas, risus ut pellentesque aliquam, lacus metus euismod elit, quis pretium lectus eros scelerisque nibh.

                Pellentesque at urna mattis diam accumsan rutrum nec a lorem. Aenean tincidunt ac massa nec pretium. Nam ultrices vel turpis et porta. Integer blandit laoreet sodales. Cras ac diam augue. Suspendisse mollis efficitur urna nec feugiat. Ut mattis nisl vel metus semper, quis volutpat velit condimentum. Morbi et turpis viverra, egestas dolor hendrerit, ultricies neque. Quisque pharetra purus risus, id luctus purus vulputate eget. Nullam scelerisque odio a nulla dignissim eleifend. Ut tempus mi libero, in feugiat lorem mattis non. Aenean congue in purus et luctus. Vivamus ante augue, rhoncus ut tortor eu, ullamcorper blandit mi. Nullam tincidunt maximus sem eu imperdiet.

                Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris condimentum gravida congue. Curabitur condimentum, ligula quis congue varius, tortor mauris vulputate mauris, quis dapibus ante est at erat. Nam vel rutrum nisl, id porta erat. Proin id pellentesque nulla. Suspendisse pharetra volutpat enim quis posuere. Quisque scelerisque tincidunt nulla in finibus. Sed venenatis, nisi sit amet rutrum auctor, nulla nisl auctor sem, nec aliquam turpis erat eget urna. Maecenas in bibendum ligula, a tempus risus. Morbi hendrerit molestie velit eget euismod. Curabitur id libero id leo tincidunt fringilla ullamcorper eget sapien. Etiam felis nibh, rutrum sit amet nunc sed, aliquam sagittis nisl. Etiam pellentesque congue tempus. Aliquam laoreet neque ac lacus eleifend feugiat eu nec sapien. Suspendisse sagittis dolor et arcu posuere aliquam. Curabitur non pharetra mauris.

                Ut magna orci, lobortis et pulvinar sed, luctus et velit. Proin eget feugiat magna. Quisque interdum eleifend mauris, eget eleifend velit scelerisque in. Sed eget imperdiet nisi. Sed non leo sapien. Quisque pharetra viverra commodo. Pellentesque eu elementum magna, eu mollis nisi. Nullam imperdiet, eros a aliquam maximus, enim ex pellentesque ligula, a elementum odio lacus in velit. Integer facilisis tempus dolor ut accumsan. Donec commodo interdum mauris eget malesuada. Sed pharetra a dolor quis pulvinar. Praesent sit amet massa in nisl laoreet fermentum eget quis quam. Sed luctus nulla nec dui maximus, et ullamcorper sapien varius. Ut sit amet dolor euismod, tincidunt turpis eget, iaculis lorem. Proin varius quam lectus.</p>
        </div>
    </div>
</body>

</html>