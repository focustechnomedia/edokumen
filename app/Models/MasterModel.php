<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{

    //Referensi Instansi
    public function getInstansi()
    {
        $builder = $this->db->table('ref_instansi');
        return $builder->get();
    }
    public function saveInstansi($data)
    {
        $query = $this->db->table('ref_instansi')->insert($data);
        return $query;
    }
    public function updateInstansi($data, $id)
    {
        $query = $this->db->table('ref_instansi')->update($data, array('instansi_id' => $id));
        return $query;
    }
    //Referensi Bidang
    public function getBidang()
    {
        $builder = $this->db->table('ref_bidang');
        return $builder;
    }
    public function jumlahData()
    {
        return $this->db->table('ref_bidang')->countAllResults();
    }
    public function saveBidang($data)
    {
        $query = $this->db->table('ref_bidang')->insert($data);
        return $query;
    }
    public function updateBidang($data, $id)
    {
        $query = $this->db->table('ref_bidang')->update($data, array('bidang_id' => $id));
        return $query;
    }
    public function deleteBidang($id)
    {
        $query = $this->db->table('ref_bidang')->delete(array('bidang_id' => $id));
        return $query;
    }
}
