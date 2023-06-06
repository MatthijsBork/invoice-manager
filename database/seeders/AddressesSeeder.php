<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $owner = User::query()
            ->where('role_id', Role::OWNER)
            ->first();

        $address = Address::updateOrCreate([
            'id' => 1,
            'street' => 'Verzetsstrijderslaan',
            'house_number' => 2,
            'house_number_suffix' => null,
            'zip_code' => '9727CE',
            'city' => 'Groningen',
            'user_id' => $owner->id,
        ]);

        $owner->update(['address_id' => $address->id]);
    }
}