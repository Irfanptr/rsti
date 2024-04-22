<?php

namespace App\Models;
use CodeIgniter\Model;

class poliModel extends Model
{
    protected $table            = 'tb_poli';
    protected $primaryKey       = 'id_poli';
    protected $returnType       = 'object';
    protected $allowedField     = ['id_dokter', 'gedung', 'nama_poli'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;


    public function getDataJoin()
    {
        $query = $this->db->table('tb_poli');
        $query->join('dokter', 'dokter.id_dokter = tb_poli.id_dokter');
        $get = $query->get();
        return $get->getResult();
    }

    public function innerJoin($poliId)
    {
    $query = $this->select('tb_poli.*, dokter.nama_dokter, dokter.spesialis') 
                  ->join('dokter', 'dokter.id_dokter = tb_poli.id_dokter') 
                  ->where('tb_poli.id_poli', $poliId) 
                  ->get();
    return $query->getRow(); 
    }

    public function add($data)
    {
        $this->db->table('tb_poli')->insert($data);
    }   
    
}
