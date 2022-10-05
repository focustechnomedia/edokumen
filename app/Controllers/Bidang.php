<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidangModel;

class Bidang extends BaseController
{
    public function index()
    {
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        $bdModel = new BidangModel();
        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');


        if ($keyword) {
            $data = $bdModel->searchData($keyword);
        } else {
            $data = $bdModel;
        }
        $rc = $bdModel->countAllResults(false);

        $load = [
            'title' => 'Master Bidang',
            'data' => $data->paginate(10, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('/content/bidang_view', $load);
    }
    public function form($id = null)
    {
        if (!empty($id)) {
            $bdModel = new BidangModel();
            $res = $bdModel->find($id);
            //dd($res);
            $load = [
                'id' => $res['bidang_id'],
                'bidang' => $res['bidang']
            ];
        } else {
            $load = [];
        }
        return view('/content/bidang_form_view', $load);
    }
    public function simpan()
    {
        $bdModel = new BidangModel();
        $id = $this->request->getVar('id');
        $bidang = $this->request->getVar('bidang');
        if (!empty($id)) {
            $data = [
                'bidang_id' => $id,
                'bidang' => $bidang,
            ];
        } else {
            $data = [
                'bidang' => $bidang
            ];
        }

        $bdModel->save($data);

        return redirect()->to(site_url('/bidang'));
    }

    public function hapus($id)
    {
        $bdModel = new BidangModel();
        $res = $bdModel->delete($id);
        return redirect()->to(site_url('/bidang'));
    }
}
