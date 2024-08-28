## Sau khi clone dự án về chạy:
```
composer update
```

## Tạo file .env:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nanaytb
DB_USERNAME=root
DB_PASSWORD=
```

## Sau khi config: 
```
php artisan config:cache
php artisan config:clear
php artisan serve
```
