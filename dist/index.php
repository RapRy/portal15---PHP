<!DOCTYPE html>
<html lang="en">
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
<body class="bg-neutralMain relative font-poppins">
    <!-- <div class="mx-auto block lg:mx-0 lg:grid lg:grid-cols-custom lg:gap-x-10"> -->
    <div class="mx-auto block lg:mx-0 lg:flex lg:flex-row lg:flex-nowrap lg:gap-x-10">
        <?php include('./components/asideMenu.php'); ?>

        <main class="py-5 px-4 lg:px-0 lg:pr-10">
            <header>
                <div class="w-14 h-14 inline-block relative z-0 lg:hidden">
                    <svg id="menuBurg" class="w-14 cursor-pointer inline-block fill-current text-textColor1" xmlns="http://www.w3.org/2000/svg" viewBox="-5 -7 24 24" width="56" height="56" preserveAspectRatio="xMinYMin" class="icon__icon"><path d="M1 0h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2zm0 8h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2zm0-4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2z"></path></svg>
                </div>
                <h1 class="text-textColor1 inline-block text-3xl font-bold uppercase transform translate-y-1.5 translate-x-2.5">Site name or logo</h1>
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