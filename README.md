## Laravel API

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
php artisan migrate:fresh --seed
yarn
yarn dev # or `yarn prod`
```
