<?php

namespace App\Models;
use CodeIgniter\Model;

class countModel extends Model
{
    public function dataPasien()
    {
        return $this->db->table('tb_pasien')->countAll();
    }   
    public function dataDokter()
    {
        return $this->db->table('dokter')->countAll();
    }   
    public function dataPoli()
    {
        return $this->db->table('tb_poli')->countAll();
    }   
}