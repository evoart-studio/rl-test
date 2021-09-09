<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Employees extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'gender',
        'salary',
    ];

    protected $casts = [
        'salary' => 'integer',
    ];

    public static function gender($key): string
    {
        $out = $key == 'male' ? 'Мужчина' : 'Женщина';
        return $out;
    }

    public function departments(): BelongsToMany
    {
        return $this->belongsToMany(Departments::class);
    }
}
