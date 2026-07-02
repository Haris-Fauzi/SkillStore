<?php

// Jalankan optimasi routing & config secara otomatis saat aplikasi pertama kali diakses
exec('php ../artisan config:cache');
exec('php ../artisan route:cache');

// Pintu masuk utama Laravel
require __DIR__ . '/../public/index.php';