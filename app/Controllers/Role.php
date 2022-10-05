<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class Role extends BaseController
{
    public function index()
    {
        $rlModel = new RoleModel();
        //Data paging
        $rc = $rlModel->countAllResults(false); //false digunakan agar tidak menggangu query
        $page = $this->request->getVar('page_datagroup') ? $this->request->getVar('page_datagroup') : 1;

        //Jika ada pencarian data
        $keyword = $this->request->getGet('keyword');
        if ($keyword) {
            $data = $rlModel->searchData($keyword);
        } else {
            $data = $rlModel;
        };

        //Data for view
        $load = [
            'title' => 'Master Role',
            'data' => $data->paginate(20, 'datagroup'),
            'pager' => $data->pager,
            'page' => $page,
            'rc' => $rc
        ];
        return view('/content/role_view', $load);
    }

    public function form($id = null)
    {
        $rlModel = new RoleModel();

        if (!empty($id)) {
            $res = $rlModel->find($id);

            $load = [
                'title' => 'Master Role',
                'id' => $id,
                'nama_role' => $res['nama_role'],
            ];
        } else {
            $load = [
                'title' => 'Master Role',
                'nama_role' => ''
            ];
        }
        return view('/content/role_form_view', $load);
    }
    public function simpan()
    {
        $rlModel = new RoleModel();
        $p = $this->request->getPost();
        if (!empty($p['id'])) :
            $data = [
                'role_id' => $p['id'],
                'nama_role' => $p['nama_role']
            ];
        else :
            $data = [
                'nama_role' => $p['nama_role']
            ];
        endif;

        $rlModel->save($data);
        return redirect()->to(site_url('/role'));
    }
    public function hapus($id)
    {
        $rlModel = new RoleModel();
        $rlModel->delete($id);
        return redirect()->to(site_url('/role'));
    }
}
