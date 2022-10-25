<?php

namespace App\Models;

use App\Traits\Localizable;
use App\Traits\MediaTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements \Spatie\MediaLibrary\HasMedia
{
    use HasFactory, MediaTrait, Localizable;
    protected $guarded = [];


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
