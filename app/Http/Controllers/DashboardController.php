<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exporter;
use App\Http\Controllers\Controller;
use PDF;
use App\Couriers;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function makeExcelCouriers(){
    	$data = DB::table('couriers')->select('firstName','lastName','city','county','paymentType','emergencyContactName','emergencyPhoneNo');
    	$excel = Exporter::make('Excel');
        $excel->loadQuery($data);
        $excel->stream('couriers.xlsx');
    }

    public function makeCsvCouriers(){
    	$data = DB::table('couriers')->select('firstName','lastName','city','county','paymentType','emergencyContactName','emergencyPhoneNo');
    	$excel = Exporter::make('Csv');
        $excel->loadQuery($data);
        $excel->stream('couriers.csv');
    }

    public function makePdfCouriers(){
    	$data = Couriers::all();
        
        $pdf = PDF::loadView('courierspdf', ['data' => $data]) ;

        return $pdf->download('couriers.pdf');
    }
}
