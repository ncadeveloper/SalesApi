<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaleStoreRequest;
use App\Http\Resources\SaleCollection;
use App\Http\Resources\SaleResource;
use App\Services\Interfaces\SaleInterface;
use App\Services\Interfaces\SaleReportInterface;
use App\Services\SaleService;
use App\Services\SalesReportService;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    private SaleInterface $service;
    private SaleReportInterface $serviceReport;

    public function __construct(SaleService $service, SalesReportService $saleReportRepository)
    {
        $this->service = $service;
        $this->serviceReport = $saleReportRepository;
    }

    public function getAll()
    {
        try{
            return new SaleCollection($this->service->getSales());
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function getBySeller($sellerId)
    {
        try{
            return new SaleCollection($this->service->getSalesBySeller($sellerId));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function store(SaleStoreRequest $request)
    {
        try{
            return new SaleResource($this->service->createSale($request));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function update($id, Request $sellerUpdateRequest)
    {
        try{
            return new SaleResource($this->service->updateSale($id, $sellerUpdateRequest));
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function destroy($id)
    {
        try{
            return $this->service->deleteSale($id);
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    public function getDailySales(){
        try{
            return $this->serviceReport->getDailySales();
        }catch (\Exception $e){
            return $this->errorResponse($e);
        }
    }

    private function errorResponse(\Exception $e){
        return response()->json( [
            'message' => $e->getMessage()
        ], 500);
    }
}
