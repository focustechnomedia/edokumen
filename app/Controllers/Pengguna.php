<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;
use App\Models\RoleModel;

class Pengguna extends BaseController
{
    public function index()
    {
        $pgModel = new PenggunaModel();
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;
        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');
        $rc = $pgModel->countAllResults(false);

        if ($keyword) {
            $data = $pgModel->searchData($keyword);
        } else {
            $data = $pgModel;
        }

        $res = $pgModel->select('ref_pengguna.*,ref_role.nama_role')
            ->join('ref_role', 'ref_pengguna.role_id=ref_role.role_id', 'left');
        //dd($res);

        $load = [
            'title' => 'Master Pengguna',
            'data' => $data->paginate(10, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('content/pengguna_view', $load);
    }

    public function form($id = null)
    {
        $pgModel = new PenggunaModel();
        $rlModel = new RoleModel();
        $role = $rlModel->findAll();

        if (!empty($id)) {
            $res = $pgModel->find($id);
            //dd($res);
            $load = [
                'title' => 'Master Pengguna',
                'id' => $id,
                'username' => $res['username'],
                'role_id' => $res['role_id'],
                'role' => $role,
            ];
        } else {
            $load = [
                'title' => 'Master Pengguna',
                'role' => $role,
            ];
        }
        return view('/content/pengguna_form_view', $load);
    }

    public function simpan()
    {
        $pgModel = new PenggunaModel();
        $id = $this->request->getVar('id');
        $role_id = $this->request->getVar('role_id');
        $username = $this->request->getVar('username');

        if (!empty($id)) {
            $data = [
                'pengguna_id' => $id,
                'username' => $username,
                'role_id' => $role_id,
            ];
        } else {
            $data = [
                'username' => $username,
                'role_id' => $role_id
            ];
        }

        $pgModel->save($data);

        return redirect()->to(site_url('/pengguna'));
    }

    public function hapus($id = null)
    {
        $pgModel = new PenggunaModel();
        $res = $pgModel->delete($id);
        return redirect()->to(site_url('/pengguna'));
    }
}
