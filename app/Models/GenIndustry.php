<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GenIndustry extends Model
{
    //

    protected $table = 'gen_industry';
    protected $fillable = [
        'industry_code',
        'industry_name',
        'is_active',
        'desc',
    ];

    public function skills()
    {
        return $this->hasMany(JskSkill::class, 'skill_category');
    }
    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('industry_name', 'ILIKE', "%$value%");
        }
        return $query->where('industry_name', 'ILIKE', "%$value%");
    }
}
