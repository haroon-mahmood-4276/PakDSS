<?php

namespace App\Utils\Traits;
use Barryvdh\DomPDF\Facade\Pdf;

trait DatatablesTrait
{
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = Pdf::loadView($this->printPreview, ['data' => $data])->setOption(['defaultFont' => 'sans-serif']);
        return $pdf->download($this->filename() . '.pdf');
    }
}
