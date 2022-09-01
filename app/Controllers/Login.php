<?php

namespace App\Controllers;

use App\Models\ModelLogin;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Login extends ResourceController
{
    public function index()
    {
        $modelLogin = new ModelLogin();
        $username = $this->request->getVar("username");
        $userpassword = $this->request->getVar("userpassword");

        $cekUser = $modelLogin->ceklogin($username);

        if (count($cekUser->getResultArray()) > 0) {
            $row = $cekUser->getRowArray();
            $pass_hash = $row['userpassword'];

            if (password_verify($userpassword, $pass_hash)) {
                $issuedate_claim = time();
                $expire_time = $issuedate_claim + 3600;

                $token = [
                    'iat' => $issuedate_claim,
                    'exp' => $expire_time
                ];

                $token = JWT::encode($token, getenv("TOKEN_KEY"), 'HS256');
                $output = [
                    'status' => 200,
                    'error' => 200,
                    'messages' => 'Login berhasil',
                    'token' => $token,
                    'username' => $username,
                    'email' => $row['useremail']
                ];

                return $this->respond($output, 200);
            } else {
                return $this->failNotFound("maaf user/password salah");
            }
        } else {
            return $this->failNotFound("maaf user/password salah");
        }
    }
}
