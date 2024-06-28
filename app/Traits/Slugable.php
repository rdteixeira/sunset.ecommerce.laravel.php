<?php
namespace App\Traits;

use Illuminate\Support\Str;

trait Slugable {

    public static function bootSlugable() {
        static::creating(function($model) {
            $model->generateSlug();
        });
        static::updating(function($model) {
            $model->generateSlug();
        });
    }

    protected function generateSlug() {
        $counter = 1;
        $slug = $slugBase = Str::slug($this->getAttribute('title'));
        while(self::where($this->getKeyName(), '!=', $this->getKey())->where('slug', $slug)->count()) {
            $slug = $slugBase."-$counter";
            $counter++;
        }
        $this->setAttribute('slug', $slug);
    }

}
