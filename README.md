# signed.sh

## Adding New IPAs
1. Create a directory located at "uploads/app_name_here/"
2. Upload the IPA with the following path "uploads/app_name_here/app_name_here.ipa"
3. Upload the PNG with the following path "uploads/app_name_here/app_name_here.png" (only if not done before or to update the icon)
4. Create a file with the following path "uploads/app_name_here/cert.txt" containing the certificate name (as specified in database.json)

Repeat above for every IPA you want to upload then continue to next step. If you want to upload multiple IPAs for the same application, DO NOT repeat till next step completed.

5. Execute script.php, it will generate the plist and put all files in "apps/"

## Things to know
All files are overwritten. So if a certificate changes, the IPAs will be overwritten.
There is no need to re upload the application icon after the first time, it will just overwrite itself.
If you are uploading multiple IPAs for the same application (in case of different certificates), you will need to run script.php.

## License
Feel free to use this system, just credit me.
