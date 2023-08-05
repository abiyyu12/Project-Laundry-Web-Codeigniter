<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table            = 'pegawai';
    protected $primaryKey       = 'id_pegawai';
    protected $returnType       = 'object';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_pegawai','no_telp','alamat'];
}
