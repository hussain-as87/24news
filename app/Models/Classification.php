<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Classification extends Model
{
    use HasFactory, HasTranslations, SearchableTrait;

    protected $guarded = [];
    public $translatable = ['name'];

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function asJson($value)
    {
        return json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function getTitleenAttribute()
    {
        return $this->getTranslation('title', 'en');
    }

    public function getTitlearAttribute()
    {
        return $this->getTranslation('title', 'ar');
    }

    public function getTitlefrAttribute()
    {
        return $this->getTranslation('title', 'fr');
    }
}
