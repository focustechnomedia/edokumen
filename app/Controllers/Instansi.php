<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InstansiModel;

class Instansi extends BaseController
{
    public function index()
    {
        $insModel = new InstansiModel();
        $data = $insModel->first();
        //dd($data);

        $load = [
            'title' => 'Setup Instansi',
            'v' => $data,
        ];

        return view('content/instansi_view', $load);
    }

    public function save($id = null)
    {
        $insModel = new InstansiModel();
        $q = $this->request->getPost();

        $savedata = [
            'instansi_id' => $id,
            'instansi' => $q['instansi'],
            'daerah' => $q['daerah'],
            'alamat' => $q['alamat']
        ];
        $insModel->save($savedata);
        return redirect()->to(site_url());
    }
}
