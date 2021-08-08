<?php

namespace App\Contracts\Repository;
use Illuminate\Http\Request;

interface ProductRepositoryInterface {



    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle Create Product
     */
    public function create ($request);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle get list product of user
     */
    public function getAllProductInfoByUser ($request);


    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle get product Info By product_id
     */
    public function getProductInfoById(string $prod_id, string $user_id);

     /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle update products Info By product_id
     */
    public function updateProductInfoById($request, string $prod_id);

    /**
     * @author Kenny <kennytran1989@gmail.com>
     * Handle delete product By product_id
     */
    public function deleteProductById($request, string $prod_id);


}
