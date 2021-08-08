<?php
/**
 * @OA\Info(title="API Test Interview", version="0.1")
 */

/**
 *  @OA\Post(
 *      path="/api/login",
 *      summary="Login",
 *      tags={"Auth"},
 *      @OA\RequestBody(
 *      description="Please use info to login for test
 *                      User1: email :user1@gmail.com, password:123456",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="email",type="email"),
 *                  @OA\Property(property="password",type="string"),
 *                  example={
 *                      "email"     : "user1@gmail.com",
 *                      "password"  : "123456",
 *                  }
 *              )
 *          )
 *      ),
 *      @OA\Response(
 *          response="200",
 *          description="Response accesstoken when login successfully",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                 @OA\Property(property="status",type="boolean"),
 *                 @OA\Property(property="data",type="text"),
 *                 example={"status": "true", "data" : {"token" : "access token string"}}
 *             )
 *        )
 *   ),
 *   security={{"Bearer": {}}}
 *  )
 */

 /**
 *  @OA\Post(
 *      path="/api/register",
 *      summary="Register",
 *      tags={"Auth"},
 *      @OA\RequestBody(
 *      description="Regitser user for app",
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  @OA\Property(property="email",type="email"),
 *                  @OA\Property(property="password",type="string"),
 *                  @OA\Property(property="full_name",type="string"),
 *                  example={
 *                      "email"     : "user3@gmail.com",
 *                      "password"  : "123456",
 *                      "full_name"  : "User3",
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
 *                 example={"status": "true", "data" : {"token" : "access token string", "expire_time": "Expire time of token"}}
 *             )
 *        )
 *   ),
 *   security={{"Bearer": {}}}
 *  )
 */

 /**
 * @OA\Get(
 *       path="/api/user/info",
 *       tags={"User"},
 *       summary="Get User Info",
 *       description="Returns Info User",
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
 *                              "id": 1707272528510428,
 *                              "full_name": "User5",
 *                              "email": "user5@gmail.com",
 *                              "role": "user"
 *                            }
 *                          }
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */

 /**
 * @OA\Put(
 *       path="/api/user/update",
 *       tags={"User"},
 *       summary="Update Info Account",
 *       description="Returns boolean",
 *       @OA\RequestBody(
 *          @OA\MediaType(
 *              mediaType="application/json",
 *              @OA\Schema(
 *                  example={
 *                      "email": "user5@gmail.com",
 *                      "password":456789,
 *                      "full_name":"User5"
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
 *                        "message": "Update Info User Success",
 *                        "data": ""
 *                   }
 *               )
 *          )
 *       ),
 *       security={{"Bearer": {}}}
 * )
 */
