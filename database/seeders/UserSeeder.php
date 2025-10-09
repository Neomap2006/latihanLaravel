<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk membuat atau memperbarui user default.
     */
    public function run(): void
    {
        $email = 'neomap4441v@gmail.com';

        // cek ser berdasarkan email
        $user = User::where('email', $email)->first();

        if ($user) {
            // update data user
            $user->update([
                'name' => 'Neo',
                'password' => Hash::make('neo123'),
            ]);

            echo "User Neo diperbarui!\n";
        } else {
            // buat data user
            User::create([
                'name' => 'Neo',
                'email' => $email,
                'password' => Hash::make('neo123'),
            ]);
        }
    }
}
