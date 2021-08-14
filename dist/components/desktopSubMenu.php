<div class="hidden lg:block mt-10">
    <?php
        if(!empty($subcategories)):
    ?>
    <div class="relative inline-block mr-4">
        <div id="categoriesBtn" class="cursor-pointer relative z-50 py-2 px-5 <?php echo ($activeSub === "Home" || $activeSub === "Top Charts" || $activeSub === "New Releases" || $activeSub === "") ? "bg-neutralDark" : "bg-primaryLight"; ?> rounded-md">
            <span class="inline-block text-textColor1 font-bold text-sm">Categories</span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-5 -7 24 24" width="24" height="24" preserveAspectRatio="xMinYMin" class="icon__icon inline-block"><path d="M1 0h6a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0 8h8a1 1 0 1 1 0 2H1a1 1 0 1 1 0-2zm0-4h12a1 1 0 0 1 0 2H1a1 1 0 1 1 0-2z"></path></svg>
        </div>
        <div id="desktopSubCategories" class="absolute h-0 top-0 left-0 w-full z-40 overflow-y-hidden bg-neutralDark rounded-md">
            <ul class="opacity-0 mb-1">
                <?php
                    foreach($subcategories as $subcategory):
                ?>
                        <li class="pt-2 mx-1">
                            <a class="subMenuItem text-textColor1 text-sm font-bold py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === $subcategory['sub_category'] ? "bg-primaryLight active" : "" ?>" href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub={$subcategory['sub_category']}"; ?>" alt="<?php echo $subcategory['sub_category']; ?>">
                                <?php echo $subcategory['sub_category']; ?>
                            </a>
                        </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </div>
    </div>
    <?php
        endif;
    ?>
    <div class="inline-block">
        <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}"; ?>" alt="Home" class="subMenuItem text-textColor2 text-sm font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Home" ? "bg-primaryLight active" : "" ?>">Home</a>
    </div>
    <div class="inline-block">
        <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=Top-Charts"; ?>" alt="Top Charts" class="subMenuItem text-textColor2 text-sm font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Top Charts" ? "bg-primaryLight active" : "" ?>">Top Charts</a>
    </div>
    <div class="inline-block">
        <a href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$actives['catActive']}&sub=New-Releases"; ?>" alt="New Releases" class="subMenuItem text-textColor2 text-sm font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "New Releases" ? "bg-primaryLight active" : "" ?>">New Releases</a>
    </div>
</div>