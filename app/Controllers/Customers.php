<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Andrea Santos',
                'email'     => 'andrea.santos@example.com',
                'phone'     => '09171234567'
            ],
            [
                'full_name' => 'Joshua Reyes',
                'email'     => 'joshua.reyes@example.com',
                'phone'     => '09181234567'
            ],
            [
                'full_name' => 'Maria Cruz',
                'email'     => 'maria.cruz@example.com',
                'phone'     => '09191234567'
            ],
            [
                'full_name' => 'Daniel Garcia',
                'email'     => 'daniel.garcia@example.com',
                'phone'     => '09201234567'
            ],
            [
                'full_name' => 'Nicole Mendoza',
                'email'     => 'nicole.mendoza@example.com',
                'phone'     => '09211234567'
            ]
        ];

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customers
        ];

        return view('customers/index', $data);
    }
}