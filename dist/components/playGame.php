<?php
    $game = getContentDetails($baseUrl, $_GET['gid'], $sid);
?>
<div class="py-4 h-full">
    <iframe id="game-frame" src="<?php echo "http://games.gamepix.com/play/{$_GET['gid']}?sid={$sid}" ?>" seamless="" width="100%" height="80%" frameborder="0" scrolling="no"></iframe>
</div>