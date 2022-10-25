<?php

use App\Enums\UserType;
use App\Models\Locale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

/**
 * @param name
 * @return slug_of_name
 */
function generateSlug($name)
{
    $name = strtolower($name);
    if (!Locale::findBySlug($name)->count()) {
        return str_replace(' ', '-', $name);
    }

    return generateSlug(str_replace(' ', '-', $name) . '-' . rand(1, 999));
}

function getTitle($locales)
{
    if (isset($locales['en'])) {
        $title = $locales['en']['title'];
    } else {
        $title = $locales['ar']['title'];
    }

    return $title;
}



function uploadImage($model, $file)
{
    $ext = $file->getClientOriginalExtension();
    // $model->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->withResponsiveImages()->toMediaCollection('images');
    $model->addMedia($file)->usingFileName(md5(uniqid()) . ".$ext")->toMediaCollection('media');
}


/**
 * @param model which you want to relation with it
 * @param relation_name
 */
function setLocales(Model $model, $locales, $id)
{
    $model = $model->find($id);

    foreach ($locales as $locale => $value) {
        $case = $model->locales()->where('locale', $locale)->first();
        if ($case) {
            $case->update($value);
        } else {
            $model->locales()->create(['locale' => $locale]);
            $model->locales()->where('locale', $locale)->update($value);
        }
    }
}


function user()
{

    return   request()->user() ? request()->user()->type == UserType::USER : false;
}


function admin()
{
    return   request()->user() ? request()->user()->type == UserType::ADMIN : false;
}
