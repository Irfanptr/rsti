<?php

namespace App\Models;
use CodeIgniter\Model;

class dokterModel extends Model
{
    protected $table            = 'dokter';
    protected $primaryKey       = 'id_dokter';
    protected $returnType       = 'object';
    protected $allowedField     = ['nama_dokter', 'alamat', 'nohp', 'spesialis'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function add($data)
{
    $this->db->table('dokter')->insert($data);
}   
}

