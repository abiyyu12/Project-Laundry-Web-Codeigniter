<?php 
  namespace App\Controllers;
  use App\Models\PelangganModel;
  use App\Models\TransaksiSatuanModel;
  use App\Models\DetailSatuanModel;
  use App\Models\LayananSatuanModel;

  use App\Models\TransaksiKiloanModel;
  use App\Models\DetailKiloanModel;
  use App\Models\LayananKiloanModel;
  use CodeIgniter\Exceptions\PageNotFoundException;

  class User extends BaseController
  {
      private $pelangganModel;
      private $transaksiSatuanModel;
      private $detailTransaksiSatuan;
      private $layananSatuanModel;
      private $layananKiloanModel;
      private $transaksiKiloanModel;
      private $detailTransaksiKiloan;
      public function __construct()
      {
        $this->pelangganModel = new PelangganModel();
        $this->transaksiSatuanModel = new TransaksiSatuanModel();
        $this->detailTransaksiSatuan = new DetailSatuanModel();
        $this->layananSatuanModel = new LayananSatuanModel();
        $this->transaksiKiloanModel = new TransaksiKiloanModel();
        $this->layananKiloanModel = new LayananKiloanModel();
        $this->detailTransaksiKiloan = new DetailKiloanModel();
      }

      public function index()
      {
          return view('user/landing-page');
      }

      public function login()
      {
        if(session('id_user')){
          return redirect()->to(site_url('/'));
        }
        $data['validation'] = session()->get('validation');
        return view('user/login',$data);
      }

      public function userLoginProcess(){
        if(!$this->validate([
          'email' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Email anda harus diisi.',
              ]
            ],
            'password' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Password anda harus diisi',
              ],
            ],
        ])){
          $validation =  ['errors' => $this->validator->getErrors()];
          return redirect()->to('/login')->withInput()->with('validation',$validation);
        }
        $post = $this->request->getPost();
        $query = $this->db->table('pelanggan')->getWhere(['email' => $post['email']]);
        $user = $query->getRow();
        if($user){
          if(password_verify($post['password'],$user->password)){
          $params = ['id_user'=> $user->id_pelanggan];
          session()->set($params);
          return redirect()->to(site_url('/'));
        }else{
          return redirect()->back()->with('error','Password Salah');
        }
        }else{
        return redirect()->back()->with('error','Username Tidak Ditemukan');
        }
      }

      public function register(){
        $data['validation'] = session()->get('validation');
        return view('user/register',$data);
      }

      public function userRegisterProcess()
      {
        if(!$this->validate([
          'nama' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama anda harus diisi.',
              ]
            ],
            'alamat' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Alamat anda harus diisi',
              ],
            ],
            'no_telp' => [
              'rules' => 'required|is_natural',
              'errors' => [
                  'required' => 'No.Telp anda harus diisi',
                  'is_natural' => 'No.Telp tidak valid'
              ],
            ],
            'email' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Email anda harus diisi',
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
        ])){
          $validation =  ['errors' => $this->validator->getErrors()];
          return redirect()->to('/register')->withInput()->with('validation',$validation);
        }
        $post = $this->request->getPost();
        $data = [
          'nama_pelanggan' => $post['nama'],
          'no_telp' => $post['no_telp'],
          'alamat_pelanggan' => $post['alamat'],
          'email' => $post['email'],
          'password' => password_hash($post['password'],PASSWORD_BCRYPT),
      ];
        $this->pelangganModel->save($data);
        return redirect()->to(site_url('/login'))->with('success','Register Berhasil Silahkan Login');
      }

      public function laundrySatuan(){
        $id = session()->get('id_user');
        $model = $this->pelangganModel->find($id);
        $keyword = $model->nama_pelanggan;
        $data['transaksi'] = $this->transaksiSatuanModel->getSearchDocument($keyword);
        return view('user/laundry-satuan',$data);
      }
      
      public function laundryKiloan(){
        $id = session()->get('id_user');
        $model = $this->pelangganModel->find($id);
        $keyword = $model->nama_pelanggan;
        $data['transaksi'] = $this->transaksiKiloanModel->getSearchDocument($keyword);
        return view('user/laundry-kiloan',$data);
      }

      public function laundrySatuanProses()
      {
        $user_id = $this->request->getPost('id_user');
        $data = [
          'f_id_pelanggan' => $user_id,
          'f_id_kasir' => null,
          'f_id_cabang' => null,
          'tgl_pengambilan' => "0000-00-00",
          'tgl_transaksi' => date('y-m-d'),
          'status' => "proses",
        ];
        $this->transaksiSatuanModel->save($data);
        return redirect()->to(site_url('/laundry-satuan'));
      }
      public function laundryKiloanProses()
      {
        $user_id = $this->request->getPost('id_user');
        $data = [
          'f_id_pelanggan' => $user_id,
          'f_id_kasir' => null,
          'f_id_cabang' => null,
          'tgl_pengambilan' => "0000-00-00",
          'tgl_transaksi' => date('y-m-d'),
          'status' => "proses",
        ];
        $this->transaksiKiloanModel->save($data);
        return redirect()->to(site_url('/laundry-kiloan'));
      }

      public function detailSatuanProses($id_transaksi = null)
      {
        $transaksi = $this->transaksiSatuanModel->find($id_transaksi);
        if(!empty($transaksi)){
          $detail = $this->detailTransaksiSatuan->getDetailSatuan($id_transaksi);
          $baju = null;
          foreach ($detail as $key => $value) {
            $baju = $this->layananSatuanModel->getDataBasedId($value->id_layanan);
          }
          $data['details'] = $detail;
          $data['transaksi'] = $transaksi;
          $data['pelanggan'] = $this->pelangganModel->find(session()->get('id_user'));
          $data['baju'] = $baju;
          return view('user/detail-satuan',$data);
        }else{
          throw PageNotFoundException::forPageNotFound();
        }
      }
      public function detailKiloanProses($id_transaksi = null)
      {
        $transaksi  = $this->transaksiKiloanModel->find($id_transaksi);
        if(!empty($transaksi)){
          $detail = $this->detailTransaksiKiloan->getDetailKiloan($id_transaksi);
          $data['details'] = $detail;
          $data['transaksi'] = $transaksi;
          $data['pelanggan'] = $this->pelangganModel->find(session()->get('id_user'));
          return view('user/detail-kiloan',$data);
        }else{
          throw PageNotFoundException::forPageNotFound();
        }
      }

      public function getProfile()
      {
        $id_pelanggan = session()->get('id_user');
        $data['validation'] = session()->get('validation');
        $data['pelanggan'] = $this->pelangganModel->find($id_pelanggan);
        return view('user/profile',$data);
      }

      public function saveProfile()
      {
        $post = $this->request->getPost();
        if($post['prev_pass'] == $post['password']){
          $validate = [
            'nama_pelanggan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama anda harus diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon anda harus diisi',
                    'is_natural' => 'No Telpon tidak valid'
                ],
              ],
              'alamat_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat anda harus diisi',
                ],
              ],
              'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ],
              ],
            ];
        }else{
          $validate = [
            'nama_pelanggan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama anda harus diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|decimal',
                'errors' => [
                    'required' => 'No telepon anda harus diisi',
                    'decimal' => 'No Telpon harus berupa angka'
                ],
              ],
              'alamat_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat anda harus diisi',
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
          ];
        }
        if(!$this->validate($validate)){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/profile')->withInput()->with('validation',$validation);
        }
        if($post['prev_pass'] == $post['password']){
            $data = [
                'id_pelanggan' => $post['id_pelanggan'],
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp' => $this->request->getPost('no_telp'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            ];
        }else{
            $data = [
                'id_pelanggan' => $post['id_pelanggan'],
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp' => $this->request->getPost('no_telp'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'password' => password_hash($post['password'],PASSWORD_BCRYPT),
            ];
        }
        $this->pelangganModel->save($data);
        return redirect()->to(site_url('/profile'))->with('success','Data anda berhasil diubah.');
      }

      public function exportKiloan()
      {
        $id_transaksi = $this->request->getPost('id_transaksi');
        $transaksi = $this->transaksiKiloanModel->find($id_transaksi);
        $detail = $this->detailTransaksiKiloan->getDetailKiloan($id_transaksi);
        $data['transaksi'] = $transaksi;
        $data['details'] = $detail;
        $data['pelanggan'] = $this->pelangganModel->find(session()->get('id_user'));
        return view('user/export-kiloan',$data);
      }

      public function exportSatuan()
      {
        $id_transaksi = $this->request->getPost('id_transaksi');
        $transaksi = $this->transaksiSatuanModel->find($id_transaksi);
        $detail = $this->detailTransaksiSatuan->getDetailSatuan($id_transaksi);
        $baju = null;
        foreach ($detail as $key => $value) {
            $baju = $this->layananSatuanModel->getDataBasedId($value->id_layanan);
        }
        $data['transaksi'] = $transaksi;
        $data['pelanggan'] = $this->pelangganModel->find(session()->get('id_user'));
        $data['details'] = $detail;
        $data['baju'] = $baju;
        return view('user/export-satuan',$data);

      }

      public function logout(){
        session()->remove('id_user');
        return redirect()->to(site_url('/login'));
      }
  }
?>