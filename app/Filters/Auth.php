<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $ionAuth = service('ionAuth');
        $session = service('session');

        if (! $ionAuth->loggedIn()) {
            $session->setFlashdata('alert', 'Musíte být přihlášeni, abyste mohli pokračovat.');
            return redirect()->route('prihlaseni');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}
