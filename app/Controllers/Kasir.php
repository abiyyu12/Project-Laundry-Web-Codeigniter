<?php

namespace App\Controllers;

use App\Models\KasirModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Kasir extends BaseController
{
    private $kasirModel;
    public function __construct()
    {
        $this->kasirModel = new KasirModel();
    }
    public function index()
    {
        $data['kasir'] = $this->kasirModel->findAll();
        return view('admin/kasir/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/kasir/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'nama_kasir' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama kasir wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No telepon wajib diisi',
                ],
              ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/kasir/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'nama_kasir' => $this->request->getPost('nama_kasir'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->kasirModel->save($data);
        return redirect()->to(site_url('admin/kasir'))->with('success','Data kasir berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $kasir = $this->kasirModel->find($id);
            if(!empty($kasir)){    
            $data = [
                'validation' => session()->get('validation'),
                'kasir' => $this->kasirModel->find($id),
            ];
            return view('admin/kasir/edit',$data);
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
        $id_kasir = $this->request->getPost('id_kasir');
        if(!$this->validate([
            'nama_kasir' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama Kasir harus diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'No Telepon harus diisi',
                ],
              ]
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/kasir/'.$id_kasir.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_kasir' => $id_kasir,
            'nama_kasir' => $this->request->getPost('nama_kasir'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat' => $this->request->getPost('alamat'),
        ];
        $this->kasirModel->save($data);
        return redirect()->to(site_url('admin/kasir'))->with('success','Data Kasir Berhasil Diubah');
    }

    public function delete($id = null)
    {
        $this->kasirModel->delete($id);
        return redirect()->to(site_url('admin/kasir'))->with('error','Data Berhasil Dihapus');
    }
}
