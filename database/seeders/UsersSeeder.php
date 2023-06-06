<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            [
                'id' => 1,
                'name' => 'Matthijs',
                'email' => 'mborkhuis@st.noorderpoort.nl',
                'email_verified_at' => null,
                'remember_token' => null,
                'role_id' => Role::OWNER,
            ],
            [
                'password' => Hash::make('secret'),
            ]
        );
    }
}

