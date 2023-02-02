# ravan-game

Upload script folder to your web server.

Copy the files from script folder to the directory you want the game to be in (should be in a root directory).

If on a Unix server, change permissions on the game directory and files to 777. (You can change file permission after completing installation)

Navigate to http://your*website*/install.php (can be installed on subdomain aswell). Follow the instruction and complete the installation.

Copy Down the Cron Info from the installation page.

Login as administrator and Change the settings to your likings.

Setting Up Cron

Go to your control panel and if it’s a Cpanel, log in and scroll down the first page that you come to and click on the “Cron Jobs” link. Choose “Advanced Unix Style.” From there you need to set up cron jobs for the 4 cron files located on your server.The cron info is generated from the installation complete page .

Eg:

_/5 _ \* \* \* curl http://yousite.com/cron_run_five.php

- - - - - curl http://yousite.com/cron_run_minute.php

0 \* \* \* \* curl http://yousite.com/cron_run_hour.php

0 0 \* \* \* curl http://yousite.com/cron_run_day.php

The values that you should put in each box are seperated by spaces, eg put all the text before the first space in the Minute box, then Hour, then Day, then Month, then Weekday, then finally Command. You will have to Commit Changes and select Advanced (Unix Style) after entering each one to make a new box appear for the next one. (If no cPanel and on a linux server with shell access, use the cron program to import these crons manually. If no cPanel and no linux with shell, you're a bit screwed and should consider changing servers)

Time based things will work only if the cron jobs has properly set up .

Time based things depends upon cron-jobs such as recovery time , jail function etc ,energy refill etc .

Jail and Hospital - every 1 minute

Users stats such as enery , health refill - every 5 minutes

If you want to refill enery and stats every minutes , do as \* \* \* \* \* curl http://yousite.com/cron_run_fivemins.php and similarly.

Please note if you have many players its recommend to change the hosting to dedicated server as cron uses extreme resources.

Steps for creating a MySQL Databases with cPanel:

1. Click on the MySQL Databases icon in cPanel.

2. Then, you'll need to create a database and choose a name.
   - Click Create Database
   - Click go back
3. Next, you create a username and password for the database.
   - Create User
   - Click go back
4. Last, you'll want to add the new user to the database.
   - Click Add User To Database with full permissions
   - Click go back

Note : Please Do Not Remove Powered By Ravan Scripts without permission.

However, if you would like to use the script without the powered by links you may do so by purchasing a Copyright removal license for a very low fee.

Few files in the package are encrypted to avoid unauthorized distribution of source code .

If you want unencrypted files for customization please write to us .

That's it! It's that easy to do. If you don't use cPanel,that's ok, these steps are basically the same as most hosting companies. If you're still having difficulties feel free to contact support and we'll provide free installation .

If you need also customization of flash header or logo do contact us !

If you are unfamiliar with Flash and Photoshop we can design you custom flash header with your site name and logo for $5 USD each or $10 USD both.

Do to the cheap price of the script we do not permit you remove copyright powered by without purchasing copyright removal.

Copyright removal fee is $10 USD and once purchased you'll receive custom footer without powered by and is applicable to upcoming versions of the script .

Questions? Comments? Need support? Contact Us at support@ravan.info
