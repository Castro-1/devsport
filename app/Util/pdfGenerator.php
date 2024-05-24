<?php

namespace App\Util;

use App\Interfaces\ReportBuilder;
use App\Models\Routine;
use Barryvdh\DomPDF\Facade\Pdf;

class pdfGenerator implements ReportBuilder
{
    public function generateReport(Routine $routine)
    {
        $pdf = Pdf::loadView('routine.generateReport', ['routine' => $routine]);
        $pdfContent = $pdf->output();

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="document.pdf"');
    }
}
