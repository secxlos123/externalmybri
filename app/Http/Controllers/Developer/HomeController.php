<?php

namespace App\Http\Controllers\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    	$response = Client::setEndpoint('get-data-dashboard-developer')
         ->setHeaders(['Authorization' => session('authenticate.token')])
        ->post();
        $userList = $response['contents']['user_list']; 
        return view('developer.home.dashboard',compact('userList'));
        // return view('developer.home.index');
    }

    public function data_table_developer(Request $request){
       
        $stat_date =  $this->_convertMonthYeartoDate($request['start_date_table']);
        $end_date =  $this->_convertMonthYeartoDate($request['end_date_table']);
        $dataSend = array('startList'=>$stat_date,'endList'=>$end_date);
        $response = Client::setEndpoint('get-data-dashboard-developer')
         ->setHeaders(['Authorization' => session('authenticate.token')])
        ->setBody($dataSend)->post();
        $userList = $response['contents']['user_list'];

        echo " <table class='table table-striped table-bordered project-list'>
                <thead class='bg-blue'>
                    <tr>
                        <th>No</th>
                        <th>Nama Proyek</th>
                        <th>Tipe Property</th>
                        <th>Unit</th>
                        <th>Harga Unit</th>
                        <th>Nama Pemohon</th>
                        <th>Status Pengajuan</th>
                    </tr>
                </thead>
                <tbody>";
                  if(!empty($userList)){
                foreach($userList as $key => $value){
                    $no= $key+1;
                    echo "     
                        <tr>
                            <td>".$no."</td>
                            <td>".$value['property_name']."</td>
                            <td>".$value['unit_type']."</td>
                            <td>".$value['address']."</td>
                            <td>".$value['unit_price']."</td>
                            <td>".$value['name']."</td>
                            <td>".$value['approved_status']."</td>
                             
                        </tr>";
                    }
                  }else{
                    echo "<td valign='top' colspan='7' >Tidak ada data di tabel ini</td>";         
                  }
                echo"</tbody>
            </table>";
    }

    public function chart_developer(Request $request){
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $result = array();
        if($start_date =='7'){
            $dataSend = array();
        }else{
            $convertStartDate = $this->_convertMonthYeartoDate($start_date);
            $convertEndDate = $this->_convertMonthYeartoDate($end_date);
            $dataSend = array('startChart'=>$convertStartDate,'endChart'=>$convertEndDate);
        }
        $response = Client::setEndpoint('get-data-dashboard-developer')
         ->setHeaders(['Authorization' => session('authenticate.token')])
        ->setBody($dataSend)->post();
           $chart = $response['contents']['chart'];
           if(!empty($chart)){
                foreach ($chart as $key => $value) {
                    $result[] =[
                             'bulan' => $value['month'],
                     'value' => $value['value'],
                    ];
                }
           }else{
                $result[] = [
                     'bulan' => 'Data tidak ada',
                     'value' => 0,
                ];
           }
           echo json_encode($result);
    }

    public function _convertMonthYeartoDate($montYear){
        $explode = explode('-', $montYear);
        $month = $explode[0];
        $year = $explode[1];
       
        switch ($month) {
            case "Januari":
                $monthNo = 'January';
            break;
            case "Februari":
                $monthNo = 'February';
            break;
            case "Maret":
                $monthNo = 'March'; 
            break;
            case 'April':
                $monthNo = 'April';
            break;
            case 'Mei':
                $monthNo = 'May';
            break;
            case 'Juni':
                $monthNo = 'June';
            break;
            case 'Juli':
                $monthNo = 'July';
            break;
            case  'Agustus':
                $monthNo = 'August';
            break;
            case 'September':
                $monthNo = 'September';
            break;
            case 'Oktober':
                $monthNo = 'October';
            break;  
            case 'November':
                $monthNo = 'November';
            break;
            case 'Desember':
                $monthNo ='December';
            break;          
        } 
        $date =  $monthNo.'-'.$year;
        return $date;
    }
}
