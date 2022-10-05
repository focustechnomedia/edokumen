<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_pengguna';
    protected $primaryKey       = 'pengguna_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['role_id', 'username', 'password', 'aktif', 'foto', 'ext', 'verifikasi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function loginCek($us, $pw)
    {
        $this->
    }

    public function searchData($key)
    {
        return $this->table('pengguna')->like('username', $key);
    }
}
