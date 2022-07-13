<?php

namespace App\Repositories\Eloquent;
use App\Repositories\Interfaces\SaleInterfaceRepository;

class SaleRepository extends Repository implements SaleInterfaceRepository
{
    public function findBySeller($sellerId)
    {
        return $this->query->where('sales.seller_id', $sellerId)->get();
    }
}
