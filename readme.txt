pre-requisit install composer from getcomposer.org or using apt-get or yum

after you unzip this code, in a linux machine with php 5.5+ run the following command from the same directory as this file

composer install

and then

vendor/phpunit/phpunit/phpunit tests/SalaryDateTest.php  to run the tests

and

php src/command.php filename.csv



