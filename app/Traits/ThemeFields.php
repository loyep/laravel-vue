<?php

namespace App\Traits;

use App\Models\Theme;
use Illuminate\Database\Eloquent\Builder;

/**
 * Trait ThemeFields
 *
 * @property ThemeCollection theme
 */
trait ThemeFields
{
    /**
     * @param string $attribute
     *
     * @return mixed|null
     */
    public function getTheme($attribute)
    {
        if ($theme = $this->theme->{$attribute}) {
            return $theme;
        }
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fields()
    {
        return $this->theme();
    }

    /**
     * @param Builder $query
     * @param array | string $theme
     * @param null $value
     * @param string $operator
     *
     * @return Builder
     */
    public function scopeHasTheme(Builder $query, $theme, $value = null, string $operator = '=')
    {
        if (!is_array($theme)) {
            $theme = [$theme => $value];
        }
        foreach ($theme as $key => $value) {
            $query->whereHas('theme', function (Builder $query) use ($key, $value, $operator) {
                if (!is_string($key)) {
                    return $query->where('key', $operator, $value);
                }
                $query->where('key', $operator, $key);

                return is_null($value) ? $query :
                    $query->where('value', $operator, $value);
            });
        }

        return $query;
    }

    /**
     * @param Builder $query
     * @param string|array $theme
     * @param null $value
     *
     * @return Builder
     */
    public function scopeHasThemeLike(Builder $query, $theme, $value = null)
    {
        return $this->scopeHasTheme($query, $theme, $value, 'like');
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    public function saveField($key, $value)
    {
        return $this->saveTheme($key, $value);
    }

    /**
     * @param string|array $key
     * @param mixed $value
     *
     * @return bool
     */
    public function saveTheme($key, $value = null)
    {
        if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->saveOneTheme($k, $v);
            }
            $this->load('theme');

            return true;
        }

        return $this->saveOneTheme($key, $value);
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return bool
     */
    private function saveOneTheme($key, $value)
    {
        $theme = $this->theme()->where('key', $key)
            ->firstOrNew(['key' => $key]);
        $result = $theme->fill(['value' => $value])->save();
        $this->load('theme');

        return $result;
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function createField($key, $value)
    {
        return $this->createTheme($key, $value);
    }

    /**
     * @param string|array $key
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Support\Collection
     */
    public function createTheme($key, $value = null)
    {
        if (is_array($key)) {
            return collect($key)->map(function ($value, $key) {
                return $this->createOneTheme($key, $value);
            });
        }

        return $this->createOneTheme($key, $value);
    }

    /**
     * @param string $key
     * @param mixed $value
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    private function createOneTheme($key, $value)
    {
        $theme = $this->theme()->create([
            'key' => $key,
            'value' => $value,
        ]);
        $this->load('theme');

        return $theme;
    }

    /**
     * @return mixed
     */
    public function theme()
    {
        return $this->morphOne(Theme::class, 'themeable');
    }

    /**
     * @param string $key
     * @return mixed
     */
    public function getThemeValue(string $key)
    {
        return $this->theme->$key;
    }
}
