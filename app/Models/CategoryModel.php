<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryModel extends Model
{
    protected $table = 'category_models'; // Assuming your table name is 'categories'

    // Define inverse relationship if needed
    public function products()
    {
        return $this->hasMany(ProductModel::class, 'category_id', 'category_id');
    }
}
