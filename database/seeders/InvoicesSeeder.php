<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class InvoicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $debtors = User::query()
            ->where('role_id', Role::DEBTOR)
            ->get();

        $invoice_number = 1000;

        foreach ($debtors as $debtor) {
            for ($i = 0; $i < 5; $i++) {
                Invoice::updateOrCreate([
                    'invoice_number' => '2022' . (++$invoice_number),
                    'attention_to' => 'Mr. ' . $debtor->name,
                    'description' => '--- This is the description ---',
                    'invoice_date' => Carbon::create(2022,1,1,1),
                    'expiration_date' => Carbon::create(rand(2022,2023)),
                    'address_id' => $debtor->address_id,
                    'debtor_id' => $debtor->id,
                    // 'price' => '$' . rand(1,1000)
                ]);
            }
        }
    }
}