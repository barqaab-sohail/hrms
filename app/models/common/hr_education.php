<?php

namespace App\models\common;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class hr_education extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    protected $fillable = [
        'degree_name', 'level',
    ];

    public function cv_detail()
    {
        return $this->belongsToMany('App\models\cv\cv_detail');
    }
}
