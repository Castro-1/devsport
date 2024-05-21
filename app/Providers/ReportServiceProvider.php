<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\ReportBuilder;

use App\Util\pdfGenerator;

class ReportServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(ReportBuilder::class, function () {
            return new PdfGenerator();
        });
    }

}