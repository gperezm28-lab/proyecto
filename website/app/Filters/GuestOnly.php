<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GuestOnly implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('is_logged_in')) {
            return redirect()->to('/tasks');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nada
    }
}