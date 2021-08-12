<div id="mobileSubMenu" class="relative bg-neutralDark mt-2 rounded-md overflow-y-hidden">
    <?php 
        $subMenu = new SubMenu();

        $subcategories = $subMenu->getSubCategories($mysqli, $actives["catActive"]);

        $activeSub = str_replace("-", " ", $actives['subActive']);
    ?>
    <div id="activeMobileSubMenuContainer" class="p-4 border-b-4 border-neutralMain cursor-pointer">
        <span class="text-textColor1 text-base font-semibold">Home</span>
    </div>
    <div id="subMenuListContainer" class="p-4">
        <div class="pb-2">
            <a href="#" alt="Home" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Home" ? "bg-primaryLight active" : "" ?>">Home</a>
        </div>
        <div class="pb-2">
            <a href="#" alt="Top Charts" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "Top Charts" ? "bg-primaryLight active" : "" ?>">Top Charts</a>
        </div>
        <div class="pb-2">
            <a href="#" alt="New Releases" class="subMenuItem text-textColor2 text-base font-medium py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === "New Releases" ? "bg-primaryLight active" : "" ?>">New Releases</a>
        </div>
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
                        <a class="subMenuItem text-textColor1 text-base font-bold py-2 px-5 w-full inline-block rounded-md hover:bg-primaryMain transition-colors duration-300 ease-in-out delay-75 <?php echo $activeSub === $subcategory['sub_category'] ? "bg-primaryLight active" : "" ?>" href="#" alt="<?php echo $subcategory['sub_category']; ?>">
                            <?php echo $subcategory['sub_category']; ?>
                        </a>
                    </li>
            <?php
                endforeach;
            ?>
            </ul>
        </div>
    </div>
</div>