<?php

namespace App\models\submission;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class sub_cv_attachment extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
}
