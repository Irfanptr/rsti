<?php

namespace App\Models;
use CodeIgniter\Model;

class pasienModel extends Model
{
    protected $table            = 'tb_pasien';
    protected $primaryKey       = 'pasienid';
    protected $returnType       = 'object';
    protected $allowedField     = ['id_pembayaran', 'jenis_kelamin', 'nama_pasien', 'alamat', 'nohp'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;

    public function join()
    {
        $query = $this->db->table('tb_pasien');
        $query->join('pembayaran', 'pembayaran.id_pembayaran = tb_pasien.id_pembayaran');
        $get = $query->get();
        return $get->getResult();
    }

    public function tambah($data)
    {
        $this->db->table('tb_pasien')->insert($data);
    }   

    public function edit($id, $data)
    {
        $this->db->table('tb_pasien')->where('pasienid', $id)->update($data);
    }   

    public function hapus($id)
    {
        $this->db->table('tb_pasien')->where('pasienid', $id)->delete();
    }   

}
