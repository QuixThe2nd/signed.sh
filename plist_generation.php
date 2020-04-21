<?php
// Made by Quix
$apps = array_filter(glob('uploads/*'), 'is_dir');
foreach($apps as $app){
    $app = substr($app, 8);
    mkdir('apps/' . $app);
    $cert = file_get_contents('uploads/' . $app . '/cert.txt');
    rename ('uploads/' . $app . '/' . $app . '.png', 'apps/' . $app . '/' . $app . '.png');
    rename ('uploads/' . $app . '/' . $app . '.ipa', 'apps/' . $app . '/' . $app . '_' . $cert . '.ipa');
    file_put_contents('apps/' . $app . '/' . $app . '_' . $cert . '.plist', '<?xml version="1.0" encoding="UTF-8"?>
    <!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
    <plist version="1.0">
    <dict>
        <key>items</key>
        <array>
            <dict>
                <key>assets</key>
                <array>
                    <dict>
                        <key>kind</key>
                        <string>software-package</string>
                        <key>url</key>
                        <string>https://app.signed.sh/apps/' . $app . '_' . $cert . '.ipa</string>
                    </dict>
                </array>
                <key>metadata</key>
                <dict>
                    <key>bundle-identifier</key>
                    <string>6578A826QL.com.serverservers.*</string>
                    <key>bundle-version</key>
                    <string>1.0</string>
                    <key>kind</key>
                    <string>software</string>
                    <key>title</key>
                    <string>' . $app . '</string>
                </dict>
            </dict>
        </array>
    </dict>
    </plist>');
}