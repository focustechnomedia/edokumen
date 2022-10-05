<?php

namespace App\Models;

use CodeIgniter\Model;

class KlasifikasiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_klasifikasi';
    protected $primaryKey       = 'klasifikasi_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['kode_klasifikasi', 'klasifikasi'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function listData()
    {
        $this->select('*')
            ->orderBy('kode_klasifikasi', 'ASC');

        return $this;
    }
}
