<?php

namespace App\Services;

use App\Repositories\Interfaces\SaleReportInterfaceRepository;
use App\Services\Interfaces\SaleReportInterface;

class SalesReportService implements SaleReportInterface
{
    private SaleReportInterfaceRepository $repository;

    public function __construct(SaleReportInterfaceRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getDailySales()
    {
        return $this->repository->getDailySales();
    }
}
