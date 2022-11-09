# Instruksi Install Windows (dev)
1. nyalakan XAMPP
2. `git clone https://github.com/alexdoffgit/meeting-kanan-9`
3. `composer install` pada folder git clone
4. copy .env.example menjadi .env
5. `php artisan key:generate`
6. buat database "meeting" pada phpmyadmin
7. ubah variable `DB_DATABASE` pada .env menjadi "meeting"
8. `php artisan migrate`