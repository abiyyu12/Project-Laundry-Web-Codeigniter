<?php 
namespace App\Controllers;

class Login extends BaseController
{

    public function logAdmin()
    {
      $data['validation'] = session()->get('validation');
      return view('admin/login',$data);
    }

    public function login(){
      if(session('id_admin')){
        return redirect()->to(site_url('admin/dashboard'));
      }
      return view('auth/login');
    }

    public function loginProsesAdmin(){
      if(!$this->validate([
        'username' => [
          'rules' => 'required',
          'errors' => [
              'required' => 'Harap mengisi username.',
            ]
          ],
          'password' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Harap mengisi password.',
            ],
          ]
      ])){
        $validation =  ['errors' => $this->validator->getErrors()];
        return redirect()->to('/admin')->withInput()->with('validation',$validation);
      }
      $post = $this->request->getPost();
      $query = $this->db->table('admin')->getWhere(['username' => $post['username']]);
      $admin = $query->getRow();
      if($admin){
        if(password_verify($post['password'],$admin->password)){
          $params = ['id_admin'=> $admin->id_admin];
          session()->set($params);
          return redirect()->to(site_url('admin/dashboard'));
        }else{
          return redirect()->back()->with('error','Password Salah');
        }
      }else{
        return redirect()->back()->with('error','Username Tidak Ditemukan');
      }
    }

    public function logoutAdmin(){
      session()->remove('id_admin');
      return redirect()->to(site_url('/admin'));
    }
}

?>