<?php

namespace App\Controllers;

use App\Models\CabangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Cabang extends BaseController
{
    private $cabangModel;
    public function __construct()
    {
        $this->cabangModel = new CabangModel();
    }
    public function index()
    {
        $data['cabang'] = $this->cabangModel->findAll();
        return view('admin/cabang/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        return view('admin/cabang/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'nama_pemilik' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Nama pemilik wajib diisi.',
                ]
              ],
              'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon wajib diisi',
                    'is_natural' => 'No telpon tidak valid'
                ],
              ],
              'alamat_cabang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Alamat cabang wajib diisi',
                ],
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/cabang/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat_cabang' => $this->request->getPost('alamat_cabang'),
        ];
        $this->cabangModel->save($data);
        return redirect()->to(site_url('admin/cabang'))->with('success','Data cabang berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $cabang = $this->cabangModel->find($id);
            if(!empty($cabang)){    
            $data = [
                'validation' => session()->get('validation'),
                'cabang' => $this->cabangModel->find($id),
            ];
            return view('admin/cabang/edit',$data);
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
        $id_cabang = $this->request->getPost('id_cabang');
        if(!$this->validate([
          'nama_pemilik' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Nama pemilik wajib diisi.',
              ]
            ],
            'no_telp' => [
                'rules' => 'required|is_natural',
                'errors' => [
                    'required' => 'No telepon wajib diisi',
                    'is_natural' => 'No telpon tidak valid'
                ],
            ],
            'alamat_cabang' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Alamat cabang wajib diisi',
              ],
            ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/cabang/'.$id_cabang.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_cabang' => $id_cabang,
            'nama_pemilik' => $this->request->getPost('nama_pemilik'),
            'no_telp' => $this->request->getPost('no_telp'),
            'alamat_cabang' => $this->request->getPost('alamat_cabang'),
        ];
        $this->cabangModel->save($data);
        return redirect()->to(site_url('admin/cabang'))->with('success','Data cabang berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->cabangModel->delete($id);
        return redirect()->to(site_url('admin/cabang'))->with('error','Data berhasil dihapus');
    }
}
