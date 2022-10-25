<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locale extends Model
{
    use HasFactory;

    protected $fillable = ['locale', 'name', 'description', 'title', 'answer', 'question', 'meta_description', 'meta_keywords'];

    public static function findBySlug($name)
    {
        return static::where('name', $name)->get();
    }
}