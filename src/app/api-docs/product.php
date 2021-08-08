<?php

 /**
 *  @OA\Post(
 *      path="/api/product/create",
 *      summary="Product",
 *      tags={"Product"},
 *      @OA\RequestBody(
 *      description="Create Product For User",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="prod_name",type="string"),
 *                  example={
 *                      "prod_name":"product4_store1_user1",
 *                      "sale_price":90000,
 *                      "store_id":"fb643630-c194-4376-a807-a6de327f413d",
 *                      "variants":{
 *                          {
 *                              "name":"product4_variant1",
 *                              "price":10000,
 *                              "quantity":100
 *                          },
 *                          {
 *                              "name":"product4_variant2",
 *                              "price":20000,
 *                              "quantity":200
 *                          },
 *                          {
 *                              "name":"product4_variant3",
 *                              "price":23000,
 *                              "quantity":35
 *                          }
 *                      }
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Response Product Info when create successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(property="status",type="boolean"),
 *                 @OA\Property(property="data",type="text"),
 *                 example={
 *                      "status": true,
 *                      "message": "Create Product Success",
 *                      "data": {
 *                          "prod_name": "product1_store1_user1",
 *                          "sale_price": 90000,
 *                          "store_id": "205bf0c3-505d-455f-9ca4-070ec3059dba",
 *                          "user_id": "28a71274-a32c-44c6-bfcb-0b3bf6f8b26a",
 *                          "id": "1f030bb1-2c62-46cd-af81-e0d6591fdcac",
 *                          "updated_at": "2021-08-07T09:56:20.000000Z",
 *                          "created_at": "2021-08-07T09:56:20.000000Z"
 *                      }
 *                  }
 *             )
 *        )
 *   ),
 *   security={{"Bearer": {}}}
 *  )
 */

 /**
 * @OA\Get(
 *       path="/api/product",
 *       tags={"Product"},
 *       summary="Get List Product Of User",
 *       description="Returns List All Product Of User",
 *       @OA\Parameter(in="query",name="limit",@OA\Schema(type="number")),
 *       @OA\Parameter(in="query",name="current_page",@OA\Schema(type="number")),
 *       @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="status",type="boolean"),
 *                   example={
 *                       "status": "true",
 *                       "data": {
 *                           {
 *                              "id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0",
 *                              "prod_name": "product3_store1_user1",
 *                              "sale_price": "90000.00",
 *                              "store_id": "205bf0c3-505d-455f-9ca4-070ec3059dba",
 *                              "user_id": "28a71274-a32c-44c6-bfcb-0b3bf6f8b26a",
 *                              "created_at": "2021-08-07T09:59:36.000000Z",
 *                              "updated_at": "2021-08-07T09:59:36.000000Z",
 *                              "product_variants": {
 *                                      {
 *                                          "id": "11540bee-bfb5-4a96-bb9c-75625af93e3a",
 *                                          "name": "product3_variant2",
 *                                          "price": "20000.00",
 *                                          "quantity": 200,
 *                                          "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0"
 *                                      },
 *                                      {
 *                                          "id": "402d3ad6-733c-40f2-8b7d-32acbaeb2c75",
 *                                          "name": "product3_variant1",
 *                                          "price": "10000.00",
 *                                          "quantity": 100,
 *                                          "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0"
 *                                      },
 *                                      {
 *                                          "id": "a37cbfe7-11a0-4176-a10c-668702f97221",
 *                                          "name": "product3_variant3",
 *                                          "price": "23000.00",
 *                                          "quantity": 35,
 *                                          "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0"
 *                                      }
 *                              }
 *                        },
 *                         },
 *                                  "pagination": {
 *                                      "total": 3,
 *                                      "per_page": 1,
 *                                      "total_page": 2,
 *                                      "current_page": 2
 *                              }
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

 /**
* @OA\Get(
*       path="/api/product/{id}",
*       tags={"Product"},
*       summary="Get Product Info by id",
*       description="Returns Product Info",
*       @OA\Parameter(in="path",name="id",required=true,@OA\Schema(type="string")),
*       @OA\Response(
*          response=200,
*          description="successful operation",
*          @OA\MediaType(
*          mediaType="application/json",
*               @OA\Schema(
*                   @OA\Property(property="status",type="boolean"),
*                   example={
*                        "status": true,
*                        "message": "Get Product Info Success",
*                        "data": {
*                           "id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0",
*                           "prod_name": "product3_store1_user1",
*                           "sale_price": "90000.00",
*                           "store_id": "205bf0c3-505d-455f-9ca4-070ec3059dba",
*                           "user_id": "28a71274-a32c-44c6-bfcb-0b3bf6f8b26a",
*                           "created_at": "2021-08-07T09:59:36.000000Z",
*                           "updated_at": "2021-08-07T09:59:36.000000Z",
*                           "product_variants": {
*                                   {
*                                       "id": "11540bee-bfb5-4a96-bb9c-75625af93e3a",
*                                       "name": "product3_variant2",
*                                       "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0",
*                                       "price": "20000.00",
*                                       "quantity": 200,
*                                       "created_at": "2021-08-07T09:59:36.000000Z",
*                                       "updated_at": "2021-08-07T09:59:36.000000Z"
*                                   },
*                                   {
*                                       "id": "402d3ad6-733c-40f2-8b7d-32acbaeb2c75",
*                                       "name": "product3_variant1",
*                                       "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0",
*                                       "price": "10000.00",
*                                       "quantity": 100,
*                                       "created_at": "2021-08-07T09:59:36.000000Z",
*                                       "updated_at": "2021-08-07T09:59:36.000000Z"
*                                   },
*                                   {
*                                       "id": "a37cbfe7-11a0-4176-a10c-668702f97221",
*                                       "name": "product3_variant3",
*                                       "prod_id": "9a7462c2-7863-4d02-949f-b8c51ff23fc0",
*                                       "price": "23000.00",
*                                       "quantity": 35,
*                                       "created_at": "2021-08-07T09:59:36.000000Z",
*                                       "updated_at": "2021-08-07T09:59:36.000000Z"
*                                   }
*                           }
*                         }
*                   }
*               )
*          )
*       ),
*       security={{"Bearer": {}}}
* )
*/

