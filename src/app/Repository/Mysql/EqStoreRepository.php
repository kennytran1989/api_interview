<?php

namespace App\Repository\Mysql;
use App\Contracts\Repository\StoreRepositoryInterface;
use App\Models\Store;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Firebase\JWT\JWT;

class EqStoreRepository extends BaseRepository implements StoreRepositoryInterface {

    public function create($request){
        try {
            $data               = $request->all();
            $data['user_id']    = $request->get('userInfo')['id'];
            $newStore           = Store::create($data);
            return $this->dataReturn($newStore, 'Create Store Success', '');
        } catch (\Exception $e) {
            \Log::error('Create Store Info :'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function getAllStoreByUserId ($request){
        try {
            $filters    = $request->all();
            $user_id    = $request->get('userInfo')['id'];
            $paged      = ! empty($filters['current_page']) ? $filters['current_page'] : 1;
            $limit      = ! empty($filters['limit']) ? $filters['limit'] : config('common.limit');
            $dataStore  = Store::where('user_id', $user_id);

            Paginator::currentPageResolver(function () use ($paged) {
                return $paged;
            });

            $dataStore      = $dataStore->paginate($limit);

            $pagination = [
                'total'         => $dataStore->total(),
                'per_page'      => $dataStore->count(),
                'total_page'    => $dataStore->lastPage(),
                'current_page'  => $dataStore->currentPage()
            ];
            return $this->dataReturn($dataStore->getCollection(), 'List All Store Of User', $pagination);
        } catch (\Exception $e) {
            \Log::error('Get All Store Of User:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function getStoreInfoById(string $store_id, string $user_id){
        try {
            $store = Store::where(['id' => $store_id, 'user_id' => $user_id])->first();
            return $this->dataReturn($store, 'Get Info Store Success', '');
        } catch (\Exception $e) {
            \Log::error('Get Info Store By ID:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }


    public function updateStoreInfoById($request, string $id){
        try {
            $data    = $request->all();
            $user_id = $request->get('userInfo')['id'];
            Store::where(['id' => $id, 'user_id' => $user_id])->update($data);
            return $this->dataReturn('', 'Update Store Info Success', '');
        } catch (\Exception $e) {
            \Log::error('Get Info Store By ID:'.$e->getMessage());
            return $this->dataReturn('', 'Something went wrong Please try again', '');
        }
    }

    public function deleteStoreInfoById($request, string $id){
        try {
            $user_id = $request->get('userInfo')['id'];
            Store::where(['id' => $id, 'user_id' => $user_id])->delete();
            return $this->dataReturn('', 'Delete Store Info Success', '');
        } catch (\Exception $e) {
            \Log::error('Delete Store By ID:'.$e->getMessage());
            $mess = 'Something went wrong Please try again';
            if($e->errorInfo['0'] == '23000' && $e->errorInfo['1'] == 1451)
                $mess = 'Can not delete Store which has the products belong and publish.Please delete products before delele this store';
            return $this->dataReturn('', $mess, '');
        }
    }
}
