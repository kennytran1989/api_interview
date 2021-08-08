<?php

namespace App\Contracts\Repository;
use Illuminate\Http\Request;

interface StoreRepositoryInterface {



    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle Create Store
     */
    public function create ($request);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle get list all Store of user
     */
    public function getAllStoreByUserId ($request);


    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle get Store Info By store_id
     */
    public function getStoreInfoById(string $store_id, string $user_id);

     /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle update Store Info By store_id
     */
    public function updateStoreInfoById($request, string $id);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle delete Store Info By store_id
     */
    public function deleteStoreInfoById($request, string $id);


}
