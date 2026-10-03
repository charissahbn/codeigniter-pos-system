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
            'customers' => $customers,
        ];

        return view('customers/index', $data);
    }

    public function new()
    {
        $data = [
            'title'      => 'New Customer',
            'validation' => session('validation'),
        ];

        return view('customers/new', $data);
    }
    public function create()
{
    $rules = [
        'full_name' => 'required',
        'email'     => 'required|valid_email',
        'phone'     => 'permit_empty',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $customerModel = new CustomerModel();

    $customerModel->insert([
        'full_name'  => $this->request->getPost('full_name'),
        'email'      => $this->request->getPost('email'),
        'phone'      => $this->request->getPost('phone'),
        'created_at' => date('Y-m-d H:i:s'),
    ]);

    return redirect()
        ->to('/customers')
        ->with('success', 'Customer added successfully.');
}
public function edit($id)
{
    $customerModel = new CustomerModel();
    $customer = $customerModel->find($id);

    if ($customer === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Customer not found.'
        );
    }

    $data = [
        'title'      => 'Edit Customer',
        'customer'   => $customer,
        'validation' => session('validation'),
    ];

    return view('customers/edit', $data);
}

public function update($id)
{
    $rules = [
        'full_name' => 'required',
        'email'     => 'required|valid_email',
        'phone'     => 'permit_empty',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $customerModel = new CustomerModel();

    if ($customerModel->find($id) === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'Customer not found.'
        );
    }

    $customerModel->update($id, [
        'full_name' => $this->request->getPost('full_name'),
        'email'     => $this->request->getPost('email'),
        'phone'     => $this->request->getPost('phone'),
    ]);

    return redirect()
        ->to('/customers')
        ->with('success', 'Customer updated successfully.');
}
}