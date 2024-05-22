<?php

namespace App\Exports;

use App\Models\Routine;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RoutineExport implements FromCollection, WithHeadings
{
    protected $routine;

    public function __construct(Routine $routine)
    {
        $this->routine = $routine;
    }

    public function collection()
    {
        return collect([
            [
                'Specifications' => $this->routine->getSpecifications(),
                // Añadir más campos según sea necesario
            ],
        ]);
    }

    public function headings(): array
    {
        return [
            'Specifications',
            // Añadir más encabezados según sea necesario
        ];
    }
}
