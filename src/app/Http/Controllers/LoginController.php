<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Contracts\Repository\UserRepositoryInterface;
use Exception;

class LoginController extends Controller
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepositoryInterface::class);
    }

    public function login(LoginRequest $request)
    {
        $data = $this->userRepository->login($request->all());
        return response()->json($data, 200);
    }

    public function register(RegisterRequest $request){

        $data = $this->userRepository->register($request->all());
        return response()->json($data, 200);
    }
}
