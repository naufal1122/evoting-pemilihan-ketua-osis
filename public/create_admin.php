<?php

require __DIR__ . '/../vendor/autoload.php';
use App\Models\User;
use Illuminate\Support\Facades\Hash;

// Inisialisasi aplikasi Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// Buat pengguna admin
$admin = new User();
$admin->username = 'naufaldewa';
$admin->role = 'admin';
$admin->email = 'naufaldewa@gmail.com';
$admin->password = Hash::make('password'); // Ganti dengan password yang diinginkan
$admin->save();

echo "Admin user created successfully!";
