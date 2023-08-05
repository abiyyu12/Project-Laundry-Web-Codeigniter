<?php

namespace App\Controllers;

use App\Models\DetailKiloanModel;
use App\Models\LayananKiloanModel;
use App\Models\PegawaiModel;
use App\Models\TransaksiKiloanModel;
use App\Models\PelangganModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DetailKiloan extends BaseController
{
    private $pegawai;
    private $layananKiloan;
    private $detailModel;
    private $transaksiModel;
    private $pelangganModel;
    public function __construct()
    {
        $this->layananKiloan = new LayananKiloanModel();
        $this->detailModel = new DetailKiloanModel();
        $this->pegawai = new PegawaiModel();
        $this->transaksiModel = new TransaksiKiloanModel();
        $this->pelangganModel = new PelangganModel();
    }
    public function index($idTransaksi = null)
    {
      // dd($this->detailModel->getDetailSatuan($id));
      if($idTransaksi != null){
        $detailKiloan = $this->detailModel->getDetailKiloan($idTransaksi);
        $ttlHarga = 0;
        foreach ($detailKiloan as $key => $value) {
          $countHarga = $value->harga * $value->kg;
          $ttlHarga += $countHarga;
        }
        $updateTotalHarga = [
          'id_transaksi' => $idTransaksi,
          'total_harga' => $ttlHarga,
        ];
        $this->transaksiModel->save($updateTotalHarga);
        $data = [
            'id_transaksi' => $idTransaksi,
            'detail_kiloan' => $detailKiloan,
        ];
        return view('admin/detail-kiloan/index',$data);
      }else{
        throw PageNotFoundException::forPageNotFound();
      }
    }
    
    public function new($id_transaksi = null)
    {
        $data['validation'] = session()->get('validation');
        $data['pegawai'] = $this->pegawai->findAll();
        $data['layanan'] = $this->layananKiloan->findAll();
        $data['id_transaksi'] = $id_transaksi;
        return view('admin/detail-kiloan/create',$data);
    }
    
    public function create()
    {
        $idTransaksi = $this->request->getPost('id_transaksi');
        if(!$this->validate([
            'pegawai' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih pegawai terlebih dahulu',
                ]
              ],
            'layanan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih layanan terlebih dahulu',
                ]
              ],
            'kg' => [
                'rules' => 'required|is_natural_no_zero',
                'errors' => [
                    'required' => 'Berat cucian wajib Diisi',
                    'is_natural_no_zero' => 'Berat tidak boleh kurang atau sama dengan 0'
                  ]
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('admin/'.$idTransaksi.'/detail-kiloan/new')->withInput()->with('validation',$validation);
        }
        $data = [
            'f_id_transaksi' => $idTransaksi,
            'f_id_layanan' => $this->request->getPost('layanan'),
            'f_id_pegawai' => $this->request->getPost('pegawai'),
            'kg' => $this->request->getPost('kg'),
        ];
        $this->detailModel->save($data);
        return redirect()->to(site_url('admin/'.$idTransaksi.'/detail-kiloan'))->with('success','Data detail transaksi kiloan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $detailKiloan = $this->detailModel->find($id);
            if(!empty($detailKiloan)){
              $data['validation'] = session()->get('validation');
              $data['pegawai'] = $this->pegawai->findAll();
              $data['layanan_kiloan'] = $this->layananKiloan->findAll();
              $data['detail_kiloan'] = $detailKiloan;
              return view('admin/detail-kiloan/edit',$data);
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
      $id_detail = $this->request->getPost('id_detail');
      if(!$this->validate([
        'pegawai' => [
          'rules' => 'required',
          'errors' => [
              'required' => 'Pilih pegawai terlebih dahulu',
            ]
          ],
        'layanan' => [
          'rules' => 'required',
          'errors' => [
              'required' => 'Pilih layanan terlebih dahulu',
            ]
          ],
        'kg' => [
          'rules' => 'required|is_natural_no_zero',
          'errors' => [
              'required' => 'Berat cucian wajib Diisi',
              'is_natural_no_zero' => 'Berat tidak boleh kurang atau sama dengan 0'
            ]
          ],
        ])){
          $validation =  ['errors' => $this->validator->getErrors()];
          return redirect()->to('admin/detail-kiloan/'.$id_detail.'/edit')->withInput()->with('validation',$validation);
      }
      $data = [
          'id_detail' => $id_detail,
          'f_id_layanan' => $this->request->getPost('layanan'),
          'f_id_pegawai' => $this->request->getPost('pegawai'),
          'kg' => $this->request->getPost('kg'),
      ];
      $this->detailModel->save($data);
      $idTransaksi = $this->request->getPost('id_transaksi');
      return redirect()->to(site_url('admin/'.$idTransaksi.'/detail-kiloan'))->with('success','Data detail transaksi kiloan berhasil diubah');
    }

    public function export_pdf()
    {
      $id_transaksi = $this->request->getPost('id_transaksi');
      $transaksi = $this->transaksiModel->find($id_transaksi);
      $detailKiloan = $this->detailModel->getDetailKiloan($id_transaksi);
      $pelanggan = $this->pelangganModel->find($transaksi->f_id_pelanggan);
      $data = [
        'transaksi' => $transaksi,
        'details' => $detailKiloan,
        'pelanggan' => $pelanggan
      ];
      return view('user/export-kiloan',$data);
    }

    public function delete($id_detail = null)
    {
        $detail = $this->detailModel->find($id_detail);
        $this->detailModel->delete($id_detail);
        return redirect()->to(site_url('admin/'.$detail->f_id_transaksi.'/detail-kiloan'))->with('error','Data detail transaksi kiloan berhasil dihapus');
    }
}
