<?php

namespace Safadi\Eloquent\L10n\Concerns;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Safadi\Eloquent\L10n\Contracts\Translatable;

trait HasLocale
{

    /**
     * @var string
     */
    protected static $locale;

    /**
     * Get or Set the current translation locale
     * 
     * @param string $locale
     * @return $this
     */
    public static function locale($locale = null)
    {
        if ($locale !== null) {
            return (new static)->setLocale($locale);
        }
        return static::$locale;
    }

    /**
     * Get the current translations locale
     * 
     * @return string
     */
    public function getLocale(): string
    {
        if (!static::$locale) {
            static::$locale = App::currentLocale();   
        }
        return static::$locale;
    }

    public function getFallbackLocale(): string
    {
        if (!static::$fallback_locale) {
            static::$fallback_locale = App::getFallbackLocale();
        }

        return static::$fallback_locale;
    }

    /**
     * Set the current translations locale
     * 
     * @param string $locale
     * @return $this
     */
    public function setLocale(string $locale): Model|Translatable
    {
        static::$locale = $locale;
        return $this;
    }
}