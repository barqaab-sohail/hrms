<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class charging extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;

    public function employee(){
		return $this->belongsTo('App\employee');
	}
}
