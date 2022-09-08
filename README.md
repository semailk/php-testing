1.Клонируем репозиторий.
2.composer update (подтягиваем зависимости)
3.cp .env.example .env (создаем .env файл и вносим туда настройки подключение к database)
4.php artisan migrate (загружаем миграции в базу данных)
5.php artisan key:generate (создаем APP_KEY) 
6.php artisan db:seed (заполняем базу данных тестовыми данными)
7. сделал фронт для теста данных (localhost:8000/cats) страница котов
8. сделал фронт для теста данных (localhost:8000/coffees) страница кофе
