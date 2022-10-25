<?php

namespace App\Traits;

trait MediaTrait
{
    use \Spatie\MediaLibrary\InteractsWithMedia;

    public function getFilesAttribute()
    {
        $media = $this->getMedia('media');
        if (!$media->isEmpty()) {
            return $media;
        } else {
            return null;
        }
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaConversion('media')
            ->format(\Spatie\Image\Manipulations::FORMAT_WEBP)
            ->nonQueued();
    }
}
