@ECHO OFF
REM php C:/wamp/bin/php/php5.3.0/phpunit --coverage-html=E:\dev\vafcov --stop-on-failure --verbose --bootstrap E:\dev\vaf\app\code\local\Elite\Vaf\bootstrap-tests.php E:\dev\vaf\app\code\local\Elite\%*
php C:/wamp/bin/php/php5.3.0/phpunit.php --no-globals-backup  --stop-on-failure --verbose --bootstrap F:\dev\vaf\app\code\local\Elite\Vaf\bootstrap-tests.php F:\dev\vaf\app\code\local\Elite\%*