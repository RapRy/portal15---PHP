<?php
    $contents = new Contents();

    $newGames = $contents->getContents($mysqli, $actives["catActive"], 97);
    $popularGames = $contents->getContents($mysqli, $actives["catActive"], 100);
    $upcomingGames = $contents->getContents($mysqli, $actives["catActive"], 102);

    $collections = [
        ["header" => "New Games", "contents" => $newGames],
        ["header" => "Popular Games", "contents" => $popularGames],
        ["header" => "Upcoming Games", "contents" => $upcomingGames]
    ];

    if(empty($newGames) && empty($popularGames) && empty($upcomingGames)){
        include('./components/comingsoon.php');
        return;
    }
?>
<div class="py-4">
    <?php
        foreach($collections as $collection):
            if(empty($collection["contents"])) break;
    ?>
            <div class="pt-8">
                <div class="flex flex-row flex-wrap justify-between items-end mb-5">
                    <h1 class="font-bold text-sm text-textColor1"><?php echo $collection["header"]; ?></h1>
                    <a class="text-xs font-medium text-textColor1 hover:text-primaryMain transition-colors duration-300 ease-in-out" href="#" all="see more">see more (<?php echo count($collection["contents"]); ?>)</a>
                </div>
                <div>
    <?php
                    $lengthCollection = count($collection["contents"]) - 1;
                    foreach($collection["contents"] as $ind=>$content):
    ?>
                        <div class="bg-neutralLight rounded-xl py-6 shadow-cardShadow <?php echo $ind === $lengthCollection ? "" : "mb-4"; ?>">
                            <div class="relative px-6 overflow-x-hidden">
                                <!-- link -->
                                <a class="contentLink" href="#" alt="link">
                                    <div class="h-20 w-full flex flex-row flex-nowrap justify-start gap-4 items-center">
                                        <div class="w-28 h-20 rounded-2xl overflow-hidden">
                                            <img class="w-full transform -translate-y-4" src="<?php echo $content['icon']; ?>" alt="<?php echo $content['title']; ?>">
                                        </div>
                                        <div class="flex-grow">
                                            <h4 class="font-bold text-lg text-textColor1 overflow-ellipsis overflow-x-hidden whitespace-nowrap"><?php echo $content['title']; ?></h4>
                                            <span class="font-medium text-sm text-textColor2"><?php echo $content['subcategory']; ?></span>
                                        </div>
                                    </div>
                                </a>
                                <div class="absolute w-20 h-16 top-2 left-0 bg-secondaryMain rounded-xl contentCustomTranslateX transition-transform duration-200 delay-75 ease-in-out"></div>
                            </div>
                            <div class="px-6 py-4">
                                <p class="text-xs text-textColor2 overflow-ellipsis overflow-x-hidden whitespace-nowrap"><?php echo $content['description']; ?></p>
                            </div>
                            <div class="px-6 pt-2">
                                <!-- link -->
                                <a href="#" class="rounded-md px-4 py-2 mr-2 hover:bg-neutralMain transition-colors duration-300 ease-in-out delay-75" alt="Play">
                                    <svg class="inline-block fill-current text-secondaryDark" xmlns="http://www.w3.org/2000/svg" viewBox="0 -4 24 24" width="20" height="20" preserveAspectRatio="xMinYMin" class="icon__icon"><path d="M7 5h1a1 1 0 1 1 0 2H7v1a1 1 0 1 1-2 0V7H4a1 1 0 1 1 0-2h1V4a1 1 0 1 1 2 0v1zm2.318-4h5.364A6 6 0 0 1 24 6c0 3.314-2.686 10-6 10-1.976 0-3.729-2.378-4.822-5h-2.356C9.73 13.622 7.976 16 6 16 2.686 16 0 9.314 0 6a6 6 0 0 1 9.318-5zm5.968 2H8.714l-.504-.335A4 4 0 0 0 2 6c0 3.117 2.542 8 4 8 .722 0 2.004-1.438 2.976-3.77L9.49 9h5.022l.513 1.23C15.996 12.562 17.278 14 18 14c1.458 0 4-4.883 4-8a4 4 0 0 0-6.21-3.335L15.286 3zM18 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm4 0a1 1 0 1 1 0-2 1 1 0 0 1 0 2zm-2 2a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                                    <span class="text-sm text-secondaryDark font-medium">Play</span>
                                </a>
                                <a href="#" class="rounded-md px-4 py-2 hover:bg-neutralMain transition-colors duration-300 ease-in-out delay-75" alt="Details">
                                    <svg class="inline-block fill-current text-primaryDark" xmlns="http://www.w3.org/2000/svg" viewBox="-2 -2 24 24" width="20" height="20" preserveAspectRatio="xMinYMin" class="icon__icon"><path d="M10 20C4.477 20 0 15.523 0 10S4.477 0 10 0s10 4.477 10 10-4.477 10-10 10zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0-10a1 1 0 0 1 1 1v5a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm0-1a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path></svg>
                                    <span class="text-sm text-primaryDark font-medium">Details</span>
                                </a>
                            </div>
                        </div>
    <?php
                        if($ind === 2) break;
                    endforeach;
    ?>
                </div>
            </div>
    <?php
        endforeach;
    ?>
</div>