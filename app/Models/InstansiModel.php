<?php

namespace App\Models;

use CodeIgniter\Model;
use SebastianBergmann\Type\TrueType;

class InstansiModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ref_instansi';
    protected $primaryKey       = 'instansi_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['instansi', 'daerah', 'alamat'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
