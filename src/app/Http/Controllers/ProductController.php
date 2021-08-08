<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Contracts\Repository\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    private $productRepository;

    public function __construct()
    {
        $this->productRepository = app(ProductRepositoryInterface::class);
    }

    public function getAllProductInfoByUser(Request $request){
        $data = $this->productRepository->getAllProductInfoByUser($request);
        return response()->json($data, 200);
    }

    public function create(ProductRequest $request)
    {
        $data = $this->productRepository->create($request);
        return response()->json($data, 200);
    }

    public function getProductInfoById(Request $request, $id)
    {
        $data = $this->productRepository->getProductInfoById($id, $request->get('userInfo')['id']);
        return response()->json($data, 200);
    }

    public function updateProductInfoById(ProductRequest $request, $id){
        $data = $this->productRepository->updateProductInfoById($request, $id);
        return response()->json($data, 200);
    }

    public function delete(Request $request, $id){
        $data = $this->productRepository->deleteProductById($request, $id);
        return response()->json($data, 200);
    }

}
