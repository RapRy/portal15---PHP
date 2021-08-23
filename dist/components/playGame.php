<?php
    $game = getContentDetails($baseUrl, $_GET['gid'], $sid);
?>
<div class="py-4">
    <iframe id="game-frame" src="<?php echo $game['url']; ?>" seamless="" width="100%" height="100%" frameborder="0" scrolling="no"></iframe>
</div>