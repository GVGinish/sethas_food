<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPlacedModel extends Model
{
    use HasFactory;

    protected $fillable = [
                            'billing_id',	
                            'user_id',	
                            'total',
                          ];


      public function orderPlaced()
      {
          return $this->hasMany(CartModel::class, 'billing_id', 'billing_id');
      }

 
}
