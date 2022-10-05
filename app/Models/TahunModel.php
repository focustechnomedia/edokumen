<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_tahun';
    protected $primaryKey       = 'tahun_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['tahun'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function searchData($key)
    {
        return $this->table('ref_tahun')->like('tahun', $key);
    }
}
