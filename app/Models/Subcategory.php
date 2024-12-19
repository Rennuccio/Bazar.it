<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subcategory extends Model
{
    protected $fillable=['name','category_id'];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function category() : BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function articles() : HasMany{
        return $this->hasMany(Article::class);
    }
}