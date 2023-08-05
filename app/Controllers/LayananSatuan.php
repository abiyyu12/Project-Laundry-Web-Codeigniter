<?php

namespace App\Controllers;

use App\Models\LayananSatuanModel;
use App\Models\BarangModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class LayananSatuan extends BaseController
{
    private $lsModel;
    private $barangModel;
    public function __construct()
    {
        $this->lsModel = new LayananSatuanModel();
        $this->barangModel = new BarangModel();
    }
    public function index()
    {
      // dd($this->lsModel->getAllData());
      $data['layanan_satuan'] = $this->lsModel->getAllData();
      return view('admin/layanan-satuan/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        $data['barang'] = $this->barangModel->findAll();
        return view('admin/layanan-satuan/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'id_barang' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih barang terlebih dahulu.',
                ]
              ],
            'layanan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih layanan terlebih dahulu.',
                ]
              ],
            'harga' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Harga wajib diisi.',
                ]
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/layanan-satuan/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'f_id_barang' => $this->request->getPost('id_barang'),
            'layanan' => $this->request->getPost('layanan'),
            'harga' => $this->request->getPost('harga'),
        ];
        $this->lsModel->save($data);
        return redirect()->to(site_url('admin/layanan-satuan'))->with('success','Data layanan satuan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $layananSatuan = $this->lsModel->find($id);
            if(!empty($layananSatuan)){    
            $data = [
                'validation' => session()->get('validation'),
                'layanan_satuan' => $this->lsModel->find($id),
                'barang' => $this->barangModel->findAll(),
            ];
            return view('admin/layanan-satuan/edit',$data);
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
            'id_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih barang terlebih dahulu.',
                  ]
                ],
            'layanan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih layanan terlebih dahulu.',
                  ]
            ],
            'harga' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga wajib diisi.',
                  ]
            ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/layanan-satuan/'.$id_layanan.'/edit')->withInput()->with('validation',$validation);
        }
        $data = [
            'id_layanan' => $id_layanan,
            'f_id_barang' => $this->request->getPost('id_barang'),
            'layanan' => $this->request->getPost('layanan'),
            'harga' => $this->request->getPost('harga'),
        ];
        $this->lsModel->save($data);
        return redirect()->to(site_url('admin/layanan-satuan'))->with('success','Data layanan satuan berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->lsModel->delete($id);
        return redirect()->to(site_url('admin/layanan-satuan'))->with('error','Data berhasil dihapus');
    }
}
