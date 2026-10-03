<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
       $userModel = new UserModel();
$users = $userModel->findAll();

        $data = [
            'title' => 'User Accounts',
            'users' => $users
        ];

        return view('users/index', $data);
    }
    public function new()
{
    $data = [
        'title'      => 'New User',
        'validation' => session('validation'),
    ];

    return view('users/new', $data);
}

public function create()
{
    $rules = [
        'username'  => 'required|is_unique[users.username]',
        'full_name' => 'required',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $userModel = new UserModel();

    $userModel->insert([
        'username'   => $this->request->getPost('username'),
        'full_name'  => $this->request->getPost('full_name'),
        'created_at' => date('Y-m-d H:i:s'),
    ]);

    return redirect()
        ->to('/users')
        ->with('success', 'User added successfully.');
}

public function edit($id)
{
    $userModel = new UserModel();
    $user = $userModel->find($id);

    if ($user === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'User not found.'
        );
    }

    $data = [
        'title'      => 'Edit User',
        'user'       => $user,
        'validation' => session('validation'),
    ];

    return view('users/edit', $data);
}

public function update($id)
{
    $userModel = new UserModel();
    $user = $userModel->find($id);

    if ($user === null) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
            'User not found.'
        );
    }

    $rules = [
        'username' => "required|is_unique[users.username,id,{$id}]",
        'full_name' => 'required',
    ];

    if (! $this->validate($rules)) {
        return redirect()
            ->back()
            ->withInput()
            ->with('validation', $this->validator);
    }

    $data = [
        'username'  => $this->request->getPost('username'),
        'full_name' => $this->request->getPost('full_name'),
    ];

    $avatar = $this->request->getFile('avatar');

    if ($avatar !== null && $avatar->getError() !== UPLOAD_ERR_NO_FILE) {
        $avatarRules = [
            'avatar' => [
                'label' => 'Profile Picture',
                'rules' => [
                    'uploaded[avatar]',
                    'max_size[avatar,2048]',
                    'is_image[avatar]',
                    'mime_in[avatar,image/jpeg,image/png]',
                    'ext_in[avatar,jpg,jpeg,png]',
                ],
            ],
        ];

        if (! $this->validate($avatarRules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('validation', $this->validator);
        }

        $filename = $avatar->getRandomName();
        $destination = FCPATH . 'uploads/avatars/' . $filename;

        service('image')
            ->withFile($avatar->getTempName())
            ->fit(300, 300, 'center')
            ->save($destination, 85);

        $data['avatar'] = $filename;
    }

    $userModel->update($id, $data);

    return redirect()
        ->to('/users')
        ->with('success', 'User updated successfully.');
}
}