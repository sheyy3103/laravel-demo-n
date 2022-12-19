<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name', 'price', 'sale_price', 'image', 'status', 'description', 'category_id'];

    //functions

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = $query->where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
    public function scopeFilter($query)
    {
        if (request()->order) {
            $order = request()->order;
            $order = explode('_', $order);
            $query = $query->orderBy($order[0],$order[1]);
        }
    }

}
