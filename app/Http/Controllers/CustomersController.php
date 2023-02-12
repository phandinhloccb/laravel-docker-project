<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('customers.create', compact('companies'));
    }


    public function store()
    {
        $data = request() -> validate(
            [
            'name' => 'min:3',
            'email' => 'min:3',
            'active' => 'integer',
            'company_id' => 'integer',
        ]
        );
        Customer::create($data);
        return back();
    }

    public function show($customer)
    {
        $customer = Customer::where('id', $customer)->firstOrFail();

        return view('customers.show', compact('customer'));
    }
}
