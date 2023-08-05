<?php 
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class loginAdminFilter implements FilterInterface {
  public function before(RequestInterface $request, $arguments = null)
  {
    if(!session('id_admin')){
      return redirect()->to(site_url('/admin'));
    }
  }
  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    
  }
}


?>