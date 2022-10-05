<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BidangModel;
use App\Models\DokumenModel;
use App\Models\KlasifikasiModel;
use App\Models\SubbidangModel;
use Config\Validation;
use PHPUnit\Framework\SelfDescribing;

class Dokumen extends BaseController
{
    public function index($id = null)
    {
        $dkModel = new DokumenModel();
        $bdModel = new BidangModel();
        $subModel = new SubbidangModel();
        $klaModel = new KlasifikasiModel();

        $bidang = $bdModel->findAll();
        foreach ($bidang as $v) {
            $bd[$v['bidang_id']] = $v['bidang'];
        }

        $subbidang = $subModel->findAll();
        foreach ($subbidang as $v) {
            $sb[$v['subbidang_id']] = $v['subbidang'];
        }
        $klas = $klaModel->findAll();
        foreach ($klas as $v) {
            $kl[$v['klasifikasi_id']] = $v['kode_klasifikasi'] . " - " . $v['klasifikasi'];
        }

        //--------------- jika edit --------------
        $dataedit = [];
        if (!empty($id)) {
            $result = $dkModel->find($id);
            $dataedit = [
                'dokumen_id' => $result['dokumen_id'],
                'bidang_id' => $result['bidang_id'],
                'subbidang_id' => $result['subbidang_id'],
                'klasifikasi_id' => $result['klasifikasi_id'],
                'nama_dokumen' => $result['nama_dokumen'],
            ];
            //dd($nama_dokumen);
        }

        $load = [
            'title' => 'Upload Dokumen',
            'bidang' => $bd,
            'subbidang' => $sb,
            'klasifikasi' => $kl,
            'dataedit' => $dataedit,
            'validation' => $this->validation,
        ];
        if (!empty($id)) {
            return view('content/dokumen_form_edit_view', $load);
        } else {
            return view('content/dokumen_form_view', $load);
        }
    }

    public function save()
    {
        $rule = [
            'nama_file' => [
                'rules' => 'uploaded[nama_file]|max_size[nama_file,4096]|mime_in[nama_file,application/pdf,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Anda belum memilih file untuk di upload',
                    'max_size' => 'Ukuran file terlalu besar, maximal 4MB',
                    'mime_in' => 'Type file tidak di ijinkan..'
                ]
            ],
            'nama_dokumen' => [
                'rules' => 'required|is_unique[dokumen.nama_dokumen]',
                'errors' => [
                    'required' => 'Nama dokumen harus di isi',
                    'is_unique' => 'Nama dokumen sudah ada, coba dengan nama yang lebih spesifik misal sertakan bulan atau tahun'
                ]
            ]
        ];

        if (!$this->validate($rule)) {
            return redirect()->to('/dokumen')->withInput();
        }

        $dokModel = new DokumenModel();
        $p = $this->request->getVar();

        $dataDok = $this->request->getFile('nama_file');

        $newName = $dataDok->getRandomName();
        $dataDok->move('uploads', $newName);

        $simpan = [
            'bidang_id' => $p['bidang_id'],
            'subbidang_id' => $p['subbidang_id'],
            'klasifikasi_id' => $p['klasifikasi_id'],
            'nama_dokumen' => $p['nama_dokumen'],
            'nama_file' => $newName
        ];
        $dokModel->save($simpan);
        return redirect()->to('/dokumen_view');
    }

    public function list()
    {
        $dkModel = new DokumenModel();
        $result = $dkModel->coreQuery();

        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        //Jika ada pencarian data
        $key = $this->request->getVar('key');

        if ($key) {
            $data = $dkModel->searcData($key);
            //dd($data);
        } else {
            $data = $result;
        }

        $rc = $result->countAllResults(false);
        //-------------------------------------------------------

        $load = [
            'title' => 'Data Dokumen',
            'data' => $data->paginate(20, 'datagroup'),
            'pager' => $result->pager,
            'page' => $page,
            'rc' => $rc,
            'key' => $key
        ];
        return view('content/dokumen_view', $load);
    }

    public function update()
    {
        $dokModel = new DokumenModel();
        $p = $this->request->getPost();
        //dd($p);
        $dataDok = $this->request->getFile('nama_file');

        $fileRule = [
            'nama_dokumen' => [
                'rules' => 'required|is_unique[dokumen.nama_dokumen]',
                'errors' => [
                    'required' => 'Nama dokumen harus di isi',
                    'is_unique' => 'Nama dokumen sudah ada, coba dengan nama yang lebih spesifik misal sertakan bulan atau tahun'
                ]
            ]
        ];

        if ($dataDok->getFilename() == "") {
            $simpan = [
                'dokumen_id' => $p['id'],
                'bidang_id' => $p['bidang_id'],
                'subbidang_id' => $p['subbidang_id'],
                'klasifikasi_id' => $p['klasifikasi_id'],
                'nama_dokumen' => $p['nama_dokumen']
            ];
        } else {
            if (!$this->validate($fileRule)) {
                return redirect()->to('/dokumen')->withInput();
            }

            $newName = $dataDok->getRandomName();
            $dataDok->move('uploads', $newName);
            $simpan = [
                'dokumen_id' => $p['id'],
                'bidang_id' => $p['bidang_id'],
                'subbidang_id' => $p['subbidang_id'],
                'klasifikasi_id' => $p['klasifikasi_id'],
                'nama_dokumen' => $p['nama_dokumen'],
                'nama_file' => $newName
            ];
        }
        //dd($simpan);
        $dokModel->save($simpan);
        return redirect()->to('/dokumen_view');
    }

    public function showfile($file = null)
    {
        $load = [
            'title' => 'Data PDF',
            'filename' => $file,
        ];

        return view('content/file_view', $load);
    }
}
