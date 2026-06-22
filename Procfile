web: php artisan route:clear && php artisan migrate --force && php artisan storage:link && php artisan octane:start --server=frankenphp --host=0.0.0.0 --port=$PORT
worker: php artisan route:clear && php artisan queue:work --sleep=3 --tries=3
