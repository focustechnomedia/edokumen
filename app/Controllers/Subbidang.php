<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SubbidangModel;
use App\Models\BidangModel;

class Subbidang extends BaseController
{
    public function index()
    {
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        $subModel = new SubbidangModel();

        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data = $subModel->searchData($keyword);
        } else {
            $data = $subModel->select('ref_subbidang.*,ref_bidang.bidang')
                ->join('ref_bidang', 'ref_subbidang.bidang_id=ref_bidang.bidang_id', 'left');
        }
        $rc = $subModel->countAllResults(false);

        $load = [
            'title' => 'Master Sub Bidang',
            'data' => $data->paginate(20, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('/content/subbidang_view', $load);
    }
    //--------------------------------------
    public function form($id = null)
    {
        $bdModel = new BidangModel();
        $dtbidang = $bdModel->findAll();

        if (!empty($id)) {
            $subModel = new SubbidangModel();
            $res = $subModel->find($id);

            $load = [
                'title' => 'Master Sub Bidang',
                'id' => $id,
                'bidang_id' => $res['bidang_id'],
                'subbidang' => $res['subbidang'],
                'dtbidang' => $dtbidang
            ];
        } else {
            $load = [
                'title' => 'Master Sub Bidang',
                'dtbidang' => $dtbidang
            ];
        }
        return view('/content/subbidang_form_view', $load);
    }
    //-----------------------------------------
    public function simpan()
    {
        $subModel = new SubbidangModel();
        $id = $this->request->getVar('id');
        $bidang_id = $this->request->getVar('bidang_id');
        $subbidang = $this->request->getVar('subbidang');
        if (!empty($id)) {
            $data = [
                'subbidang_id' => $id,
                'bidang_id' => $bidang_id,
                'subbidang' => $subbidang,
            ];
        } else {
            $data = [
                'bidang_id' => $bidang_id,
                'subbidang' => $subbidang,
            ];
        }

        $subModel->save($data);

        return redirect()->to(site_url('/subbidang'));
    }
    //--------------------------------
    public function hapus($id)
    {
        $subModel = new SubbidangModel();
        $res = $subModel->delete($id);
        return redirect()->to(site_url('/subbidang'));
    }
}
