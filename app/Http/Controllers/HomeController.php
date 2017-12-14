<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if ( 'developer' == session('authenticate.role') ) {
            return redirect()->route('developer.index');
        }

        $results = \Client::setBase('common')
            ->setQuery(['without_independent' => true])
            ->setEndpoint('developers')->get();

        $developers = collect([]);

        if ($results['code'] == 200) {
            collect($results['contents']['data'])->filter(function ($developer) use (&$developers) {
                return $developers->push( array_only($developer, ['image', 'company_name']) );
            });
        }

        $rincian_pinjaman =  null;
        $detail_angsuran =   null;
        config(['jsvalidation.focus_on_error' => false]);
    	return view('home.index', compact('developers','rincian_pinjaman','detail_angsuran'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detailProduct()
    {
        return view('product.index');
    }

    public function aboutUs()
    {
        return view('about-us.index');
    }

    public function postcalculate(Request $request){
        $data = $request->except('_token');
        $interset = $data['interest'];
        if($interset==1){
            $type = 'generateFlat';
        }elseif ($interset==2) {
            $type ='generateEfektif';
        }elseif ($interset==3) {
            $type ='generateEfektifFixedFloat';
        }elseif ($interset == 4) {
            $type ='generateEfektifFixedFloorFloat';
        }else{
            dd('type not found');
        }
        $price = $data['price'];
        $term = $data['time_period'];
        $rate = $data['rate'];
        $downPayment = $data['dp'];
        $priceNumber = str_replace(".", "", $price);
        $fxflterm = $data['time_period_total'];
        $fxterm =  $data['time_period_fixed'];
        $fxrate =  $data['interest_rate_fixed'];
        $flrate =  $data['interest_rate_float'];
        if($interset== 1 || $interset ==2){
            $dataSend = array(
                 'type' => $type,
                 'price' => $priceNumber,
                 'term' => $term,
                 'rate' => $rate,
                 'downPayment' => $downPayment
            );
        }
        else if ($interset== 3){
            $dataSend = array(
                  'type' => $type,
                  'price' => $priceNumber,
                  'fxflterm' => $fxflterm,
                  'fxterm'    => $fxterm,
                  'fxrate'   => $fxrate,    
                  'flrate'   => $flrate,
                 'downPayment' => $downPayment
            );
        } 
        else if($interset== 4){
            $fflterm = $data['time_period_floor'];
            $ffloatlrate = $data['interest_rate_floor'];
            $dataSend = array(
                'type' => $type,
                'price' => $priceNumber,
                'fxflflterm' => $fxflterm,
                'ffxterm' => $fxterm,
                'fflterm' => $fflterm,
                'ffxrate' => $fxrate,
                'ffloorrate' => $flrate,
                'ffloatlrate' => $ffloatlrate, 
                'downPayment' => $downPayment
            );
        }
        $response = Client::setBase('common')->setEndpoint('calculator')->setBody($dataSend)->post(); 
        $rincian_pinjaman =  $response['contents']['rincian_pinjaman'];
        $detail_angsuran =   $response['contents']['detail_angsuran'];
        return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran'));
    }

     public function calculate(Request $request){
        $rincian_pinjaman =  null;
        $detail_angsuran =   null;
        return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran'));
    }
}
