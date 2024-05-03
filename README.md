# Убийца(нет) яндекс музыки

## Запуск

1. Нужно выполнить следующие команды:

   1. `docker-compose run composer install`
   2. `docker-compose up nginx -d`
   3. `docker-compose run vue npm install`
   4. `docker-compose run vue npm run dev`
   5. `docker-compose run artisan migrate`

2. Потом находясь в папке musich/app выполнить команды `sudo chmod -R 777 storage` и `sudo chmod -R 777 public`

3. Переименовать .env.example в .env и указать в нем свои данные для переменных APP_URL_PROD, TG_API_TOKEN и TG_CHANNEL_ID

