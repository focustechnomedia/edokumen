<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'dokumen';
    protected $primaryKey       = 'dokumen_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['bidang_id', 'subbidang_id', 'klasifikasi_id', 'kode_dokumen', 'nama_dokumen', 'nama_file', 'share_to'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    public function coreQuery()
    {
        $this->select('dokumen.*,b.bidang,c.subbidang,d.kode_klasifikasi,d.klasifikasi')
            ->join('ref_bidang b', 'dokumen.bidang_id=b.bidang_id', 'left')
            ->join('ref_subbidang c', 'dokumen.subbidang_id=c.subbidang_id', 'left')
            ->join('ref_klasifikasi d', 'dokumen.klasifikasi_id=d.klasifikasi_id', 'left');

        return $this; // This will allow the call chain to be used.
        //Berikan ->get() untuk menampilkan getLastQuery()

    }

    public function searcData($key)
    {
        $this->like('dokumen.nama_dokumen', $key)
            ->orLike('b.bidang', $key)
            ->orLike('c.subbidang', $key)
            ->orLike('d.kode_klasifikasi', $key)
            ->orLike('d.klasifikasi', $key);

        return $this; // This will allow the call chain to be used.
        //Berikan ->get() untuk menampilkan getLastQuery()
        //$this berlaku global, sehingga method searchData hanya tingal melakukan chaining dari this yang pernah di definiskan sebelumnya
    }
}
