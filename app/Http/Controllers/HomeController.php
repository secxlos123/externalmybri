<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Client;
use Validator;
use Session;

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
      config(['jsvalidation.focus_on_error' => false]);
    	return view('home.index', compact('developers'));
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
      $interest_rate_type = $data['interest_rate_type'];
      if($interest_rate_type==1){
          $type = 'generateFlat';
      }elseif ($interest_rate_type==2) {
          $type ='generateEfektif';
      }elseif ($interest_rate_type==3) {
          $type ='generateEfektifFixedFloat';
      }elseif ($interest_rate_type == 4) {
          $type ='generateEfektifFixedFloorFloat';
      }else{
          dd('type not found');
      }

      $maxTerm = 240; 
      $minTerm = 12;
      $maxRate =99.99;
      $price = $data['price'];
      $term = $data['time_period'];
      $rate = $this->convertCommatoPoint($data['rate']);
      $downPayment = $data['dp'];
      $priceNumber = str_replace(".", "", $price);
      $fxflterm = $data['time_period_total'];
      $fxterm =  $data['time_period_fixed'];
      $fxrate =  $this->convertCommatoPoint($data['interest_rate_fixed']);
      $flrate =  $this->convertCommatoPoint($data['interest_rate_float']);
      
      $messagesError = "";
      $error = false;
      if($price <= 0){
        $error = true;
         $messagesError .='Harga rumah tidak boleh 0 <br/>';
      }

      if($downPayment <= 0){
        $error = true;
        $messagesError .='Dp tidak boleh 0 <br/>';
      }   

      if($interest_rate_type== 1 || $interest_rate_type ==2){
 
        $rules = [
          'price' => 'required',
          'time_period' => 'required',
          'dp' => 'required',
          'down_payment' => 'required',
          'price_platform' => 'required',
          'time_period' => 'required',
          'rate' => 'required',
        ];

        $customMessages = [
        'price.required' => 'Harga rumah harus diisi',
        'time_period.required' => 'Jangka waktu  harus diisi',
        'down_payment.required' => 'Hasil dp  harus diisi',
        'rate.required' => 'Suku bunga harus diisi',
        ];

        if($term > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu tidak boleh lebih dari '.$maxTerm.'<br/>';
        }

        if($rate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga tidak boleh lebih dari '.$maxRate.'<br/>';
        }

        if($term < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu minimal '.$minTerm.'<br/>';
        }

        $dataSend = array(
               'type' => $type,
               'price' => $priceNumber,
               'term' => $term,
               'rate' => $rate,
               'downPayment' => $downPayment
        );
      }else if ($interest_rate_type== 3){

        $rules = [
        'price' => 'required',
        'dp' => 'required',
        'down_payment' => 'required',
        'price_platform' => 'required',

        'time_period_total' => 'required',
        'interest_rate_fixed' => 'required',
        'time_period_fixed' => 'required',
        'interest_rate_float' => 'required',
        ];

        $customMessages = [
        'price.required' => 'Harga rumah harus diisi',
        'down_payment.required' => 'Hasil dp  harus diisi',
        ];
        
        if($fxflterm > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu Total tidak boleh lebih dari '.$maxTerm.'<br/>';
        }

        if($fxflterm < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu Total minimal '.$minTerm.'<br/>';
        }

        if($fxterm < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu Fixed minimal '.$minTerm.'<br/>';
        }

        if($fxterm > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu Fixed tidak boleh lebih dari '.$maxTerm.'<br/>';
        }else if($fxterm == $fxflterm){
           $error = true;
           $messagesError .='Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total<br/>';
        }

        if($fxrate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga Fixed tidak boleh lebih dari '.$maxRate.'<br/>';
        }

        if($flrate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga Float tidak boleh lebih dari '.$maxRate.'<br/>';
        }

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
      else if($interest_rate_type== 4){
          $fflterm = $data['time_period_floor'];
          $ffloatlrate = $this->convertCommatoPoint($data['interest_rate_floor']);

          $rules = [
            'price' => 'required',
            'dp' => 'required',
            'down_payment' => 'required',
            'price_platform' => 'required',

            'time_period_total' => 'required',
            'time_period_fixed' => 'required',
            'interest_rate_fixed' => 'required',
            'interest_rate_float' => 'required',
            'time_period_floor' => 'required',
            'interest_rate_floor' => 'required',
          ];

         $customMessages = [
            'price.required' => 'Harga rumah harus diisi',
            'down_payment.required' => 'Hasil dp  harus diisi',
          ];

        if($fxflterm > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu Total tidak boleh lebih dari '.$maxTerm.'<br/>';
        }

        if($fxterm > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu Fixed tidak boleh lebih dari '.$maxTerm.'<br/>';
        } else if($fxterm == $fxflterm){
          $error = true;
           $messagesError .='Jangka Waktu Fixed tidak boleh sama dengan Jangka Waktu Total<br/>';
        }
        
        if($fxflterm < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu Total minimal '.$minTerm.'<br/>';
        }

        if($fxterm < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu Fixed minimal '.$minTerm.'<br/>';
        }

        if($fflterm < $minTerm){
           $error = true;
           $messagesError .='Jangka Waktu Floor minimal '.$minTerm.'<br/>';
        }


        if($fflterm > $maxTerm){
           $error = true;
           $messagesError .='Jangka Waktu Floor tidak boleh lebih dari '.$maxTerm.'<br/>';
        }else if($fflterm == $fxflterm){
          $error = true;
           $messagesError .='Jangka Waktu Floor tidak boleh sama dengan Jangka Waktu Total<br/>';
        }

        if($fxrate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga Fixed tidak boleh lebih dari '.$maxRate.'<br/>';
        }

        if($flrate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga Float tidak boleh lebih dari '.$maxRate.'<br/>';
        }

        if($ffloatlrate > $maxRate){
           $error = true;
           $messagesError .='Suku bunga Floor tidak boleh lebih dari '.$maxRate.'<br/>';
        }

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

      if($error){
         \Session::flash('error_flash_message', $messagesError);
         return redirect()->back()->withInput($request->input()); 
      }


      $validator = Validator::make($data, $rules); 
      if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect()->back()->withInput($request->input())->withErrors($messages);
      }  
      $response = Client::setBase('common')->setEndpoint('calculator')->setBody($dataSend)->post(); 
      $rincian_pinjaman =  $response['contents']['rincian_pinjaman'];
      $detail_angsuran =   $response['contents']['detail_angsuran']; 
      $price = number_format($priceNumber, 0, ',', '.');
      return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran','interest_rate_type','price'));
    }

    public function calculate($price = null){
      if($price){
          $price = number_format($price, 0, ',', '.');
      }
        $rincian_pinjaman =  null;
        $detail_angsuran =   null;
        return view('home.calculator.property_simulasi', compact('rincian_pinjaman','detail_angsuran','price'));
    }

    public function convertCommatoPoint($value){
       $result = floatval(str_replace(',', '.', str_replace('.', '', $value)));
       return $result;
    }
}
