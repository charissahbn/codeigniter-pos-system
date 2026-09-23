<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index()
    {
       $customerModel = new CustomerModel();
$customers = $customerModel->findAll();

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customers
        ];

        return view('customers/index', $data);
    }
}