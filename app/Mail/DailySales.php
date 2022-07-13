<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DailySales extends Mailable
{
    use Queueable, SerializesModels;

    private $total;
    private $sales;
    public function __construct($sales, $totalSalesPrice)
    {
        $this->sales = $sales;
        $this->total = $totalSalesPrice;
    }

    public function build()
    {
        return $this->from($this->sales->seller->email)
            ->view('mail.daily_sales_mail')
            ->with('total', $this->total)
            ->with('sales', $this->sales);
    }
}
