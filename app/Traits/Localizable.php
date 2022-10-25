<?php

namespace App\Traits;

use App\Models\Locale;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

trait Localizable
{
    use CascadesDeletes;
    public function locales()
    {
        return $this->morphMany(Locale::class, 'localizable');
    }

    protected function getLocaleAttribute()
    {
        $locale = app()->getLocale();
        $locales = collect($this->locales);
        $data = $locales->where('locale', $locale)->first();
        return $data ? $data : $locales->first();

    }
}
