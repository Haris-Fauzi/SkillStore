<?php

// Pastikan folder storage Laravel dialihkan ke /tmp yang writable di Vercel
$storagePath = '/tmp/storage';
if (!is_dir($storagePath)) {
    mkdir($storagePath . '/framework/views', 0755, true);
    mkdir($storagePath . '/framework/cache', 0755, true);
    mkdir($storagePath . '/framework/sessions', 0755, true);
    mkdir($storagePath . '/logs', 0755, true);
}

// Set env secara dinamis untuk memindahkan path storage
putenv("VIEW_COMPILED_PATH={$storagePath}/framework/views");
putenv("LOG_CHANNEL=stderr"); // Alihkan log Laravel langsung ke Vercel Logs

// Pintu masuk utama Laravel
require __DIR__ . '/../public/index.php';