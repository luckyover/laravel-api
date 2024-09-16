<?php

namespace App\Http;

/**
 *  @OA\Info(
 *      version="v1",
 *      title="Laravel API",
 *      description="",
 *      @OA\Contact(
 *          name="Tuyen DN",
 *          email="",
 *          url=""
 *      )
 *  )
 *  @OA\SecurityScheme(
 *      securityScheme="bearerAuth",
 *      in="header",
 *      name="bearerAuth",
 *      type="http",
 *      scheme="bearer",
 *      bearerFormat="JWT",
 *  )
 *  @OA\Parameter(
 *      parameter="api_key",
 *      name="x-api-key",
 *      description="Key for client access API",
 *      @OA\Schema(
 *          type="string",
 *          example="QOa7BmWN9ukdhPYtUJqbMlmmfRmhxYzo"
 *      ),
 *      in="header",
 *      required=true
 *  )
 *  @OA\Parameter(
 *      parameter="request_id",
 *      name="x-request-id",
 *      description="Id for identity each request. It is a UUID v4",
 *      @OA\Schema(
 *          type="string",
 *          example="4a4c1314-4cbb-461b-9663-aa9f6f03efd9"
 *      ),
 *      in="header",
 *      required=true
 *  )
 *  @OA\Parameter(
 *      parameter="screen_id",
 *      name="x-screen-id",
 *      description="Id of screen call API",
 *      @OA\Schema(
 *          type="string",
 *          example="Swagger"
 *      ),
 *      in="header"
 *  )
 * *  @OA\Examples(
 *      example="invalid_data",
 *      summary="Invalid data",
 *      value= {
 *          "code": 400,
 *          "messageNo": "E001",
 *          "message": "項目が入力されていません",
 *          "invalidData": {
 *              "username": {"E001", "E002"}
 *          }
 *      }
 *  )
 *  @OA\Examples(
 *      example="bad_request",
 *      summary="Bad request",
 *      value= {
 *          "code": 400,
 *          "messageNo": "E400",
 *          "message": "エラーが発生しました。もう一度お願いします。"
 *      }
 *  )
 *  @OA\Examples(
 *      example="not_auth",
 *      summary="Not authentication",
 *      value={
 *          "code": 401,
 *          "messageNo": "E401",
 *          "message": "ログインセッションの有効期限が切れています。もう一度ログインしてください。"
 *      }
 *  )
 *  @OA\Examples(
 *      example="not_access",
 *      summary="Not access",
 *      value={
 *          "code": 403,
 *          "messageNo": "E403",
 *          "message": "この機能にアクセスする権限がありません。"
 *      }
 *  )
 *  @OA\Examples(
 *      example="not_acceptable",
 *      summary="Not Acceptable",
 *      value={
 *          "code": 406,
 *          "messageNo": "E406",
 *          "message": "項目が入力されていません"
 *      }
 *  )
 *  @OA\Examples(
 *      example="exception",
 *      summary="Exception",
 *      value={
 *          "code": 500,
 *          "messageNo": "E500",
 *          "message": "エラーが発生しました。もう一度お願いします。",
 *          "dataErrors": {
 *              "instance": "ErrorException",
 *              "line": 37,
 *              "file": "LoginModel.php",
 *              "code": 0,
 *              "message": "Undefined array key companycode"
 *          }
 *      }
 *  )
 */
class Swagger
{
}
