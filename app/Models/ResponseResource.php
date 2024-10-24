<?php

namespace App\Models;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Utility\Log\Facades\Log;
use Message;
class ResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $dataError = null;
    // Khai báo thuộc tính $data
    protected $data;

    public string $message ;

    public int $status = 200;
    public function __construct($data)
    {
        // Gán giá trị cho $data
        $this->data = $data;
        $this->message = Message::find(5) ?? '';
    }

    public function toArray(Request $request): array
    {

        $result = [
            'message' => $this->message,
            'status' => $this->status,
            'data' => $this->data,
        ];

        if ($this->dataError !== null) {
            if($this->status == 422 || $this->status == 201 ){
                $result['error'] = $this->dataError['error'];
            }else{
                Log::insert('database_log', 'error', '[EXCEPTION]:'. $this->message .' - ' . print_r($this->dataError, true));
            }
        }

        return $result;
    }

}
