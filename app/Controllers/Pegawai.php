<?php

namespace App\Controllers;
use App\Models\PegawaiModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Pegawai extends BaseController
{
    private $pegawaiModel;
    public function __construct()
    {
        $this->pegawaiModel = new PegawaiModel();
    }
    public function index()
    {
        $data['pegawai'] = $this->pegawaiModel->findAll();
        return view('admin/pegawai/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/pegawai/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'nama_pegawai' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama kasir wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon harus diisi',
                    'is_natural' => 'No telepon tidak valid'
                ],
              ],
              'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                ],
              ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/pegawai/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->pegawaiModel->save($data);
        return redirect()->to(site_url('admin/pegawai'))->with('success','Data pegawai berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
          $pegawai = $this->pegawaiModel->find($id);
          if(!empty($pegawai)){
            $data = [
              'validation' => session()->get('validation'),
              'pegawai' => $pegawai,
            ];
            return view('admin/pegawai/edit',$data);
          }else{
              throw PageNotFoundException::forPageNotFound();
          }
        }
        else{
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id_kasir = $this->request->getPost('id_pegawai');
        if(!$this->validate([
            'nama_pegawai' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama kasir harus diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon harus diisi',
                    'is_natural' => 'No telepon tidak valid'
                ],
              ],
              'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat wajib diisi',
                ],
              ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/pegawai/'.$id_kasir.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_pegawai' => $id_kasir,
            'nama_pegawai' => $this->request->getPost('nama_pegawai'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->pegawaiModel->save($data);
        return redirect()->to(site_url('admin/pegawai'))->with('success','Data pegawai berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->pegawaiModel->delete($id);
        return redirect()->to(site_url('admin/pegawai'))->with('error','Data berhasil dihapus');
    }
}
