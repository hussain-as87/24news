<?php

namespace App\Models;

use Cohensive\Embed\Facades\Embed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class News extends Model
{
    use HasFactory, HasTranslations, SearchableTrait;

    protected $guarded = [];
    protected $table = 'news';
    public $translatable = ['title', 'summary', 'details'];
    protected $attributes = [
        'case' => '0',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function classification()
    {
        return $this->belongsTo(Classification::class);
    }

    public function getVideoHtmlAttribute()
    {
        $embed = Embed::make($this->video)->parseUrl();

        if (!$embed)
            return '';

        $embed->setAttribute(['width' => '650px']);
        return $embed->getHtml();
    }

    /*for return to customercontroller the case */

    public function scopePopular($query)
    {
        return $query->where('Popular', 1);
    }

    public function scopeTrending($query)
    {
        return $query->where('Trending', 0);
    }


    /*active column in show view*/
    public function getActiveAttribute($attribute)
    {
        return $this->caseOptions()[$attribute];
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

    public function privatepath()
    {
        return url('news/' . $this->id . '-' . Str::slug($this->title));
    }

    public function publicPath()
    {
        return url('single-' . $this->id . '-' . Str::slug($this->title));
    }


}
