<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_number')->unsigned()->unique();
            $table->string('attention_to');
            $table->string('description');
            $table->dateTime('invoice_date');
            $table->dateTime('expiration_date');
            // $table->string('price');

            $table->foreignIdFor(Address::class, 'address_id')
                ->constrained()
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignIdFor(User::class, 'debtor_id')
                ->constrained((new User)->getTable())
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};