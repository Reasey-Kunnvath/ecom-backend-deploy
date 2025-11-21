<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = ['role_name', 'role_desc', 'is_active', 'created_by', 'created_at', 'updated_at'];
    public function scopeSearch($query, $value)
    {
        if ($value == null) {
            return $query->where('role_name', 'ILIKE', "%$value%");
        }
        return $query->where('role_name', 'ILIKE', "%$value%");
    }
}