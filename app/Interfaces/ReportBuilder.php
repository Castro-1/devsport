<?php

namespace App\Interfaces;
use App\Models\Routine;

use Barryvdh\DomPDF\Facade\Pdf;

interface ReportBuilder {
    public function generateReport(Routine $routine);
}

