<?php

namespace App\Util;

use App\Interfaces\ReportBuilder;
use App\Models\Routine;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RoutineExport;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExcelGenerator implements ReportBuilder
{
    public function generateReport(Routine $routine): BinaryFileResponse
    {
        $filename = 'routine.xlsx';

        return Excel::download(new RoutineExport($routine), $filename);
    }
}
