<?php

namespace App\Http\Controllers\Publics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicsController extends Controller
{

    /*error404*/
    public function error404()
    {
        return view('public/error404');
    }

     /*testimonial*/
    public function testimonial()
    {
        return view('public/testimonial');
    }

    /*设置页*/
    public function setting()
    {
        return view('public/setting');
    }

    /*关于我们*/
    public function aboutus()
    {
        return view('public/about-us');
    }

    /*邮件页*/
    public function contact()
    {
        return view('public/contact');
    }



}