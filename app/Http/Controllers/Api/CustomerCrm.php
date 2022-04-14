<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerCrm extends Controller
{
    public function findClient(Request $request)
    {
        $request->validate([
            'phone_number' => 'required'
        ]);

        $findCustomer = Customer::where('phone_number' , $request->phone_number)->first();

        if(!$findCustomer)
        {
            return response()->json(['success' => false , 'message' => 'Could not find hte customer']);
        }


        return response()->json(['success' => true , 'message' => 'Customer found' , 'data' => compact('findCustomer')]);


    }

    public function findClientByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);

        $findCustomer = Customer::where('email' , $request->email)->first();

        if(!$findCustomer)
        {
            return response()->json(['success' => false , 'message' => 'Could not find hte customer']);
        }


        return response()->json(['success' => true , 'message' => 'Customer found' , 'data' => compact('findCustomer')]);


    }

    public function findCustomerByID(Request $request)
    {
        $request->validate([
            'customer_id' => 'required'
        ]);

        $findCustomer = Customer::where('id' , $request->customer_id)->first();

        if(!$findCustomer)
        {
            return response()->json(['success' => false , 'message' => 'Could not find hte customer']);
        }


        return response()->json(['success' => true , 'message' => 'Customer found' , 'data' => compact('findCustomer')]);

    }


    public function customers()
    {
        $customers = Customer::all();

        return response()->json(['success' => true , 'data' => compact('customers')]);
    }

    public function createAccount(Request $request)
    {
            $request->validate([
                'full_name' => 'required',
                'email' => 'required',
                'address' => 'required',
                'company_name' => 'required',
                'phone_number' => 'required'
            ]);

          $newCustomer = new Customer();
          $newCustomer->full_name = $request->full_name;
          $newCustomer->email = $request->email;
          $newCustomer->address = $request->address;
          $newCustomer->company_name = $request->company_name;
          $newCustomer->phone_number = $request->phone_number;
          $newCustomer->save();

          return response()->json(['success' => true , 'message' => 'Account created successfully']);
    }
}
