Host website with PHP + MySQL

Step 1
First of all, log in your Aws account. Aws log in ( link )
Step 2
After Amazon console login you find the following screen, select EC2 from Compute category.
![image](https://user-images.githubusercontent.com/61869565/117606007-9e002900-b176-11eb-86c0-f9f286e6b448.png)
Step 3
Click Launch Instance button.
![image](https://user-images.githubusercontent.com/61869565/117606033-aa848180-b176-11eb-95e7-860e1cb1b35b.png)
Step 4
Now choose operating system for web server. I suggest use Ubuntu for more package advantage. Make sure, that should be listed in free tier.

Step 5
After select button. you will click for review and instance

Step 6
After clicking Review and Launch You find the below screen, now click Launch button.

Step 7
In this step. you see this screen. Select “create a new key pair”


a. Set key pair name. What ever you want
b. Give valid name and click to Download Key Pair. You will get an .pem file.
Step 8
Now Instance has been created successfully.

Step 9
Firewall Security Settings
You will find the instance status here.

Step 10
Select the instance box and scroll down the page, you will find inbound rules for firewall security

Step 11
Add HTTP rule for web server access.

Elastic IP — Create Static IP Address
Basically, Amazon instance will provide you a dynamic public DNS name, this is not stable. So you need a static IP.
Step 12
Go to Network & Security category and select Elastic IPs, click Allocate New Address

Step 13
Amazon will provide you a random IP address.

Step 14
Now associate IP address with instance box.

Step 15
Choose instance box here.

Step 16
Click Associate address.

Step 17
Associated IP address with instance.

Linux & MAC connection
Executing following command with Linux or MAC terminal, you can directly access your box.
ssh -i keyname.pem ubuntu@IP_ADDRESS
Sometimes you will get following error.
Permissions 0640 for 'keyname.pem' are too open.
It is required that your private key files are NOT accessible by others.
This private key will be ignored.
Load key "keyname.pem": bad permissions
Permission denied (publickey).
Give only READ permission for .pem file, then execute SSH command again.
sudo chmod 400 keyname.pem
Windows connection
Run following command
ubuntu@ip-172-31-19-204:~$ sudo su
root@ip-172-31-19-204:/home/ubuntu#
This will update Ubuntu OS Packages
sudo apt-get update
XAMPP Installation Commands for Ubuntu
Download XAMPP for 64 bit
wget https://www.apachefriends.org/xampp-files/7.0.23/xampp-linux-x64-7.0.23-0-installer.run
Make Execute Installation
sudo chmod +x xampp-linux-x64-7.0.23-0-installer.run
Run Installation
sudo ./xampp-linux-x64-7.0.23-0-installer.run
XAMPP instructions
Select the components you want to install; clear the components you do not want to install. Click Next when you are ready to continue.
XAMPP Core Files : Y (Cannot be edited)
XAMPP Developer Files [Y/n] : Y
Is the selection above correct? [Y/n]: Y
Installation Directory
XAMPP will be installed to /opt/lampp
Press [Enter] to continue:
Do you want to continue? [Y/n]:Y
Run XAMPP
sudo /opt/lampp/lampp start
XAMPP Access Forbidden
Open your browser and access http://IP-ADDRESS/ you will find this Access forbidden screen.

XAMPP Configurations
Edit XAMPP configurations.
vi /opt/lampp/etc/extra/httpd-xampp.conf
In this image there are default value is local you have to set “ all granted ”

Restart XAMPP
sudo /opt/lampp/lampp restart
Security Settings
sudo /opt/lampp/xampp security
XAMPP: Your XAMPP pages are NOT secured by a password.
XAMPP: Do you want to set a password? [yes]
XAMPP: Your XAMPP pages are NOT secured by a password.
XAMPP: Do you want to set a password? [yes] no
XAMPP: MySQL is accessable via network.
XAMPP: Normaly that's not recommended. Do you want me to turn it off? [yes] yes
XAMPP: Turned off.
XAMPP: Stopping MySQL...ok.
XAMPP: Starting MySQL...ok.
XAMPP: The MySQL/phpMyAdmin user pma has no password set!!!
XAMPP: Do you want to set a password? [yes] yes
XAMPP: Password:*******
XAMPP: Password (again):*******
XAMPP: Setting new MySQL pma password.
XAMPP: Setting phpMyAdmin's pma password to the new one.
XAMPP: MySQL has no root passwort set!!!
XAMPP: Do you want to set a password? [yes] yes
XAMPP: Write the password somewhere down to make sure you won't forget it!!!
XAMPP: Password:*******
XAMPP: Password (again):*******
XAMPP: Setting new MySQL root password.
XAMPP: Change phpMyAdmin's authentication method.
XAMPP: The FTP password for user 'daemon' is still set to 'xampp'.
XAMPP: Do you want to change the password? [yes] no
XAMPP: Done.
PhpMyAdmin
Access PhyMyAdmin at http://IP-Address/phpmyadmin/



Reference for the article : https://medium.com/@RahulShukla754/amazon-ec2-setup-with-ubuntu-and-xampp-installation-37c3c0eeb51d
