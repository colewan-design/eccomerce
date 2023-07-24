<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;

class CustomersController extends Controller
{
    public function subscribeCustomer(Request $request) {
        $find_customer = DB::table('customers')
            ->where('user_email', $request->user_email)
            ->get();
        if(count($find_customer) > 0) {
            /** return duplicate customer warning */
            return response('Customer email already exists', 500);
        } else {
            $customer_model = new Customer();
            columnSetter($customer_model, $request);
            $customer_model->save();

            $user_model = new User();
            columnSetter($user_model, $request);
            $user_model->save();
            return response('Customer successfully saved', 200);
        }
    }
}
