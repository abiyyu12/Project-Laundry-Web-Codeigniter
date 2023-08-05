<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananKiloanModel extends Model
{
    protected $table            = 'layanan_kiloan';
    protected $primaryKey       = 'id_layanan';
    protected $returnType       = 'object';
    protected $allowedFields    = ["nama_layanan","harga"];
}
