<!DOCTYPE html>
<html lang="en" class="dark">
    <?php require('./helper_functions/connection.php'); ?>
    <?php require('./helper_functions/funcs.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/main.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <script src="./scripts/main.js" defer></script>
    <title>SITE NAME</title>
</head>
<body class="bg-neutralMain dark:bg-textColor2 relative font-poppins">
    <!-- <div class="mx-auto block lg:mx-0 lg:grid lg:grid-cols-custom lg:gap-x-10"> -->
    <div class="mx-auto block lg:mx-0 lg:flex lg:flex-row lg:flex-nowrap lg:gap-x-10">
        <?php include('./components/asideMenu.php'); ?>

        <main class="py-5 px-4 lg:px-0 lg:pr-10">
            <header class="flex flex-row items-center flex-wrap">
                <div class="w-14 h-14 inline-block relative z-0 lg:hidden">
                    <svg id="menuBurg" class="w-14 cursor-pointer inline-block fill-current text-textColor1 dark:text-neutralLight" xmlns="http://www.w3.org/2000/svg" viewBox="-5 -7 24 24" width="56" height="56" preserveAspectRatio="xMinYMin" class="icon__icon"><path d="M1 0h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2zm0 8h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2zm0-4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2z"></path></svg>
                </div>
                <h1 class="text-textColor1 dark:text-neutralLight inline-block text-3xl font-bold uppercase transform translate-x-2.5">Site name or logo</h1>
                <div class="flex-grow grid justify-items-end">
                    <div class="relative rounded-full h-7 w-12 bg-neutralDark dark:bg-textColor3">
                        <button id="modeToggle" class="absolute top-0.5 left-0.5 h-6 w-6 rounded-full bg-neutralLight dark:bg-textColor1"></button>
                    </div>
                </div>
            </header> 

            <!-- submenu start -->
            <?php
                $subMenu = new SubMenu();

                $subcategories = $subMenu->getSubCategories($mysqli, $actives["catActive"]);
        
                $activeSub = str_replace("-", " ", $actives['subActive']);
            ?>
            <?php include('./components/mobileSubMenu.php'); ?>
            <?php include('./components/desktopSubMenu.php'); ?>
            <!-- submenu end -->

            <?php
                if(isset($_GET['sub'])){
                    if($_GET['sub'] === "Home") include('./components/home.php'); 
                    // temporary page for new releases & top charts
                    if(str_replace("-", " ", $_GET['sub']) === "Top Charts" || str_replace("-", " ", $_GET['sub']) === "New Releases"){
                        include('./components/comingsoon.php');
                    }else{
                        include('./components/contentList.php');
                    }
                }else{
                    include('./components/home.php');
                }
            ?>
        </main>
    </div>
</body>
</html>