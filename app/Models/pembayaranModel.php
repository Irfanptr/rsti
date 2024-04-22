<?php

namespace App\Models;
use CodeIgniter\Model;

class pembayaranModel extends Model
{
    protected $table            = 'pembayaran';
    protected $primaryKey       = 'id_pembayaran';
    protected $returnType       = 'object';
    protected $allowedField     = ['metode'];
    protected $useTimestamps    = true;
    protected $useSoftDeletes   = false;
}