<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class UserSessionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if the user is logged in
        if (!$session->get('logged_in') || !$session->get('user_id') || !$session->get('username') || !$session->get('emp_id')) {
            // destroy session
            $session->destroy();
            // User is not logged in, redirect to login page
            return redirect()->to(base_url());
        }

        return $request;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something after the route has executed
    }
}
