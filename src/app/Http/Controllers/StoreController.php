<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Contracts\Repository\StoreRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    private $storeRepository;

    public function __construct()
    {
        $this->storeRepository = app(StoreRepositoryInterface::class);
    }

    public function getAllStoreInfoByUser(Request $request){
        $data = $this->storeRepository->getAllStoreByUserId($request);
        return response()->json($data, 200);
    }

    public function create(StoreRequest $request)
    {
        $data = $this->storeRepository->create($request);
        return response()->json($data, 200);
    }

    public function getStoreInfoById(Request $request, $id)
    {
        $data = $this->storeRepository->getStoreInfoById($id, $request->get('userInfo')['id']);
        return response()->json($data, 200);
    }

    public function updateStoreInfoById(StoreRequest $request, $id){
        $data = $this->storeRepository->updateStoreInfoById($request, $id);
        return response()->json($data, 200);
    }

    public function delete(Request $request, $id){
        $data = $this->storeRepository->deleteStoreInfoById($request, $id);
        return response()->json($data, 200);
    }



    // public function register(RegisterRequest $request){
    //     try{
    //         $data = $this->userRepository->register($request->all());
    //         return response()->json($data, 200);
    //     }catch(Exception $e){
    //         return response()->json(['status' => false, 'data' => ['message' => $e->getMessage()]], 200);
    //     }
    // }
}
