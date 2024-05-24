<?php

namespace App\Providers;

use App\Interfaces\ReportBuilder;
use App\Util\pdfGenerator;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ReportBuilder::class, function () {
            return new PdfGenerator();
        });
    }
}
