<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class, 'address_id', 'id');
    }

    protected function getAddressAttribute() {
        // return Attribute::make(function($value, $attributes) {
        // return "{$this->attributes['street']} {$this->attributes['house_number']}";
        $address = $this->street . ' ' . $this->house_number;



        

        if(!is_null($this->house_number_suffix)) {
            $address .= $this->house_number_suffix;
        }
        return $address;
    }
};
