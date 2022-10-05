<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_bidang';
    protected $primaryKey       = 'bidang_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['bidang'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function searchData($key)
    {
        return $this->table('ref_bidang')->like('bidang', $key);
    }
}
