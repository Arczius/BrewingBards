<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class userCheckFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

            return redirect()->to('ForgotPasswordController/ForgotPasswordPage');
    }
    
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}