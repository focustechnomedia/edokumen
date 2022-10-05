<?php

namespace App\Controllers;

use App\Models\MasterdataModel;
use App\Models\PenggunaModel;

class Login extends BaseController
{

    protected $muser;
    protected $session;

    public function __construct()
    {
    }

    public function index()
    {
        $pgnModel = new PenggunaModel();
        if ($this->sess) :
            if ($this->sess['aktif'] == 'Y') {
                return redirect()->to('/home');
            }
        endif;

        $load = [
            'title' => 'Dashboard'
        ];
        return view('content/login_view', $load);
    }

    public function logincek()
    {
        $pgnModel = new PenggunaModel();

        $postdata = $this->request->getPost();
        $us = $postdata['username'];
        $pw = $postdata['password'];

        $userdata = $pgnModel->loginCek($us, $pw);
        //echo $this->muser->getLastQuery();
        //dd($userdata);

        if ($userdata) {
            $session = \Config\Services::session();
            $sess = [
                'id_user' => $userdata['id_user'],
                'us' => $userdata['username'],
                'aktif' => $userdata['aktif'],
                'nama_role' => $userdata['nama_role'],
                'role' => $userdata['role']
            ];

            $load = [
                'title' => 'Dashboard FTM',
                'sess' => $sess,
            ];

            $session->set('sessiondata', $sess);
            return redirect()->to('/home');
        } else {
            return redirect()->to('/login');
        }
    }

    public function tampilsession()
    {
        //$session = \Config\Services::session(); //Bisa dengan cara 1
        $session = session(); //Cara ke 2

        $datasession = $session->get('sessiondata');

        dd($datasession);
    }

    function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
