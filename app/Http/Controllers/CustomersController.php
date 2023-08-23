<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CustomersController;
use App\Models\Customer;

class CustomersController extends Controller
{
    // When Customers Controller is called, it automatically refers index()
    public function index(){
        // 1. Create and Pass static array to view
        // $customers = ['Johny','Rony','Mony','Liony','Piony'];
        // return view('customers.index', ['customerlist' => $customers]);
        // Passing associative array to blade view in customers folder
    
        // 2. Access DB table records
        //$customers = Customer::all();
        // dd($customers);
        //return view('customers.index', ['customerlist' => $customers]);

        //3. Filtering the records 
        //  $activeCustomers = Customer::where('active', 1)->get();
        //  $inactiveCustomers = Customer::where('active', 0)->get();
         // return view('customers.index', ['activeCustomers' => $activeCustomers, 'inactiveCustomers' => $inactiveCustomers]);

         // 3.1 Use compact() to pass the values to view
          // Passing filtered records to the view using compact ( ) for cleaner code
        // return view ('customers.index', compact('activeCustomers' ,'inactiveCustomers'));

        //4. Instead of (3) Filtering the records - Refactoring the code using Customer Model
     $activeCustomers = Customer::active()->get();  // Search & Calls SCOPE - active() in Customer model
     $inactiveCustomers = Customer::inactive()->get();  // Search & Calls SCOPE - inactive() in Customer model
     return view ('customers.index', compact('activeCustomers' ,'inactiveCustomers'));
    }

    public function store()
    {

        // Possible simple validations : 2.1 - When u need validations use it
        // Validations using method chaining
        $data = request()->validate([   // Method chaining
            'name' => 'required|min:5|max:10',
            'age' => 'required',
            // 'address' => 'required',
            'contactno' => 'required',
            'email' => 'required|email',
            'active' => 'required'
          ]);

     // 1. Inserting the data into the table - No validation 
      $cust = new Customer();     // instance for Customer model is created
      $cust->name = request('name');
      $cust->age = request('age');
      $cust->address = request('address');
      $cust->contactno = request('contactno');
      $cust->email = request('email');
      $cust->active = request('active');
      $cust->save();

        return back();

    } 
}
