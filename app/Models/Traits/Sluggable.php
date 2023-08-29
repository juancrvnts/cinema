<?php

namespace App\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait Sluggable
{
    /**
     * Boot the sluggable trait for a model.
     *
     * @return void
     */
    public static function bootSluggable()
    {
        static::creating(function (Model $model) {
            $model->addSlug();
        });

        static::updating(function (Model $model) {
            $model->addSlug();
        });
    }

    /**
     * Add the slug to the model.
     */
    protected function addSlug()
    {
        $this->guardAgainstInvalidSlugOptions();

        $slug = $this->makeSlugUnique($this->generateNonUniqueSlug());

        $this->setAttribute($this->sluggable['save_to'], $slug);
    }

    /**
     * Make the given slug unique.
     *
     * @param  string  $slug
     * @param  int  $suffix
     * @return string
     */
    protected function makeSlugUnique(string $slug, int $suffix = 1): string
    {
        $originalSlug = $slug;

        while ($this->otherRecordExistsWithSlug($slug) || $slug === '') {
            $slug = $originalSlug.'-'.$suffix++;
        }

        return $slug;
    }

    /**
     * Determine if a record exists with the given slug.
     *
     * @param  string  $slug
     * @return bool
     */
    protected function otherRecordExistsWithSlug(string $slug): bool
    {
        $query = static::where($this->sluggable['save_to'], $slug)
                            ->where($this->getKeyName(), '!=', $this->getKey() ?? '0');

        // include trashed models if required
        if ($this->usesSoftDeleting()) {
            $query = $query->withTrashed();
        }

        return (bool) $query->exists();
    }

    /**
     * Generate a non unique slug for this record.
     *
     * @return string
     */
    protected function generateNonUniqueSlug(): string
    {
        return Str::slug($this->getAttribute($this->sluggable['build_from']));
    }

    /**
     * This function will throw an exception when any of the options is missing or invalid.
     */
    protected function guardAgainstInvalidSlugOptions()
    {
        if (! isset($this->sluggable['build_from'])) {
            throw new Exception('Missing slug option [build_from]');
        }

        if (! isset($this->sluggable['save_to'])) {
            throw new Exception('Missing slug option [save_to]');
        }
    }

    /**
     * Does this model use softDeleting.
     *
     * @return bool
     */
    protected function usesSoftDeleting()
    {
        return method_exists($this, 'BootSoftDeletes');
    }
}
