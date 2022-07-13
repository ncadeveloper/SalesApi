<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleInterfaceRepository;
use App\Repositories\Interfaces\SellerInterfaceRepository;
use App\Services\Interfaces\SaleInterface;
use App\Services\Interfaces\SellerInterface;

class SaleService implements SaleInterface
{
    private SaleInterfaceRepository $repository;
    private SellerInterfaceRepository $sellerRepository;

    public function __construct(SaleInterfaceRepository $repository, SellerInterfaceRepository $sellerRepository)
    {
        $this->repository = $repository;
        $this->sellerRepository = $sellerRepository;
    }

    public function getSales()
    {
        return $this->repository->all();
    }

    public function getSalesBySeller($sellerId)
    {
        return $this->repository->findBySeller($sellerId);
    }

    public function createSale($request)
    {
        $seller = $this->getSellerToCommission($request->seller_id);
        $this->validateSeller($seller);

        $data = [
            'price' => $request->price,
            'seller_id' => $request->seller_id,
            'commission_value' => $this->calculateCommission($request->price, $seller->commission)
        ];
        return $this->repository->create($data);
    }

    public function updateSale($sellerId, $request)
    {
        $data = $request->all();
        return $this->repository->update($sellerId, $data);
    }

    public function deleteSale($sellerId)
    {
        return $this->repository->delete($sellerId);
    }

    private function getSellerToCommission($sellerId){
        return $this->sellerRepository->find($sellerId);
    }

    private function calculateCommission($price, $commission){
        return $price*$commission/100;
    }

    private function validateSeller($seller){
        if(is_null($seller)){
            abort(404,'Vendedor não encontrado');
        }
        return true;
    }

}
