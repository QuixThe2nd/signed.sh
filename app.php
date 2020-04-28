<?php
// Made by Quix
?>
<!DOCTYPE html>
<html class="theme-dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#2196f3">
    <meta http-equiv="Content-Security-Policy" content="default-src * 'self' 'unsafe-inline' 'unsafe-eval' data: gap:">
    <title>TheSignedStore</title>
    <link rel="stylesheet" href="css/framework7.bundle.min.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="apple-touch-icon" href="img/icon.png">
    <link rel="icon" href="img/icon.png">
    <script>
        if (!window.navigator.standalone) {
            alert('Add to homescreen.');
        }
    </script>
    <noscript>
        <meta http-equiv="refresh" content="0;url=error.html">
    </noscript>
</head>
<body>
    <div id="app">
        <div class="view view-main view-init safe-areas" data-master-detail-breakpoint="800" data-url="/">
            <div class="page page-home">
                <div class="navbar navbar-large navbar-transparent">
                    <div class="navbar-bg"></div>
                    <div class="navbar-inner">
                        <div class="title sliding">Signed</div>
                        <div class="title-large">
                            <div class="title-large-text">Signed</div>
                        </div>
                    </div>
                </div>
                <div class="toolbar tabbar tabbar-labels toolbar-bottom">
                    <div class="toolbar-inner">
                        <a href="#tab1" class="tab-link tab-link-active">
                            <i class="icon f7-icons if-not-md">star_fill</i>
                            <i class="icon material-icons md-only">star_fill</i>
                            <span class="tabbar-label">Home</span>
                        </a>
                        <a href="#tab2" class="tab-link">
                            <i class="icon f7-icons if-not-md">rectangle_stack_fill</i>
                            <i class="icon material-icons md-only">rectangle_stack_fill</i>
                            <span class="tabbar-label">Apps</span>
                        </a>
                    </div>
                </div>
                <div class="tabs-animated-wrap">
                    <div class="tabs">
                        <div id="tab1" class="tab tab-active">
                            <div class="page-content">
                                <center>
                                    <img style="width:60px;margin-top:40px;" src="img/icon.png">
                                </center>
                                <div class="block-title">Support</div>
                                <div class="list links-list">
                                    <ul>
                                        <li>
                                            <a onclick="location='mailto:'" class="panel-close">Email</a>
                                        </li>
                                        <li>
                                            <a onclick="location='https://twitter.com/'" class="panel-close">Twitter</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="block-title">Legal</div>
                                <div style="padding:10px;" class="card">
                                    ndkjxdnjc djfbdnkjvcbdj djbdkjvbd dikjbvdkjb vd djb vdkjv c vcxdkjb vdkj vdkjvd vkjd vkjd vkjd vkjd kjd jdkjd kjdv dkjj vdk
                                </div>
                            </div>
                        </div>
                        <div id="tab2" class="tab">
                            <div class="page-content">
                                <form class="searchbar">
                                    <div class="searchbar-inner">
                                        <div class="searchbar-input-wrap">
                                            <input type="search" placeholder="Search">
                                            <i class="searchbar-icon"></i>
                                            <span class="input-clear-button"></span>
                                        </div>
                                        <span class="searchbar-disable-button">Cancel</span>
                                    </div>
                                </form>
                                <div class="block-title">Install</div>
                                <div class="list media-list">
                                    <ul>
                                        <?php
                                        $apps = array_filter(glob('apps/*'), 'is_dir');
                                        $cert = json_decode(file_get_contents('database.json'), true)['Devices'][$_GET['udid']]['Cert'];
                                        foreach($apps as $app){
                                            $app = substr($app, 5);
                                            $size = filesize('https://app.signed.sh/apps/' . $app . '/' . $app . '.ipa');
                                            echo '<li>
                                              <a href="itms-services://?action=download-manifest&url=https://app.signed.sh/apps/' . $app . '/' . $app . '_' . $cert . '.plist" class="item-link item-content">
                                                  <div class="item-media"><img style="border-radius:30%;background-color:#000;height:50px;" src="apps/' . $app . '/' . $app . '.png" width="50" /></div>
                                                  <div class="item-inner">
                                                      <div class="item-title-row">
                                                          <div class="item-title">' . $app . '</div>
                                                      </div>
                                                      <div class="AppSize">' . $size . '</div>
                                                      <div class="item-subtitle">Subtitle</div>
                                                    </div>
                                                </a>
                                            </li>';
                                        }?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/framework7.bundle.min.js"></script>
    <script src="js/routes.js"></script>
    <script src="js/app.js"></script>
</body>
</html>