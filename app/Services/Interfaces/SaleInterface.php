<?php

namespace App\Services\Interfaces;
use Illuminate\Http\Request;

interface SaleInterface
{
    public function createSale(Request $request);

    public function updateSale($saleId, Request $data);

    public function deleteSale($saleId);

    public function getSales();

    public function getSalesBySeller($sellerId);

}
