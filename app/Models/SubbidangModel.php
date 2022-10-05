<?php

namespace App\Models;

use CodeIgniter\Model;

class SubbidangModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_subbidang';
    protected $primaryKey       = 'subbidang_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['bidang_id', 'subbidang'];

    public function searchData($key)
    {
        $this->table('ref_subbidang')
            ->select('ref_subbidang.*,ref_bidang.bidang')
            ->join('ref_bidang', 'ref_subbidang.bidang_id=ref_bidang.bidang_id', 'left')
            ->like('subbidang', $key)
            ->orLike('bidang', $key);
        return $this;
    }
}
