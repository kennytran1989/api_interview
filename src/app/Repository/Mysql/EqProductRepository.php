<?php

namespace App\Repository\Mysql;
use App\Contracts\Repository\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Store;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EqProductRepository extends BaseRepository implements ProductRepositoryInterface {

    public function create($request){
        DB::beginTransaction();
        try {
            $data               = $request->all();
            $data['user_id']    = $request->get('userInfo')['id'];
            $product_variants   = $data['variants'];
            unset($data['variants']);
            $newProduct         = Product::create($data);
            if(!empty($newProduct['id'])){
                foreach($product_variants as $k => $variant){
                    $product_variants[$k]['id']         = Str::uuid();
                    $product_variants[$k]['prod_id']    = $newProduct['id'];
                    $product_variants[$k]['created_at'] = date('Y-m-d H:i:s');
                    $product_variants[$k]['updated_at'] = date('Y-m-d H:i:s');
                }
                $productVariants = ProductVariant::insert($product_variants);
            }
            DB::commit();
            return $this->dataReturn($newProduct, 'Create Product Success', '');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Create Product:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function getAllProductInfoByUser ($request){
        try {

            $filters      = $request->all();
            $user_id      = $request->get('userInfo')['id'];
            $paged        = ! empty($filters['current_page']) ? $filters['current_page'] : 1;
            $limit        = ! empty($filters['limit']) ? $filters['limit'] : config('common.limit');
            $dataProduct  = Product::with(['product_variants' => function($q){
                                $q->select('id', 'name', 'price', 'quantity', 'prod_id');
                            }])->where('user_id', $user_id);

            Paginator::currentPageResolver(function () use ($paged) {
                return $paged;
            });

            $dataProduct  = $dataProduct->paginate($limit);

            $pagination = [
                'total'         => $dataProduct->total(),
                'per_page'      => $dataProduct->count(),
                'total_page'    => $dataProduct->lastPage(),
                'current_page'  => $dataProduct->currentPage()
            ];
            return $this->dataReturn($dataProduct->getCollection(), 'List All Product Of User', $pagination);
        } catch (\Exception $e) {
            \Log::error('Get All Product Of User:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function getProductInfoById(string $prod_id, string $user_id){
        try {
            $product = Product::with('product_variants')->where(['id' => $prod_id, 'user_id' => $user_id])
                                ->first();
            return $this->dataReturn($product, 'Get Product Info Success', '');
        } catch (\Exception $e) {
            \Log::error('Get Product Inf By ID:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }


    public function updateProductInfoById($request, string $prod_id){
        DB::beginTransaction();
        try {
            $data               = $request->all();
            $user_id            = $request->get('userInfo')['id'];
            $product_variants   = $data['variants'];
            unset($data['variants']);
            $updateProduct         = Product::where(['id' => $prod_id, 'user_id' => $user_id])->update($data);
            if($updateProduct){
                ProductVariant::where('prod_id', $prod_id)->delete();
                foreach($product_variants as $k => $variant){
                    $product_variants[$k]['id']         = Str::uuid();
                    $product_variants[$k]['prod_id']    = $prod_id;
                    $product_variants[$k]['created_at'] = date('Y-m-d H:i:s');
                    $product_variants[$k]['updated_at'] = date('Y-m-d H:i:s');
                }
                $productVariants = ProductVariant::insert($product_variants);
            }
            DB::commit();
            return $this->dataReturn('', 'update Product Success', '');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('update Product:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function deleteProductById($request, string $prod_id){
        DB::beginTransaction();
        try {
            $user_id = $request->get('userInfo')['id'];
            $deleteProd = Product::where(['id' => $prod_id, 'user_id' => $user_id])->delete();
            if($deleteProd){
                ProductVariant::where('prod_id', $prod_id)->delete();
            }
            DB::commit();
            return $this->dataReturn('', 'Delete Product Success', '');
        } catch (\Exception $e) {
            \Log::error('Delete Product By ID:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }
}
