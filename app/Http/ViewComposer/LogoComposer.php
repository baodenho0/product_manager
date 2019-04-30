<?php 
namespace App\Http\ViewComposer;

use Illuminate\View\View;
use App\Logo;

class ViewComposer
{
	// protected $logo = [];

	public function __construct(){
		

	}

	public function compose(View $view){
		// $view->with('logo','say test');
	}
}
