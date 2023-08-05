<?php 
  namespace App\Controllers;

use App\Models\AdminModel;

  class Admin extends BaseController
  {
      private $adminModel;

      public function __construct()
      {
        $this->adminModel = new AdminModel();
      }

      public function index()
      {
        return view('admin/Dashboard/profile');
      }

      public function profile(){
        $data = [
          'admin' => $this->adminModel->find(session()->get('id_admin')),
          'validation' => session()->get('validation'),
        ];
        return view('admin/Dashboard/profile',$data);
      }

      public function profile_update()
      {
        $post = $this->request->getPost();
        if($post['passLama'] == $post['password']){
          $validate = [
            'nama_admin' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama admin wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon wajib diisi',
                    'is_natural' => 'No telepon tidak valid'
                ],
              ],
              'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi',
                ],
              ], 
              'password' => [
                'rules' => 'required|min_length[8]',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter',
                ],
              ],
              'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                ],
              ],
            ];
        }else{
          $validate = [
            'nama_admin' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama admin wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon wajib diisi',
                    'is_natural' => 'No telepon tidak valid'
                ],
              ],
              'username' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Username wajib diisi',
                ],
              ], 
              'password' => [
                'rules' => 'required|min_length[8]|alpha_numeric',
                'errors' => [
                    'required' => 'Password wajib diisi',
                    'min_length' => 'Password minimal 8 karakter',
                    'alpha_numeric' => 'Tidak boleh diisi selain angka dan huruf'
                ],
              ],
              'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                ],
              ],
            ];
        }
        if(!$this->validate($validate)){
          $validation =  ['errors' => $this->validator->getErrors()];
          return redirect()->to('/admin/profile')->withInput()->with('validation',$validation);
        }
        if($post['passLama'] == $post['password']){
          $data = [
            'id_admin' => session()->get('id_admin'),
            'nama_admin' => $post['nama_admin'],
            'no_telp' => $post['no_telp'],
            'username' => $post['username'],
            'alamat' => $post['alamat'],
          ];
        }else{
          $data = [
            'id_admin' => session()->get('id_admin'),
            'nama_admin' => $post['nama_admin'],
            'no_telp' => $post['no_telp'],
            'username' => $post['username'],
            'password' => password_hash($post['password'],PASSWORD_BCRYPT),
            'alamat' => $post['alamat'],
          ];
        }
        $this->adminModel->save($data);
        return redirect()->to(site_url('admin/profile'))->with('success','Profile Telah berhasil diubah');
      }
  }
?>