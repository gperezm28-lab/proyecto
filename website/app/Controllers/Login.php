<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        // Si ya está logueado, que no entre a login otra vez
        if (session('is_logged_in')) {
            redirect()->to('/tasks')->send();
            exit;
        }
    }

    public function new()
    {
        return view('login/new', [
            'email' => '',
        ]);
    }

    public function attempt()
    {
        $model = new UserModel();

        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $remember = (bool) $this->request->getPost('remember');

        $user = $model->where('email', $email)->first();

        if (! $user || ! password_verify($password, $user->password_hash)) {
            return redirect()->back()
                ->with('warning', 'Credenciales incorrectas')
                ->withInput();
        }

        // Inicia sesión
        session()->set([
            'user_id'       => $user->id,
            'user_name'     => $user->name,
            'is_admin'      => (bool) ($user->is_admin ?? 0),
            'is_logged_in'  => true,
        ]);

        // Mantener sesión al cerrar el navegador (opcional)
        if ($remember) {
            session()->setTempdata('remember_me', true, 60 * 60 * 24 * 30); // 30 días
        }

        // Redirige a la página que quiso visitar originalmente o a /tasks
        $redirectTo = session('redirect_after_login') ?? '/tasks';
        session()->remove('redirect_after_login');

        return redirect()->to($redirectTo)->with('info', 'Bienvenido');
    }

    public function logout()
    {
        // Permite salir aunque entre logueado; no aplicamos guard inverso aquí
        session()->destroy();
        return redirect()->to('/login')->with('info', 'Sesión cerrada');
    }
}