<?php

namespace App\Repository\Mysql;
use App\Contracts\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;

class EqUserRepository extends BaseRepository implements UserRepositoryInterface {

    public function updateInfoById($request)
    {
        try {
            $data    = $request->all();
            $user_id = $request->get('userInfo')['id'];
            if(!empty($data['password'])) $data['password'] = bcrypt($data['password']);
            User::where('id', $user_id)->update($data);
            return $this->dataReturn('', 'Update Info User Success', '');
        } catch (\Exception $e) {
            \Log::error('Update Info User:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }

    }

    public function login($data)
    {
        try {
            if( Auth::attempt(['email' => $data['email'], 'password' => $data['password']]) ){
                $user = Auth::user();
                return $this->dataReturn(
                    [
                    'token'         => $this->generateToken($user),
                    'expire_time'   => date('Y-m-d H:i:s', time()+60*60*24)
                    ], 'Login Success', '');
            }
            return $this->dataReturn('', 'Wrong Email Or Password', '');
        } catch (\Exception $e) {
            \Log::error('Login:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }

    }

    public function register($data){
        try {
            $data['password'] = bcrypt($data['password']);
            $user =  User::create($data);
            return $this->dataReturn(
                [
                'token'         => $this->generateToken($user),
                'expire_time'   => date('Y-m-d H:i:s', time()+60*60*24)
                ], 'Register Success', '');
        } catch (\Exception $e) {
            \Log::error('Register User'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }

    }

    public function auth(string $verify_signature = ''): array {
        return (array) JWT::decode($verify_signature, env('JWT_SECRET_KEY'), array('HS256'));

    }

    private function generateToken($user)
    {
        $data = [
            'id'        => $user['id'],
            'full_name' => $user['full_name'],
            'email'     => $user['email'],
            'role'      => $user['role']
        ];

        return  (JWT::encode($data, env('JWT_SECRET_KEY')));
    }

}
