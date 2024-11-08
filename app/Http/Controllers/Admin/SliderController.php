<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Slider\SliderService;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider){
        $this->slider = $slider;
        
    }

    public function create(){
        return view('admin.slider.add',[
            'title' => 'Thêm slider mới'
        ]);
    }
}
