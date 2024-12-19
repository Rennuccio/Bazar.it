<?php

namespace App\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Category extends Model
{
    protected $fillable = ['name','user_id'];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function articles() : HasMany{
        return $this->hasMany(Article::class);
    }
}
