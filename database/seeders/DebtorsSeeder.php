<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DebtorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            User::updateOrCreate(
                [
                    'name' => "Company " . $i,
                    'email' => "info@company" . $i . ".com",
                    'email_verified_at' => null,
                    'remember_token' => null,
                    'role_id' => Role::DEBTOR
                ],
                [
                    'password' => Hash::make('secret')
                ]
            );
        }
    }
}
