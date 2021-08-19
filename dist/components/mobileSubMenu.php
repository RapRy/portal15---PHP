<div id="mobileSubMenu" class="block h-0 lg:hidden relative bg-neutralDark dark:bg-textColor1 mt-10 rounded-md overflow-y-hidden">
    <div id="activeMobileSubMenuContainer" class="p-4 border-b-4 border-neutralMain dark:border-textColor2 cursor-pointer">
        <span class="text-textColor1 dark:text-neutralLight text-base font-semibold"><?php echo isset($_GET['sub']) ? $activeSub : "Home" ?></span>
    </div>
    <div id="subMenuListContainer" class="p-4">
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}"; ?>" alt="Home" class="subMenuItem text-textColor2 dark:text-neutralMain text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo ($activeSub === "Home" || $activeSub === "Newest" || $activeSub === "Most Played") ? "bg-primaryLight active" : "dark:hover:text-textColor2" ?>">Home</a>
        </div>
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=Newest"; ?>" alt="Newest" class="subMenuItem text-textColor2 dark:text-neutralMain dark:hover:text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Top Charts" ? "bg-primaryLight active" : "dark:hover:text-textColor2" ?>">Newest</a>
        </div>
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=Most-Played"; ?>" alt="Most Played" class="subMenuItem text-textColor2 dark:text-neutralMain dark:hover:text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Most Played" ? "bg-primaryLight active" : "dark:hover:text-textColor2" ?>">Most Played</a>
        </div>

<?php
        if(!empty($subcategories)):
?>
        <div>
            <div class="pl-5">
                <span class="inline-block text-textColor1 dark:text-neutralLight text-base font-bold">Categories</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-5 -7 24 24" width="24" height="24" preserveAspectRatio="xMinYMin" class="icon__icon inline-block fill-current text-textColor1 dark:text-neutralLight"><path d="M1 0h6a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0 8h8a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0-4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2z"></path></svg>
            </div>
            <ul class="pl-5">
            <?php
                foreach($subcategories as $subcategory):
            ?>
                    <li class="pt-2">
                        <a class="subMenuItem text-textColor1 dark:text-neutralLight text-base font-bold py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === $subcategory['name'] ? "bg-primaryLight active" : "dark:hover:text-textColor1" ?>" href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub={$subcategory['id']}"; ?>" alt="<?php echo $subcategory['name']; ?>">
                            <?php echo $subcategory['name']; ?>
                        </a>
                    </li>
            <?php
                endforeach;
            ?>
            </ul>
        </div>
<?php
        endif;
?>
    </div>
</div>