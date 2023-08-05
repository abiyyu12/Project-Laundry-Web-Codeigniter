<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pelanggan extends BaseController
{
    private $pelangganModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
    }
    public function index()
    {
        $data['pelanggan'] = $this->pelangganModel->findAll();
        return view('admin/pelanggan/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/pelanggan/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'nama_pelanggan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama pelanggan wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No Telepon wajib diisi',
                    'is_natural' => 'No telpon tidak valid'
                ],
              ],
              'alamat_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat pelanggan wajib diisi',
                ],
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/pelanggan/new')->withInput()->with('validation',$validation);
        }
        $post = $this->request->getPost();
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($post['password'],PASSWORD_BCRYPT),
        ];
        $this->pelangganModel->save($data);
        return redirect()->to(site_url('admin/pelanggan'))->with('success','Data pelanggan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
           $pelanggan =  $this->pelangganModel->find($id);
           if(!empty($pelanggan)){
            $data = [
                'validation' => session()->get('validation'),
                'pelanggan' => $this->pelangganModel->find($id),
            ];
            return view('admin/pelanggan/edit',$data);
           }else{
            throw PageNotFoundException::forPageNotFound();
           }
        }else{
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $post = $this->request->getPost();
        if(!$this->validate([
            'nama_pelanggan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama Pelanggan wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No Telepon wajib diisi',
                    'is_natural' => 'No telpon tidak valid'
                ],
              ],
              'alamat_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat Pelanggan wajib diisi',
                ],
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/pelanggan/'.$post['id_pelanggan'].'/edit')->withInput()->with('validation',$validation);
        }
        if($post['prev_pass'] == $post['password']){
            $data = [
                'id_pelanggan' => $post['id_pelanggan'],
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp' => $this->request->getPost('no_telp'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'email' => $this->request->getPost('email'),
            ];
        }else{
            $data = [
                'id_pelanggan' => $post['id_pelanggan'],
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'no_telp' => $this->request->getPost('no_telp'),
                'alamat_pelanggan' => $this->request->getPost('alamat_pelanggan'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($post['password'],PASSWORD_BCRYPT),
            ];
        }
        $this->pelangganModel->save($data);
        return redirect()->to(site_url('admin/pelanggan'))->with('success','Data pelanggan berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->pelangganModel->delete($id);
        return redirect()->to(site_url('admin/pelanggan'))->with('error','Data berhasil dihapus');
    }
}
