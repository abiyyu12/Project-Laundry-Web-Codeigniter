<?php

namespace App\Models;

use CodeIgniter\Model;

class KasirModel extends Model
{
    protected $table            = 'kasir';
    protected $primaryKey       = 'id_kasir';
    protected $returnType       = 'object';
    protected $allowedFields    = ['nama_kasir','no_telp','alamat'];
}
