<div id="mobileSubMenu" class="block lg:hidden relative bg-neutralDark mt-10 rounded-md overflow-y-hidden">
    <div id="activeMobileSubMenuContainer" class="p-4 border-b-4 border-neutralMain cursor-pointer">
        <span class="text-textColor1 text-base font-semibold"><?php echo isset($_GET['sub']) ? $activeSub : "Home" ?></span>
    </div>
    <div id="subMenuListContainer" class="p-4">
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}"; ?>" alt="Home" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Home" ? "bg-primaryLight active" : "" ?>">Home</a>
        </div>
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=Top-Charts"; ?>" alt="Top Charts" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Top Charts" ? "bg-primaryLight active" : "" ?>">Top Charts</a>
        </div>
        <div class="pb-2">
            <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=New-Releases"; ?>" alt="New Releases" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "New Releases" ? "bg-primaryLight active" : "" ?>">New Releases</a>
        </div>

<?php
        if(!empty($subcategories)):
?>
        <div>
            <div class="pl-5">
                <span class="inline-block text-textColor1 text-base font-bold">Categories</span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-5 -7 24 24" width="24" height="24" preserveAspectRatio="xMinYMin" class="icon__icon inline-block"><path d="M1 0h6a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0 8h8a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0-4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2z"></path></svg>
            </div>
            <ul class="pl-5">
            <?php
                foreach($subcategories as $subcategory):
            ?>
                    <li class="pt-2">
                        <a class="subMenuItem text-textColor1 text-base font-bold py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === $subcategory['sub_category'] ? "bg-primaryLight active" : "" ?>" href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub={$subcategory['sub_category']}"; ?>" alt="<?php echo $subcategory['sub_category']; ?>">
                            <?php echo $subcategory['sub_category']; ?>
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