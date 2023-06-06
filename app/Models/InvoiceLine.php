<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLine extends Model
{
    use HasFactory;


    protected $fillable = [
        "description",
        "price_exclusive",
        "VAT_percentage",
        "invoice_id"
        
    ];
}
