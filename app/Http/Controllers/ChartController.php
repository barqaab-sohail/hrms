<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\charts\TestChart;
use App\employee;

class ChartController extends Controller
{
   public function index(){

   	$power = employee::all()->where('department_id',1)->count();
   	$water = employee::all()->where('department_id',2)->count();
   	$finance = employee::all()->where('department_id',3)->count();

    $chart = new TestChart;
    $chart->labels(['Power', 'Water', 'Finance']);
    $chart->dataset('My dataset', 'pie', [$power, $water, $finance])
    ->backgroundColor(['red','#008000','#00FFFF']);
    //->title("Department");
     return view('chart', compact('chart'));
	}
}