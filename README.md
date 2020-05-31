## Quasar Framework front + Laravel API

### Install
```bash
git clone git@github.com:mixartemev/laravel-quasar.git
cd laravel-quasar
# configure your .env
cp .env.example .env
composer install
chmod -R 777 bootstrap/cache storage
php artisan key:generate
php artisan storage:link
php artisan migrate --seed
git clone git@github.com:mixartemev/quasar-broker-client.git
cd quasar-broker-client
yarn add global @quasar/cli
quasar build # add `-d` if you need to debug
cd ..
yarn
yarn dev # or `yarn prod`
```
