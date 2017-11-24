<?php

namespace App\Http\Controllers\Developer_sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('developer.home_dev_sales.index');
    }

    public function DataEform()
    {
    	return view('developer.home_dev_sales.eform_pengajuan.index');
    }
}
