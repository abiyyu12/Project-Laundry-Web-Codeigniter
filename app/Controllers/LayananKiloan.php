<?php

namespace App\Controllers;

use App\Models\LayananKiloanModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class LayananKiloan extends BaseController
{
    private $lkModel;
    public function __construct()
    {
        $this->lkModel = new LayananKiloanModel();
    }
    public function index()
    {
      // dd($this->lsModel->getAllData());
      $data['layanan_kiloan'] = $this->lkModel->findAll();
      return view('admin/layanan-kiloan/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/layanan-kiloan/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'harga' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Harga wajib diisi.',
                ]
              ],
            'nm_layanan' => [
              'rules' => 'required|is_unique[layanan_kiloan.nama_layanan]',
              'errors' => [
                  'required' => 'Nama layanan wajib diisi.',
                  'is_unique' => "Nama layanan sudah dibuat sebelumnya.",
                ]
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/layanan-kiloan/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'nama_layanan' => $this->request->getPost('nm_layanan'),
            'harga' => $this->request->getPost('harga'),
        ];
        $this->lkModel->save($data);
        return redirect()->to(site_url('admin/layanan-kiloan'))->with('success','Data layanan kiloan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $layananKiloan = $this->lkModel->find($id);
            if(!empty($layananKiloan)){    
            $data = [
                'validation' => session()->get('validation'),
                'layanan_kiloan' => $this->lkModel->find($id),
            ];
              return view('admin/layanan-kiloan/edit',$data);
            }
            else{
                throw PageNotFoundException::forPageNotFound();
            }
        }else{
            throw PageNotFoundException::forPageNotFound();
        }
    }

    public function update()
    {
        $id_layanan = $this->request->getPost('id_layanan');
        if(!$this->validate([
          'harga' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Harga wajib diisi.',
              ]
            ],
          'nm_layanan' => [
            'rules' => 'required|is_unique[layanan_kiloan.nama_layanan]',
            'errors' => [
                'required' => 'Nama layanan wajib diisi.',
                'is_unique' => "Nama layanan sudah dibuat sebelumnya."
              ]
            ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/layanan-kiloan/'.$id_layanan.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_layanan' => $id_layanan,
            'nama_layanan' => $this->request->getPost('nm_layanan'),
            'harga' => $this->request->getPost('harga'),
        ];
        $this->lkModel->save($data);
        return redirect()->to(site_url('admin/layanan-kiloan'))->with('success','Data layanan kiloan berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->lkModel->delete($id);
        return redirect()->to(site_url('admin/layanan-kiloan'))->with('error','Data berhasil dihapus');
    }
}
