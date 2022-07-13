<?php

namespace App\Console\Commands;
use App\Mail\DailySales;
use App\Services\SalesReportService;
use App\Services\SellerService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailySales extends Command
{

    protected $signature = 'dailysales:send';

    protected $description = 'Enviar relatório de vendas';

    public function handle(SalesReportService $service, SellerService $sellerService)
    {
        $sales = $service->getDailySales();
        $sellers = $sellerService->getSellers();
        if(!$sales or !$sales) return;
        $totalSalesPrice = number_format((float) $sales->sum('price'), 2);
        foreach ($sellers as $seller){
            Mail::to($seller->email)->send(new DailySales($seller, $totalSalesPrice));
        }

        $this->info('Está sendo executado');
    }
}
