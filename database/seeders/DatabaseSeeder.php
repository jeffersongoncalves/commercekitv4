<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * Seeds both authentication guards (an Admin for the /admin panel and a
     * User for the /app panel) plus the commerce demo dataset. Idempotent.
     */
    public function run(): void
    {
        Admin::query()->updateOrCreate(
            ['email' => 'admin@commercekit.test'],
            ['name' => 'CommerceKit Admin', 'status' => true, 'password' => Hash::make('password')],
        );

        User::query()->updateOrCreate(
            ['email' => 'user@commercekit.test'],
            ['name' => 'CommerceKit User', 'status' => true, 'password' => Hash::make('password')],
        );

        $this->call(CommerceDemoSeeder::class);
    }
}
