<?php

namespace App\Repositories;

use Illuminate\Http\JsonResponse;
use App\Models\Todo;

class TodoRepositories
{
    // model property on class instances
    public function CreateData(array $payload)
    {
        try {
            Todo::create($payload);
            return [
                'code' => JsonResponse::HTTP_CREATED,
                'message' => 'Create data successfully!',
            ];
        } catch (\Throwable $th) {
            return [
                'code' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Create data failed!',
                'Log' => $th->getMessage(),
            ];
        }
    }

    public function IndexData($payload){
        try {
            $data = Todo::paginate(10);
            return [
                'code' => JsonResponse::HTTP_OK,
                'message' => 'Get data',
                'contents' => $data,
            ];
        } catch (\Throwable $th) {
            return [
                'code' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Get data failed!',
                'message' => $th->getMessage(),
            ];
        }
    }

    public function ReadDataById($id){
        try {
            $data = Todo::find($id);
            if(!$data){
               return $this->dataNotFound();
            }
            return [
                'code' => JsonResponse::HTTP_OK,
                'message' => 'Get data',
                'contents' => $data,
            ];
        } catch (\Throwable $th) {
            return [
                'code' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Get data failed!',
            ];
        }
    }

    public function UpdateData($id,$payload){
        try {
            $data = Todo::find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $data->name = $payload['name'];
            $data->description = $payload['description'];
            $data->due_date = $payload['due_date'];
            $data->status = $payload['status'];
            $data->save();
            return [
                'code' => JsonResponse::HTTP_OK,
                'message' => 'Get data',
                'contents' => $data,
            ];
        } catch (\Throwable $th) {
            return [
                'code' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Get data failed!',
                'message' => $th->getMessage(),
            ];
        }
    }

    public function delete($id)
    {
        try {
            $data = Todo::find($id);
            if(!$data){
                return $this->dataNotFound();
            }
            $data->delete();
            return [
                'code' => JsonResponse::HTTP_OK,
                'message' => 'Delete data successfully!',
                'contents' => $data,
            ];
        } catch (\Throwable $th) {
            \Log::info($th->getMessage());
            return [
                'code' => JsonResponse::HTTP_INTERNAL_SERVER_ERROR,
                'message' => 'Delete data failed!'
            ];
        }
    }
    public function dataNotFound(){
        return [
            'code' =>404,
            'message' => 'Data not found',
        ];
    }
}