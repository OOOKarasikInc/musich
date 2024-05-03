# Убийца(нет) яндекс музыки

## Запуск

Нужно выполнить следующие команды:

1. `docker-compose run composer install`
2. `docker-compose up nginx -d`
3. `docker-compose run vue npm run dev`
4. `docker-compose run artisan migrate`

Потом находясь в папке musich/app выполнить команды `sudo chmod -R 777 storage` и `sudo chmod -R 777 public`
