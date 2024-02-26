<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Service;
use App\Services\ServiceReturnDataArray;
use App\Services\ServicesFromKeyword;
use Illuminate\Pagination\Paginator;

class WaterWorksApprovalController extends Controller
{
    public function index()
    {
        $services = Service::where('status', 'pending_waterworks_inspection')->paginate(20);
        return view('pages.waterworks-request-approval', ServiceReturnDataArray::set('pending_waterworks_inspection', $services));
    }

    public function search(Request $request){
        $services = (new ServicesFromKeyword)->get($request->keyword, 'pending_waterworks_inspection');
        $services = new Paginator($services->all(), 20);
        return view('pages.waterworks-request-approval', ServiceReturnDataArray::set('pending_waterworks_inspection', $services));
    }


    public function approve(Request $request)
    {
        $services = Service::findOrFail($request->id);
        $services->approve();

        return redirect(route('admin.waterworks-request-approvals'));
    }

    public function reject($id)
    {
        $service = Service::findOrFail($id);
        $service->deny();

        return redirect(route('admin.waterworks-request-approvals'));
    }

    public function pendingForCompletion()
    {
       $services= Service::where('status',Service::$READY)->paginate(10);

        return view('pages.pending-for-completion',[
            'services'=>$services
        ]);
    }

    public function markAsDone(Service $service)
    {
        $service->approve();

        $customer = Customer::findOrFail($service->customer_id);
        $customer->connection_status = Customer::ACTIVE;
        $customer->save();
        
        return back();
    }
}
