# Aufsetzen Debian 9.8
uname -a

* Linux Questionnaire 4.9.0-8-amd64 #1 SMP Debian 4.9.144-3.1 (2019-02-19) x86_64                                                                                                                                                              GNU/Linux

## Virtuelle Umgebung
[VMware Workstation Pro](https://www.vmware.com/at.html)

## Durchführung
* SSH-Server vorinstalliert
### Sudo
* apt install sudo
* usermod -aG sudo USERNAME

###Auslastung Server
* apt-get install htop
* htop

### Questionnaire Directory im Home
* sudo mkdir -m a=rwx Questionnaire

### Apache
* apt-get install apache2
* https://stackoverflow.com/questions/18948996/403-forbidden-you-dont-have-permission-to-access-folder-name-on-this-server

### PHP
* apt-get install php
* apt-get install php-mongodb

### Composer
https://getcomposer.org/download/

### MongoDB
* sudo apt-get install dirmngr --install-recommends
* sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 9DA31620334BD75D9DCB49F368818C72E52529D4
* echo "deb http://repo.mongodb.org/apt/debian stretch/mongodb-org/4.0 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.0.list
* sudo apt-get update
* sudo apt-get install -y mongodb-org

By default, MongoDB instance stores:

* its data files in /var/lib/mongodb
* its log files in /var/log/mongodb

* MongoDB config: /etc/mongod.conf

https://docs.mongodb.com/manual/tutorial/install-mongodb-on-debian/
https://docs.mongodb.com/php-library/master/tutorial/install-php-library/
https://stackoverflow.com/questions/34486808/installing-the-php-7-mongodb-client-driver
## Quellen
https://www.debian.org/distrib/netinst
<br>
https://www.vmware.com/at.html