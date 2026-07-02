<?php

$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath . '/framework/views', 0755, true);
    mkdir($storagePath . '/framework/cache', 0755, true);
    mkdir($storagePath . '/framework/sessions', 0755, true);
    mkdir($storagePath . '/logs', 0755, true);
}

// Set path storage kustom untuk Vercel
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
putenv("LOG_CHANNEL=stderr");

// Tambahkan dua baris ini untuk memaksa Laravel mengabaikan cache file lokal
putenv("APP_CONFIG_CACHE={$storagePath}/framework/cache/config.php");
putenv("APP_ROUTES_CACHE={$storagePath}/framework/cache/routes.php");

// Pintu masuk utama Laravel
require __DIR__ . '/../public/index.php';