/**
 * @OA\Put(
 *       path="/api/product/update/{id}",
 *       tags={"Product"},
 *       summary="Update Product Info ",
 *       description="Returns boolean",
 *       @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  example={
 *                          "prod_name":"product4_store1_user1",
 *                          "sale_price":950000,
 *                          "store_id":"fb643630-c194-4376-a807-a6de327f413d",
 *                          "variants":{
 *                                  {
 *                                      "name":"product4_variant11",
 *                                      "price":15000,
 *                                      "quantity":100
 *                                  },
 *                                  {
 *                                      "name":"product4_variant2",
 *                                      "price":25000,
 *                                      "quantity":200
 *                                  },
 *                                  {
 *                                      "name":"product4_variant3",
 *                                      "price":15000,
 *                                      "quantity":35
 *                                  },
 *                                  {
 *                                      "name":"product4_variant4",
 *                                      "price":5000,
 *                                      "quantity":150
 *                                  }
 *                          }
 *                      }
 *              )
 *          )
 *       ),
 *       @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="status",type="boolean"),
 *                   example={
 *                        "status": true,
 *                        "message": "Update Product Info Success",
 *                        "data": ""
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

 /**
 * @OA\Delete(
 *       path="/api/product/{id}",
 *       tags={"Product"},
 *       summary="Delete Product ",
 *       description="Returns boolean",
 *       @OA\Parameter(in="path",name="id",required=true,@OA\Schema(type="string")),
 *       @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\MediaType(
 *          mediaType="application/json",
 *               @OA\Schema(
 *                   @OA\Property(property="status",type="boolean"),
 *                   example={
 *                        "status": true,
 *                        "message": "Delete Product Success",
 *                        "data": ""
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

