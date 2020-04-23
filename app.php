<?php
// Made by Quix
if(empty($_GET['udid']))
    die('No UDID Supplied');
$apps = array_filter(glob('apps/*'), 'is_dir');
$cert = json_decode(file_get_contents('database.json'), true)['Devices'][$_GET['udid']]['Cert'];
foreach($apps as $app){
    $app = substr($app, 5);
    $size = filesize('https://app.signed.sh/apps/' . $app . '/' . $app . '.ipa');
    echo '<div class="app">
        <div class="AppName">' . $app . '</div>
        <img class="AppIcon" src="apps/' . $app . '/' . $app . '.png">
        <div class="AppSize">' . $size . '</div>
        <a class="AppLink" href="itms-services://?action=download-manifest&url=https://app.signed.sh/apps/' . $app . '/' . $app . '_' . $cert . '.plist">Download</a>
    </div>';
}
