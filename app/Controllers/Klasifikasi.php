<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KlasifikasiModel;

class Klasifikasi extends BaseController
{
    public function index()
    {
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        $klModel = new KlasifikasiModel();
        $klModel = $klModel->listData();

        $rc = $klModel->countAllResults(false);

        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data = $klModel->searchData($keyword);
        } else {
            $data = $klModel;
        }

        $load = [
            'title' => 'Master Klasifikasi Dokumen',
            'data' => $data->paginate(40, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('/content/klasifikasi_view', $load);
    }
    public function form($id = null)
    {
        if (!empty($id)) {
            $klModel = new KlasifikasiModel();
            $res = $klModel->find($id);
            //dd($res);
            $load = [
                'title' => 'Master klasifikasi Dokumen',
                'id' => $res['klasifikasi_id'],
                'kode_klasifikasi'  => $res['kode_klasifikasi'],
                'klasifikasi' => $res['klasifikasi']
            ];
        } else {
            $load = [
                'title' => 'Master klasifikasi Dokumen'
            ];
        }
        return view('/content/klasifikasi_form_view', $load);
    }
    public function simpan()
    {
        $klModel = new KlasifikasiModel();
        $id = $this->request->getVar('id');
        $kode_klasifikasi = $this->request->getVar('kode_klasifikasi');
        $klasifikasi = $this->request->getVar('klasifikasi');
        if (!empty($id)) {
            $data = [
                'klasifikasi_id' => $id,
                'kode_klasifikasi'  => $kode_klasifikasi,
                'klasifikasi' => $klasifikasi,
            ];
        } else {
            $data = [
                'kode_klasifikasi'  => $kode_klasifikasi,
                'klasifikasi' => $klasifikasi
            ];
        }

        $klModel->save($data);

        return redirect()->to(site_url('/klasifikasi'));
    }

    public function hapus($id)
    {
        $klModel = new KlasifikasiModel();
        $res = $klModel->delete($id);
        return redirect()->to(site_url('/klasifikasi'));
    }
}
