<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posting extends Model
{
     
	protected $fillable = [
        'position', 'posting_date', 'manager_id', 'project','employee_id',
    ];	


     public function employee(){
		return $this->belongsTo('App\employee');
	}
}
