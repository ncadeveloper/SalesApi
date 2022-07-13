<?php

namespace App\Http\Controllers;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;
use App\Services\Interfaces\SellerInterface;
use App\Services\SellerService;


class SellerController extends Controller
{
    private SellerInterface $service;

    public function __construct(SellerService $service)
    {
        $this->service = $service;
    }

    public function getAll()
    {
        try{
            return new SellerCollection($this->service->getSellers());
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function getById($id)
    {
        try{
            return new SellerResource($this->service->getSellerById($id));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function store(SellerStoreRequest $request)
    {
        try{
            return new SellerResource($this->service->createSeller($request));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function update($id, SellerUpdateRequest $sellerUpdateRequest)
    {
        try{
            return new SellerResource($this->service->updateSeller($id, $sellerUpdateRequest));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function destroy($id)
    {
        try{
            return $this->service->deleteSeller($id);
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    private function errorResponse(\Exception $e){
        return response()->json( [
            'message' => $e->getMessage()
        ], 500 );
    }
}
