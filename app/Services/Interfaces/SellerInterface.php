<?php

namespace App\Services\Interfaces;

use App\Http\Requests\SellerStoreRequest;
use App\Http\Requests\SellerUpdateRequest;
use App\Http\Resources\SellerCollection;
use App\Http\Resources\SellerResource;
use App\Models\Seller;

interface SellerInterface
{
    public function createSeller(SellerStoreRequest $request);

    public function updateSeller($sellerId, SellerUpdateRequest $data);

    public function deleteSeller($sellerId);

    public function getSellerById($sellerId);

    public function getSellers();
}
