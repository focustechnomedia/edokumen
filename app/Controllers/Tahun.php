<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TahunModel;

class Tahun extends BaseController
{
    public function index()
    {
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        $thnModel = new TahunModel();
        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');


        if ($keyword) {
            $data = $thnModel->searchData($keyword);
        } else {
            $data = $thnModel;
        }
        $rc = $thnModel->countAllResults(false);

        $load = [
            'title' => 'Seting Tahun',
            'data' => $data->paginate(20, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('/content/tahun_view', $load);
    }
    //-------------------------------
    public function form($id = null)
    {
        if (!empty($id)) {
            $thModel = new TahunModel();
            $res = $thModel->find($id);
            //dd($res);
            $load = [
                'title' => 'Master Tahun',
                'id' => $res['tahun_id'],
                'tahun' => $res['tahun']
            ];
        } else {
            $load = [
                'title' => 'Master tahun'
            ];
        }
        return view('/content/tahun_form_view', $load);
    }
    //----------------------------------
    public function simpan()
    {
        $thModel = new TahunModel();
        $id = $this->request->getVar('id');
        $tahun = $this->request->getVar('tahun');
        if (!empty($id)) {
            $data = [
                'tahun_id' => $id,
                'tahun' => $tahun,
            ];
        } else {
            $data = [
                'tahun' => $tahun
            ];
        }

        $thModel->save($data);

        return redirect()->to(site_url('/tahun'));
    }
    //--------------------------------------
    public function hapus($id)
    {
        $thModel = new TahunModel();
        $res = $thModel->delete($id);
        return redirect()->to(site_url('/tahun'));
    }
}
