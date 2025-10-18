<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Entities\User;

class Signup extends BaseController
{
    public function __construct()
    {
        // Si ya está logueado, no permitir signup
        if (session('is_logged_in')) {
            redirect()->to('/tasks')->send();
            exit;
        }
    }

    public function new()
    {
        return view('signup/new', [
            'user' => ['name' => '', 'email' => ''],
        ]);
    }

    public function create()
    {
        $users = new UserModel();

        $data = [
            'name'                  => $this->request->getPost('name'),
            'email'                 => $this->request->getPost('email'),
            'password'              => $this->request->getPost('password'),
            'password_confirmation' => $this->request->getPost('password_confirmation'),
        ];

        // Si usas Entity para hashear por evento
        $user = new User($data);

        if (! $users->save($user)) {
            return redirect()->back()
                ->with('errors', $users->errors())
                ->with('warning', 'Revisa los errores')
                ->withInput();
        }

        return redirect()->to('/login')->with('info', 'Cuenta creada. Ahora inicia sesión.');
    }
}