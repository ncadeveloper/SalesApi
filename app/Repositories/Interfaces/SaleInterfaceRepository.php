<?php

namespace App\Repositories\Interfaces;

interface SaleInterfaceRepository
{
    public function findBySeller($sellerId);
}
