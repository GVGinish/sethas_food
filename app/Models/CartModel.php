<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CartModel extends Model
{
    use HasFactory;

    protected $fillable = [
                            'billing_id',	
                            'user_id',
                            'product_id',	
                            'cart_id',	
                            'product_name',	
                            'weight',	
                            'mrp',	
                            'retail',	
                            'quantity',	
                            'total_price',	
                            'image',	
                            'status',
                            ];

        public function orderPlaced()
        {
            return $this->belongsTo(OrderPlacedModel::class, 'billing_id', 'billing_id');
        }
    
       
        public function user_data()
        {
            return $this->belongsTo(User::class, 'user_id', 'user_id'); 
        }
}
