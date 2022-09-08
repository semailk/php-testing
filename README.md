1.Клонируем репозиторий.<br>
2.composer update (подтягиваем зависимости)<br>
3.cp .env.example .env (создаем .env файл и вносим туда настройки подключение к database)<br>
4.php artisan migrate (загружаем миграции в базу данных)<br>
5.php artisan key:generate (создаем APP_KEY) <br>
6.php artisan db:seed (заполняем базу данных тестовыми данными)<br>
7. сделал фронт для теста данных (localhost:8000/cats) страница котов<br>
8. сделал фронт для теста данных (localhost:8000/coffees) страница кофе
