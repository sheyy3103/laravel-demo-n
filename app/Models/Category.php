<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['name','status'];

    //functions

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
        function scopeSearch($query)
        {
            if (request()->keyword) {
                $keyword = request()->keyword;
                $query = Category::where('name', 'like', '%' . $keyword . '%');
            }
            return $query;
        }
        function scopeFilter($query)
        {
            if (request()->order) {
                $order = request()->order;
                $order = explode('_', $order);
                $query = $query->orderBy($order[0],$order[1]);
            }
        }
    }
    public function scopeSearch($query)
    {
        if (request()->keyword) {
            $keyword = request()->keyword;
            $query = Category::where('name', 'like', '%' . $keyword . '%');
        }
        return $query;
    }
}
