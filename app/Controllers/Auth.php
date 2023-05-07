<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
    protected $userModel;
    protected $helper = ['form'];


    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $data = [
            'title' => 'Login'
        ];


        return view('auth/login', $data);
    }

    public function process()
    {

        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
        ];

        $user = $userModel->where('username', $data['username'])->first();
        if ($user) {
            $isPasswordCorrect = password_verify($data['password'] ?? '', $user['password']);
            // if ($data['password'] == $user['password']) {
            //     session()->setFlashdata('msg', 'Password is correct.');
            //     return redirect()->to(url_to('main/index'));
            // }
            if ($isPasswordCorrect) {

                $this->session->set([
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'isLoggedIn' => TRUE
                ]);
                // session()->setFlashdata('msg', 'Password is correct.');
                return redirect()->to(url_to('main/index'));
            }
            session()->setFlashdata('msg', 'Password is incorrect.');
            return redirect()->to(url_to('login'));
        }
        session()->setFlashdata('msg', 'username is incorrect.');
        return redirect()->to(url_to('login'));
    }

    public function register()
    {
        $data = [
            'title' => 'Login',
            'validation' =>  \Config\Services::validation()
        ];

        return view('auth/register', $data);
    }

    public function store()
    {

        $userModel = new UserModel();
        $rules = [
            'username' => 'required',
            'email'    => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'passwordconf' => 'required|matches[password]',
        ];

        if (!$this->validate($rules)) {
            $validation = \Config\Services::validation();
            return redirect()->to(url_to('register'))->withInput('validation', $validation);
        } else {
            $data = [
                'username' => $this->request->getVar('username'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            $userModel->save($data);

            return redirect()->to(url_to('login'));
        }
    }



    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(url_to('/'));
    }
}
