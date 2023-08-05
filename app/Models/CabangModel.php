<?php

namespace App\Models;

use CodeIgniter\Model;

class CabangModel extends Model
{
    protected $table            = 'cabang';
    protected $primaryKey       = 'id_cabang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_pemilik','no_telp','alamat_cabang'];
}
