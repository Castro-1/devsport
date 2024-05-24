<?php

namespace App\Interfaces;

use App\Models\Routine;

interface ReportBuilder
{
    public function generateReport(Routine $routine);
}
