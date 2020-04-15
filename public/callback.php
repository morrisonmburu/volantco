<?php 
require '../lepheme/vendor/autoload.php';
$app = require_once '../lepheme/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->handle(Illuminate\Http\Request::capture());
use Illuminate\Database\Eloquent\Model;
use \App\Payments;
// use Storage;

//callbcak data from mpesa
$callbackResponse = file_get_contents('php://input');

$mpesaResponse = json_decode($callbackResponse, true);

$MerchantRequestID = $mpesaResponse['Body']['stkCallback']['MerchantRequestID'];
$response = $mpesaResponse['Body']['stkCallback']['ResultDesc'];
$resultcode = $mpesaResponse['Body']['stkCallback']['ResultCode'];

//getting payment data from database
$pay = Payments::where('MerchantRequestID', '=', $MerchantRequestID)->first();

//updating payment data
if ($resultcode == '1032') {
	$status = 0;
}else{
	$pay->payment_status = 1;
}
$pay->ResponseCode = $resultcode;
$pay->ResultDesc = $response;

if($pay->save()){
	$logfile = "callbackResponse.txt";
	$log = fopen($logfile, "a");
	fwrite($log, "successfull");
	fclose($log);
}else{
	$logfile = "callbackResponse.txt";
	$log = fopen($logfile, "a");
	fwrite($log, "Callback error");
	fclose($log);
}

?>