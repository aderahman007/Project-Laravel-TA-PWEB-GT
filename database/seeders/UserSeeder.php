<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Ade Rahman', 'email' => 'ade@gmail.com', 'password' => Hash::make('ade')],
            ['name' => 'Gita', 'email' => 'gita@gmail.com', 'password' => Hash::make('gita')],
            ['name' => 'Dicky', 'email' => 'dicky@gmail.com', 'password' => Hash::make('dicky')],
            ['name' => 'Eka', 'email' => 'eka@gmail.com', 'password' => Hash::make('eka')],
            ['name' => 'Galih', 'email' => 'galih@gmail.com', 'password' => Hash::make('galih')],
            ['name' => 'anam', 'email' => 'anam@gmail.com', 'password' => Hash::make('anam')],
        ];

        foreach ($items as $item) {
            # code...
            User::create($item);
        }
    }
}
