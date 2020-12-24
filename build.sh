#/bin/sh
echo 'Hapus data repo...'
rm -rf .git

echo 'Hapus cache'
php artisan optimize:clear

echo 'Optimize vendor autoloader'
composer install --optimize-autoloader --no-dev

echo 'Optimize node_modules'
npm run prod
rm -rf node_modules

echo 'Dump file sql'
mysqldump -u root pdd > install.sql

echo 'Atur permission'
sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
sudo chown -R $USER:www-data storage
sudo chown -R $USER:www-data bootstrap/cache
