<?php

namespace App\Controllers;

use App\Models\PelangganModel;
use App\Models\CabangModel;
use App\Models\AdminModel;
use App\Models\TransaksiSatuanModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class TransaksiSatuan extends BaseController
{
    private $adminModel;
    private $cabangModel;
    private $pelangganModel;
    private $transaksiModel;
    public function __construct()
    {
        $this->pelangganModel = new PelangganModel();
        $this->cabangModel = new CabangModel();
        $this->adminModel = new AdminModel();
        $this->transaksiModel = new TransaksiSatuanModel();
    }
    public function index()
    {
      // dd($this->transaksiModel->findAll());
      $keyword = $this->request->getGet('keyword');
      $tgl_transaksi = $this->request->getGet('f_tgl_transaksi');
      if($tgl_transaksi == ''){
        $data = $this->transaksiModel->getPaginate(10,$keyword);
      }else{
        $data = $this->transaksiModel->getPaginate(10,$tgl_transaksi);
      }
      $data['keyword'] = $keyword;
      $data['f_tgl_transaksi'] = $tgl_transaksi;
      return view('admin/transaksi-satuan/index',$data);
    }
    
    public function new()
    {
        $data['validation'] = session()->get('validation');
        $data['pelanggan'] = $this->pelangganModel->findAll();
        $data['cabang'] = $this->cabangModel->findAll();
        // $data['barang'] = $this->barangModel->findAll();
        return view('admin/Transaksi-Satuan/create',$data);
    }
    
    public function create()
    {
        if(!$this->validate([
            'id_pelanggan' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih nama pelanggan',
                ]
              ],
            'status' => [
              'rules' => 'required',
              'errors' => [
                  'required' => 'Pilih status transaksi',
                ]
              ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/transaksi-satuan/new')->withInput()->with('validation',$validation);
        }
        if($this->request->getPost('id_cabang') == 'pusat'){
          $id_cabang = null;
        }else{
          $id_cabang = $this->request->getPost('id_cabang');
        }
        $data = [
            'f_id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'f_id_admin' => session()->get('id_admin'),
            'f_id_cabang' => $id_cabang,
            'tgl_transaksi' => date('y-m-d'),
            'tgl_pengambilan' => $this->request->getPost('tgl_pengambilan'),
            'status' => $this->request->getPost('status'),
        ];
        $this->transaksiModel->save($data);
        return redirect()->to(site_url('admin/transaksi-satuan'))->with('success','Data transaksi satuan berhasil disimpan');
    }

    public function edit($id = null)
    {
        if($id != null){
            $transaksiSatuan = $this->transaksiModel->find($id);
            if(!empty($transaksiSatuan)){    
            $data = [
                'validation' => session()->get('validation'),
                'transaksi_satuan' => $this->transaksiModel->find($id)
            ];
            $data['pelanggan'] = $this->pelangganModel->findAll();
            $data['admin'] = $this->adminModel->findAll();
            $data['cabang'] = $this->cabangModel->findAll();
            return view('admin/transaksi-satuan/edit',$data);
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
        $id_transaksi = $this->request->getPost('id_transaksi');
        if(!$this->validate([
            'id_pelanggan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih nama pelanggan',
                  ]
                ],
              'status' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Pilih status transaksi',
                  ]
                ],
          ])){
            $validation =  ['errors' => $this->validator->getErrors()];
            return redirect()->to('/admin/transaksi-satuan/'.$id_transaksi.'/edit')->withInput()->with('validation',$validation);
        }
        if($this->request->getPost('id_cabang') == 'pusat'){
          $id_cabang = null;
        }else{
          $id_cabang = $this->request->getPost('id_cabang');
        }
        $status = $this->request->getPost('status');
        $admin = $this->request->getPost('id_admin');
        if($admin == "online"){
          $admin = null;
        }
        if($status == "selesai"){
            $data = [
                'id_transaksi' => $id_transaksi,
                'f_id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'f_id_admin' => $admin,
                'f_id_cabang' => $id_cabang,
                'tgl_pengambilan' => $this->request->getPost('tgl_pengambilan'),
                'tgl_selesai' => date('y-m-d'),
                'status' => $status,
            ];
        }else{
            $data = [
                'id_transaksi' => $id_transaksi,
                'f_id_pelanggan' => $this->request->getPost('id_pelanggan'),
                'f_id_admin' => $admin,
                'f_id_cabang' => $id_cabang,
                'tgl_pengambilan' => $this->request->getPost('tgl_pengambilan'),
                'tgl_selesai' => null,
                'status' => $status,
            ];
        }
        $this->transaksiModel->save($data);
        return redirect()->to(site_url('admin/transaksi-satuan'))->with('success','Data transaksi satuan berhasil diubah');
    }

    public function delete($id = null)
    {
        $this->transaksiModel->delete($id);
        return redirect()->to(site_url('admin/transaksi-satuan'))->with('error','Data berhasil dihapus');
    }

    public function export_excel(){
        $keyword = $this->request->getGet('keyword');
        $transaksi = $this->transaksiModel->getSearchDocument($keyword);
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();
        $activeWorksheet->setCellValue('A1', 'No');
        $activeWorksheet->setCellValue('B1', 'Pelanggan');
        $activeWorksheet->setCellValue('C1', 'Admin');
        $activeWorksheet->setCellValue('D1', 'Cabang');
        $activeWorksheet->setCellValue('E1', 'Tgl-Transaksi');
        $activeWorksheet->setCellValue('F1', 'Tgl-Pengambilan');
        $activeWorksheet->setCellValue('G1', 'Tgl-Selesai');
        $activeWorksheet->setCellValue('H1', 'Total-Harga');
        $activeWorksheet->setCellValue('I1', 'Status');
        $column = 2;
        foreach ($transaksi as $key => $value) {
            $activeWorksheet->setCellValue('A'.$column,($key+1));
            $activeWorksheet->setCellValue('B'.$column,$value->nama_pelanggan);
            if($value->nama_admin == null){
              $activeWorksheet->setCellValue('C'.$column,"Online");
            }else{
              $activeWorksheet->setCellValue('C'.$column,$value->nama_admin);
            }
            if($value->nama_pemilik == null){
              $activeWorksheet->setCellValue('D'.$column,"Pusat");
            }else{
              $activeWorksheet->setCellValue('D'.$column,$value->nama_pemilik);
            }
            $activeWorksheet->setCellValue('E'.$column,$value->tgl_transaksi);
            $activeWorksheet->setCellValue('F'.$column,$value->tgl_pengambilan);
            $activeWorksheet->setCellValue('G'.$column,$value->tgl_selesai);
            $activeWorksheet->setCellValue('H'.$column,$value->total_harga);
            $activeWorksheet->setCellValue('I'.$column,$value->status);
            $column++;
        }
        $activeWorksheet->getStyle('A1:I1')->getFont()->setBold(true);
        $activeWorksheet->getStyle('A1:I1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('FFFFFF00');
        
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => 'FF000000'],
                ]
            ]
        ];
        $activeWorksheet->getStyle('A1:I'.($column-1))->applyFromArray($styleArray);
        
        // Rapihin Sheet
        $activeWorksheet->getColumnDimension('A')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('B')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('C')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('D')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('E')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('F')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('G')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('H')->setAutoSize(true);
        $activeWorksheet->getColumnDimension('I')->setAutoSize(true);
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=Transaksi-Satuan.xlsx');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function export_pdf(){
      $keyword = $this->request->getGet('keyword');
      $data['TransaksiSatuan'] = $this->transaksiModel->getSearchDocument($keyword);
      $domPdf = new Dompdf();
      $html = view('admin/transaksi-satuan/print_pdf',$data);
      $domPdf->loadHtml($html);
      $domPdf->setPaper('A4','landscape');
      $domPdf->render();
      $domPdf->stream('Transaksi-Satuan.pdf',array('Attachment' => false));
    }
}
