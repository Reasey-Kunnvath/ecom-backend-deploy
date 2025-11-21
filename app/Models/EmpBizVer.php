<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpBizVer extends Model
{
    protected $table = 'emp_biz_verifications';

    protected $fillable = [
        'biz_reg_no',
        'biz_license_img',
        'profile_id',
    ];

    public function profile()
    {
        return $this->belongsTo(EmpProfile::class, 'profile_id', 'id');
    }
}