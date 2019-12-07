sudo apt upgrade -y
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install -y apache2 php7.3 php7.3-curl libapache2-mod-php7.3
sudo mv * /var/www/html/