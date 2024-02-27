<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    public function index()
    {
        // Create an instance of CustomerController
        $customerController = new CustomerController();

        // Call the getCustomers method
        $result = $customerController->getCustomers();

        return view('billing.billings', $result);
    }
}
