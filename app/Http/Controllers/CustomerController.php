<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function costumers()
    {
        return view('customer.customers', [
            'title' => "Customers",
            'customers' => Customer::latest()->get()
        ]);
    }
    public function create()
    {
        return view('customer.create', []);
    }
    public function store(Request $request)
    {
        $accoutNumber = Self::generateAccountNumber();

        $formFields = $request->validate([
            'meter_number' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable', // Add your validation rules for middlename
            'lastname' => 'required',
            'civil_status' => 'required|in:single,married,widowed',
            'purok' => 'nullable', // Add your validation rules for purok
            'setio' => 'nullable', // Add your validation rules for setio
            'barangay' => 'required',
            'contact_number' => 'required|numeric', // Adjust the validation rule based on your requirements
            'type' => 'required|in:residential,commercial', // Updated validation for 'type'
            'status' => 'required|in:active,disconnected,cut', // Updated validation for 'status'
            'establishment_name' => 'nullable', // Add your validation rules for establishment_name

        ]);
        $formFields['account_number'] = $accoutNumber;
        $formFields['longitude'] = '';
        $formFields['latitude'] = '';

        Customer::create($formFields);
        //dd($request);
        //return redirect('/customers');
        return redirect()->route('customers')->with('message', 'Customer created successfully');
    }
    function generateAccountNumber()
    {
        $year = date("Y");
        $month = date("m");
        $number = mt_rand(001010, 999999); // better than rand()
        $number = $year . $month . $number;
        // call the same function if the barcode exists already
        if (Customer::checkCustomerByAccountNumber($number)) {
            return Self::generateAccountNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    public function getCustomers()
    {

        return [
            'title' => "Customers",
            'customers' => Customer::whereIn('status', ['active', 'disconnected'])
                ->filter(request(['search']))
                ->latest()
                ->get()
        ];
    }
    public function costumersNotCut() // customers who are ACTIVE & DISCONNECTED only
    { //change this referrence in Route web.php

        return view('customer.customers', Self::getCustomers());
    }
    public function edit(Customer $customer)
    {

        return view('customer.edit', [
            'title' => "Customers",
            'customer' => $customer
        ]);
    }
    //Update Customer
    public function update(Request $request, Customer $customer)
    {
        $formFields = $request->validate([

            'firstname' => 'required',
            'middlename' => 'nullable', // Add your validation rules for middlename
            'lastname' => 'required',
            'civil_status' => 'required|in:single,married,widowed',
            'purok' => 'nullable', // Add your validation rules for purok
            'setio' => 'nullable', // Add your validation rules for setio
            'barangay' => 'required',
            'contact_number' => 'required|numeric', // Adjust the validation rule based on your requirements
            'type' => 'required|in:residential,commercial', // Updated validation for 'type'
            'status' => 'required|in:active,disconnected,cut', // Updated validation for 'status'
            'establishment_name' => 'nullable', // Add your validation rules for establishment_name
            'latitude' => 'nullable', // Adjust the validation rule based on your requirements
            'longitude' => 'nullable',
        ]);

        // $customer = Customer::findOrFail($customer->id); // Find the customer by ID

        $customer->update($formFields); // Update the customer with the validated form fields

        return redirect()->back()->with('message', 'Customer updated successfully'); // Redirect back with a success message

        // return back();
    }
}
