<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'price', 'seller_id', 'commission_value'
    ];

    public function Seller(){
        return $this->belongsTo(Seller::class);
    }

}
