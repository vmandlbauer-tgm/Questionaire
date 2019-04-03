# Aufsetzen Debian 9.8
## Virtuelle Umgebung
[VMware Workstation Pro](https://www.vmware.com/at.html)

## Durchführung
* SSH-Server vorinstalliert
### Sudo
* apt install sudo
* usermod -aG sudo USERNAME

### Apache

* apt-get install apache2
* https://stackoverflow.com/questions/18948996/403-forbidden-you-dont-have-permission-to-access-folder-name-on-this-server
### PHP

* apt-get install php

### Questionnaire Directory im Home

* sudo mkdir -m a=rwx Questionnaire

### MongoDB
* sudo apt-get install dirmngr --install-recommends
* sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 9DA31620334BD75D9DCB49F368818C72E52529D4
* echo "deb http://repo.mongodb.org/apt/debian stretch/mongodb-org/4.0 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.0.list
* sudo apt-get update
* sudo apt-get install -y mongodb-org

https://docs.mongodb.com/manual/tutorial/install-mongodb-on-debian/
## Quellen
https://www.debian.org/distrib/netinst
<br>
https://www.vmware.com/at.html