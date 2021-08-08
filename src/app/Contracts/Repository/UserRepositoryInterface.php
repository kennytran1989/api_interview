<?php

namespace App\Contracts\Repository;
use Illuminate\Http\Request;

interface UserRepositoryInterface {

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * update info user
     */
    public function updateInfoById($request);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle Login
     */
    public function login (array $data);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle Register
     */
    public function register (array $data);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle Auth for user
     */
    public function auth (string $verify_signature = ''): array;

}
