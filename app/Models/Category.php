<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category', 'sub_category'];

    public function subCategory(): HasMany
    {
        return $this->hasMany(Category::class, 'sub_category', 'id');
    }

    public function scopeWithSubCategory($query)
    {
        return $query->with(['subCategory' => function ($query) {
            $query->withSubcategory();
        }]);
    }
}
