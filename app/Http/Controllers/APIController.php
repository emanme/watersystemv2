<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\WaterBillController;

class APIController extends Controller
{
    public $waterbill;

    public function __construct()
    {
        $this->waterbill = new WaterBillController();
    }
    
    public function save_reading(Request $request)
    {
        
        //no need to have  $request->next_month
        //request->reading_meter is the value of the meter during the reading (current)

        $this->waterbill->getConnectionType($request->customer_id);
        $this->waterbill->getCurrentBalance($request->customer_id);
        $this->waterbill->computeBillConsumption($request->reading_meter);

        $current_month= date('M d, Y ', strtotime($request->current_month));
        $nextBillDate = date("M d", strtotime($request->current_month . " +1 month"));
        $current_month_m_y = date("MY", strtotime($request->current_month));

        $dates = explode('-', str_replace([' ', ','], ' ', $this->waterbill->computed_total['date']));
        $endMonthFromLastBill =  date("M d, Y", strtotime($dates[0]. ', '. date("Y", strtotime($dates[1]))));
        $endMonthFromLastBill_m_d=date("M d",strtotime($endMonthFromLastBill));
        $endMonthFromLastBill_m_y=date("MY",strtotime($endMonthFromLastBill));
 

$datable = [
    'request->current_month' => $request->current_month,
    'nextBillDate' =>$nextBillDate,
    'current_month_m_y' => $current_month_m_y,
    'dates' => $dates,
    'compair' => $endMonthFromLastBill_m_y. " & ".$current_month_m_y,
     
    'endMonthFromLastBill' => $endMonthFromLastBill,
];
if($this->waterbill->computed_total['meter_consumption'] <0){
    
    return response()->json(['created' => false,'message'=>'reading must greater than '.$this->waterbill->balance['reading_meter'] ]);
}
        if($endMonthFromLastBill_m_y==$current_month_m_y){
            return response()->json(['created' => false,'message'=>'date-range already exist','datable'=>$datable]);
        }
        $fillable=[
            'customer_id' => $request->customer_id,
            'period_covered' => $endMonthFromLastBill_m_d.'-'.$current_month, //$nextBillDate
            'reading_date' => date('Y-m-d', strtotime($request->read_date)),
            'reading_meter' => $request->reading_meter,
            'reading_consumption' => $this->waterbill->computed_total['meter_consumption'],
            'billing_amount' => $this->waterbill->computed_total['amount_consumption'],
            'billing_surcharge' => '0.00',
            'billing_meter_ips' => $this->waterbill->balance->billing_meter_ips,
            'billing_total' => number_format($this->waterbill->computed_total['total'],2, '.', ''),
            'balance' => number_format($this->waterbill->computed_total['total'],2, '.', ''),
            'posted_by' => $request->id,
            'user_id' => $request->id,
        ];
        
       $transactions = Transaction::create($fillable);
        return response()->json(['created' => true, 'data'=>$fillable]);
    }
}
