<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class completeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $_name;
    public $_drivername;
    public $_ordertime;
    public $_origin;
    public $_pickup_time;
    public $_destination;
    public $_dropoff_time;
    public $_basefee;
    public $_insurancefee;
    public $_distancefee;
    public $_waitingfee;
    public $_loadingfee;
    public $_additionalLocationFee;
    public $_total;

    public function __construct($customername, $drivername, $from, $to, $order_time, $pickup_time, $price, $truck_type, $base_price, $unit_distance, $unit_additional_price, $additional_location, $insurance, $waiting_time, $loading, $distance, $device, $stops_count)
    {
        $this->_name = $customername;
        $this->_drivername = $drivername;
        $this->_ordertime = date('D, h:m A', strtotime($order_time));
        $this->_origin = $from;
        $this->_pickup_time = date('h:m A', strtotime($pickup_time));
        $this->_destination = $to;
        $this->_dropoff_time = date('h:m A');

        if($device == 'Android'){
            $this->_basefee = $base_price;
            $distance2 = $distance/1000;
            if($distance2 > $unit_distance){
                $this->_discountfee = ($distance2-$unit_distance)*$unit_additional_price;
            }else{
                $this->_discountfee = 0;
            }
            if($stops_count > 0){
                $this->_additionalLocationFee = $additional_location*$stops_count;
            }else{
                $this->_additionalLocationFee = 0;
            }
            $this->_insurancefee = $insurance;
            $this->_waitingfee = $waiting_time;
            $this->_loadingfee = $loading;
        }else{
            $this->_basefee = $base_price;
            if($distance > $unit_distance){
                $this->_distancefee = ($distance-$unit_distance)*$unit_additional_price;
            }else{
                $this->_distancefee = 0;
            }
            if($stops_count > 0){
                $this->_additionalLocationFee = $additional_location*$stops_count;
            }else{
                $this->_additionalLocationFee = 0;
            }
            $this->_insurancefee = $insurance;
            $this->_waitingfee = $waiting_time;
            $this->_loadingfee = $loading;
        }

        $this->_total = $price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->from('morrisonmburu7@gmail.com', 'Volant Ltd')
            ->subject('Do not reply, Volant Ltd')
            ->markdown('completeOrder')
            ->with([
                'name' => $this->_name,
                'drivername' => $this->_drivername,
                'order_time' => $this->_ordertime,
                'origin' => $this->_origin,
                'destination' => $this->_destination,
                'pickup_time' => $this->_pickup_time,
                'dropoff_time' => $this->_dropoff_time,
                'basefee' => $this->_basefee,
                'waitingfee' => $this->_waitingfee,
                'insurancefee' => $this->_insurancefee,
                'distancefee' => $this->_distancefee,
                'additionalLocationFee' => $this->_additionalLocationFee,
                'loadingfee' => $this->_loadingfee,
                'total' => $this->_total,
                'link' => 'https://volantltd.com/'
            ]);
    }
}
