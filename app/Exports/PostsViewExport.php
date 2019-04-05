<?php

namespace App\Exports;

use App\Post;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PostsViewExport implements FromView, ShouldAutoSize
{

	public function __construct($data = 0)
	{
	    $this->data = $data;
	}
    public function view() : View
    {
        return view('excel.formexim', [
            'oSelect' => $this->data
        ]);
    }
}
