<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Carbon::setTestNow(
            Carbon::create(2022, 1, 1, 1, 1)
        );

        $this->call(RolesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(AddressesSeeder::class);

        if (App::environment('local')) {
            $this->call(DebtorsSeeder::class);
            $this->call(DebtorAddressesSeeder::class);
            $this->call(InvoicesSeeder::class);
        }
    }
}