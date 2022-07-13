<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\SaleReportInterfaceRepository;


class SaleReportRepository extends Repository implements SaleReportInterfaceRepository
{
    public function getDailySales(){
        return $this->query->whereDate('created_at', '=', date('Y-m-d'))->get();
    }
}
