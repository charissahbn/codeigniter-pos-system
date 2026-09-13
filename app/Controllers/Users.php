<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username'  => 'admin01',
                'full_name' => 'Carla Ramos',
                'role'      => 'Administrator'
            ],
            [
                'username'  => 'cashier01',
                'full_name' => 'John Bautista',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'cashier02',
                'full_name' => 'Angela Flores',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'manager01',
                'full_name' => 'Mark Villanueva',
                'role'      => 'Manager'
            ],
            [
                'username'  => 'staff01',
                'full_name' => 'Paolo Navarro',
                'role'      => 'Staff'
            ]
        ];

        $data = [
            'title' => 'User Accounts',
            'users' => $users
        ];

        return view('users/index', $data);
    }
}