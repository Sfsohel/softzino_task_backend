<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];  
    public function categories() : BelongsToMany
    {
        return $this->belongsToMany(Category::class,'category_porduct');
    }
    protected function image(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => asset('images/' . $value),
        );
    }
}
