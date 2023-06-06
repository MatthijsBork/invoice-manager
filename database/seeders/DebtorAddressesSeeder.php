<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DebtorAddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $debtors = User::query()->where('role_id', Role::DEBTOR)->get();

        foreach ($debtors as $debtor) {
            if (!is_null($debtor->address_id)) {
                continue;
            }

            $address = Address::factory()
                ->for($debtor, 'user')
                ->create();

            $debtor->update(['address_id' => $address->id]);
        }
    }
}