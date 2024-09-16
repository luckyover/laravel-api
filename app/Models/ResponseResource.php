<?php
 
namespace App\Models;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
 
class ResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $result = [
            'code' => 1232,
            'messageNo' => 'ok',
            'message' => 'ok',
        ];

        return $result;
    }
 
}