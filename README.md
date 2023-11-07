composer require laravel/ui

php artisan ui bootstrap --auth

npm install

npm run dev

#thông báo JS
composer require yoeunes/toastr

php artisan vendor:publish --provider="Yoeunes\Toastr\ToastrServiceProvider"

#check số người online
composer require highideas/laravel-users-online

#larravel telegram-bot-sdk
php artisan config:clear

composer require irazasyed/telegram-bot-sdk ^3.4.1

php artisan vendor:publish --provider="Telegram\Bot\Laravel\TelegramServiceProvider"

vÀO LINK NÀY XEM ID NHÓM CHAT
https://api.telegram.org/bot<YourBOTToken>/getUpdates