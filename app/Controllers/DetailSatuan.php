<?php

namespace App\Controllers;

use App\Models\DetailSatuanModel;
use App\Models\LayananSatuanModel;
use App\Models\PegawaiModel;
use App\Models\TransaksiSatuanModel;
use App\Models\BarangModel;
use App\Models\PelangganModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class DetailSatuan extends BaseController
{
    private $pegawai;
    private $layananSatuan;
    private $detailModel;
    private $transaksiModel;
    private $barangModel;
    private $pelanggan;
    public function __construct()
    {
        $this->layananSatuan = new LayananSatuanModel();
        $this->detailModel = new DetailSatuanModel();
        $this->pegawai = new PegawaiModel();
        $this->transaksiModel = new TransaksiSatuanModel();
        $this->barangModel = new BarangModel();
        $this->pelanggan = new PelangganModel();
    }
    public function index($idTransaksi = null)
    {
      // dd($this->detailModel->getDetailSatuan($id));
      if($idTransaksi != null){
        $detailSatuan = $this->detailModel->getDetailSatuan($idTransaksi);
        $ttlHarga = 0;
        foreach ($detailSatuan as $key => $value) {
          $countHarga = $value->harga * $value->jml_barang;
          $ttlHarga += $countHarga;
        }
        $updateTotalHarga = [
          'id_transaksi' => $idTransaksi,
          'total_harga' => $ttlHarga,
        ];
        $this->transaksiModel->save($updateTotalHarga);
        $data = [
            'id_transaksi' => $idTransaksi,
            'detail_satuan' => $detailSatuan,
        ];
        return view('admin/detail-satuan/index',$data);
      }else{
        throw PageNotFoundException::forPageNotFound();
      }
    }
    
    public function new($id_transaksi = null)
    {
        $data['validation'] = session()->get('validation');
        $data['barang'] = $this->barangModel->findAll();
        $data['pegawai'] = $this->pegawai->findAll();
        $data['id_transaksi'] = $id_transaksi;
        return view('admin/detail-satuan/create',$data);
    }
    
    public function create()
    {
        $layanan = $this->layananSatuan->isMatches($this->request->getPost('barang'),$this->request->getPost('layanan'));
        $idTransaksi = $this->request->getPost('id_transaksi');
        if(!$this->validate([
            'pegawai' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih pegawai terlebih dahulu',
                ]
              ],
            'barang' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih barang terlebih dahulu',
                ]
              ],
            'layanan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih layanan terlebih dahulu',
                ]
              ],
            'jml_barang' => [
              'rules' => 'required|is_natural_no_zero',
              'errors' => [
                  'required' => 'Jumlah barang wajib diisi',
                  'is_natural_no_zero' => 'Jumlah barang tidak boleh kurang dari 1'
                ]
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('admin/'.$idTransaksi.'/detail-satuan/new')->withInput()->with('validation',$validation);
        }
        if(empty($layanan)){
          $validation =  ['error' => 'Barang atau Layanan yang anda minta tidak tersedia'];
          return redirect()->to('admin/'.$idTransaksi.'/detail-satuan/new')->withInput()->with('validation',$validation);
        }
        foreach ($layanan as $key => $value) {
          $idLayanan = $value->id_layanan;
        }
        $data = [
            'f_id_transaksi' => $idTransaksi,
            'f_id_layanan' => $idLayanan,
            'f_id_pegawai' => $this->request->getPost('pegawai'),
            'jml_barang' => $this->request->getPost('jml_barang'),
        ];
        $this->detailModel->save($data);
        return redirect()->to(site_url('admin/'.$idTransaksi.'/detail-satuan'))->with('success','Data detail transaksi satuan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $detailSatuan = $this->detailModel->find($id);
            if(!empty($detailSatuan)){
              $data['validation'] = session()->get('validation');
              $data['barang'] = $this->barangModel->findAll();
              $data['pegawai'] = $this->pegawai->findAll();
              $data['layanan_satuan'] = $this->layananSatuan->find($detailSatuan->f_id_layanan);
              $data['detail_satuan'] = $detailSatuan;
              return view('admin/detail-satuan/edit',$data);
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
      $layanan = $this->layananSatuan->isMatches($this->request->getPost('barang'),$this->request->getPost('layanan'));
      $id_detail = $this->request->getPost('id_detail');
      if(!$this->validate([
          'pegawai' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih pegawai terlebih dahulu',
              ]
            ],
          'barang' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih barang terlebih dahulu',
              ]
            ],
          'layanan' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Pilih layanan terlebih dahulu',
              ]
            ],
          'jml_barang' => [
              'rules' => 'required|is_natural_no_zero',
              'errors' => [
                  'required' => 'Jumlah barang wajib diisi',
                  'is_natural_no_zero' => 'Jumlah barang tidak boleh kurang dari 1'
                ]
            ],
        ])){
          $validation =  ['errors' => $this->validator->getErrors()];
          return redirect()->to('admin/detail-satuan/'.$id_detail.'/edit')->withInput()->with('validation',$validation);
      }
      if(empty($layanan)){
        $validation =  ['error' => 'Barang atau Layanan yang anda minta tidak tersedia'];
        return redirect()->to('admin/detail-satuan/'.$id_detail.'/edit')->withInput()->with('validation',$validation);
      }
      foreach ($layanan as $key => $value) {
        $idLayanan = $value->id_layanan;
      }
      $data = [
          'id_detail' => $id_detail,
          'f_id_layanan' => $idLayanan,
          'f_id_pegawai' => $this->request->getPost('pegawai'),
          'jml_barang' => $this->request->getPost('jml_barang'),
      ];
      $this->detailModel->save($data);
      $idTransaksi = $this->request->getPost('id_transaksi');
      return redirect()->to(site_url('admin/'.$idTransaksi.'/detail-satuan'))->with('success','Data detail transaksi satuan berhasil diubah');
    }

    public function export_pdf()
    {
      $id_transaksi = $this->request->getPost('id_transaksi');
      $transaksi = $this->transaksiModel->find($id_transaksi);
      $detail = $this->detailModel->getDetailSatuan($id_transaksi);
      $baju = null;
      foreach ($detail as $key => $value) {
          $baju = $this->layananSatuan->getDataBasedId($value->id_layanan);
      }
      $data['transaksi'] = $transaksi;
      $data['pelanggan'] = $this->pelanggan->find($transaksi->f_id_pelanggan);
      $data['details'] = $detail;
      $data['baju'] = $baju;
      return view('user/export-satuan',$data);

    }

    public function delete($id_detail = null)
    {
        $detail = $this->detailModel->find($id_detail);
        $this->detailModel->delete($id_detail);
        return redirect()->to(site_url('admin/'.$detail->f_id_transaksi.'/detail-satuan'))->with('error','Data detail transaksi satuan berhasil dihapus');
    }
}
