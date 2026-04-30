<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
User::factory()->create([
    'name' => 'Instructor One',
    'email' => 'instructor@demo.com',
    'password' => bcrypt('password'),
    'role' => 'instructor',
]);

User::factory()->create([
    'name' => 'Student One',
    'email' => 'student@demo.com',
    'password' => bcrypt('password'),
    'role' => 'student',
]);