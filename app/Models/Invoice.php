<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    public $dates = [
        'invoice_date',
        'expiration_date',
        'created_at'
    ];

    protected $fillable = [
        "invoice_number",
        "attention_to",
        "description",
        "invoice_date",
        "expiration_date",
        "debtor_id",
        "address_id",
        // "price"
    ];

    public function lines(){
        return $this->hasMany(InvoiceLine::class, 'invoice_id', 'id');
    }

    public function address(): BelongsTo
    {
        return $this->belongsTo(Address::class, 'address_id', 'id');
    }

    public function debtor() {
        return $this->belongsTo(User::class, 'debtor_id', 'id');
    }

    

    public static function getNextInvoiceNumber() {
        $max = Invoice::query()->max('invoice_number') ?? 999;

       return $max + 1;
    }
}
