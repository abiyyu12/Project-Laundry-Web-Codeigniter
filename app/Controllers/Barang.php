<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Barang extends BaseController
{
    private $barangModel;
    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }
    public function index()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('admin/barang/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/barang/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'nama_barang' => [
              'rules' => 'required|is_unique[barang.nama_barang]|alpha_space',
              'errors' => [
                  'required' => 'Nama barang wajib diisi.',
                  'is_unique' => "Nama barang sudah dibuat sebelumnya.",
                  'alpha_space' => "Nama barang hanya bisa diisi oleh huruf"
                ]
              ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/barang/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
        ];
        $this->barangModel->save($data);
        return redirect()->to(site_url('admin/barang'))->with('success','Data barang berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $cabang = $this->barangModel->find($id);
            if(!empty($cabang)){    
            $data = [
                'validation' => session()->get('validation'),
                'barang' => $this->barangModel->find($id),
            ];
            return view('admin/barang/edit',$data);
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
        $id_barang = $this->request->getPost('id_barang');
        if(!$this->validate([
          'nama_barang' => [
            'rules' => 'required|is_unique[barang.nama_barang]|alpha_space',
            'errors' => [
                'required' => 'Nama barang wajib diisi.',
                'is_unique' => "Nama barang sudah dibuat sebelumnya.",
                'alpha_space' => "Nama barang hanya bisa diisi oleh huruf"
              ]
            ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/barang/'.$id_barang.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_barang' => $id_barang,
            'nama_barang' => $this->request->getPost('nama_barang'),
        ];
        $this->barangModel->save($data);
        return redirect()->to(site_url('admin/barang'))->with('success','Data barang berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->barangModel->delete($id);
        return redirect()->to(site_url('admin/barang'))->with('error','Data berhasil dihapus');
    }
}
