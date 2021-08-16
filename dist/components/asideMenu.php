<aside id="asideNavContainer" class="absolute left-0 top-0 z-10 w-full h-full lg:w-max lg:h-auto hidden lg:block lg:relative lg:flex-none">
    <div id="asideNav" class="shadow-shadowRight w-64 bg-neutralLight dark:bg-textColor1 min-h-full h-screen pt-24 px-5 relative top-0 -left-full z-10 overflow-x-hidden lg:left-0">
    <?php
        foreach($categories as $category):
    ?>
            <div class="relative py-3 px-2 my-2 h-12">
                <a class="relative z-10 px-2 asideMenuItem <?php echo $actives['catActive'] === $category['link'] ? "active" : ""; ?>" href="<?php echo "{$_SERVER['PHP_SELF']}?cat={$category['link']}"; ?>" alt="<?php echo $category["name"]; ?>">
                    <svg class="inline-block fill-current text-textColor1 dark:text-neutralLight mr-3" xmlns="http://www.w3.org/2000/svg" viewBox="-2.5 -2.5 24 24" width="19" height="19" preserveAspectRatio="xMinYMin" class="icon__icon"><path d="<?php echo $category["path"]; ?>"></path></svg>
                    <span class="text-textColor1 dark:text-neutralLight font-medium text-sm"><?php echo $category["name"]; ?></span>
                </a>
                <div class="w-full h-full bg-primaryMain rounded-2xl absolute top-0 left-0 z-0 customTranslateX transition-transform duration-200 delay-75 ease-in-out"></div>
            </div>
    <?php
        endforeach;
    ?>
    </div>
    <div id="asideNavBackdrop" class="bg-textColor1 opacity-0 w-full min-h-full h-screen absolute letf-0 top-0 z-0 block lg:hidden"></div>
</aside>