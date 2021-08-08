<?php
/**
 *  @OA\Post(
 *      path="/api/store/create",
 *      summary="Store",
 *      tags={"Store"},
 *      @OA\RequestBody(
 *      description="Create Store For User",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="store_name",type="email"),
 *                  example={
 *                      "store_name"     : "store1_user1",
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Response accesstoken when register successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(property="status",type="boolean"),
 *                 @OA\Property(property="data",type="text"),
 *                 example={
 *                      "status": true,
 *                      "message": "Create Store Success",
 *                      "data": {
 *                          "store_name": "store1_user1",
 *                          "user_id": 1707329139315199,
 *                          "id": 1707329376694452,
 *                          "updated_at": "2021-08-06T07:49:36.000000Z",
 *                          "created_at": "2021-08-06T07:49:36.000000Z"
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
 *       path="/api/store",
 *       tags={"Store"},
 *       summary="Get List All Store Of User",
 *       description="Returns List All Store Of User",
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
 *                              "id": "1707330796931053",
 *                              "store_name": "store3_user1",
 *                              "user_id": "1707329139315199",
 *                              "created_at": "2021-08-06T08:12:10.000000Z",
 *                              "updated_at": "2021-08-06T08:12:10.000000Z"
 *                            },
 *                             },
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
*       path="/api/store/{id}",
*       tags={"Store"},
*       summary="Get Store Info by id",
*       description="Returns Store Info",
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
*                        "message": "Get Info Store Success",
*                        "data": {
*                           "id": "1707330796931053",
*                           "store_name": "store3_user1",
*                           "user_id": "1707329139315199",
*                           "created_at": "2021-08-06T08:12:10.000000Z",
*                           "updated_at": "2021-08-06T08:12:10.000000Z"
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
 *       path="/api/store/update/{id}",
 *       tags={"Store"},
 *       summary="Update Store Info ",
 *       description="Returns boolean",
 *       @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  example={
 *                      "store_name":"store2_user1"
 *                  }
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
 *                        "message": "Update Store Info Success",
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
 *       path="/api/store/{id}",
 *       tags={"Store"},
 *       summary="Delete Store Info ",
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
 *                        "message": "Delete Store Info Success",
 *                        "data": ""
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

