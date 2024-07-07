<?php

namespace App\Utils\Traits;

use Barryvdh\DomPDF\Facade\Pdf;

trait DatatablesTrait
{
    /**
     * Generates a filename based on the current class name and the current timestamp.
     *
     * @return string The generated filename.
     */
    protected function filename(): string
    {
        return substr(class_basename($this), 0, -9) . '_' . date('YmdHis');
    }

    /**
     * Generates a PDF file for download.
     *
     * @return mixed
     */
    public function pdf()
    {
        $data = $this->getDataForPrint();
        $pdf = Pdf::loadView($this->printPreview, ['data' => $data])->setOption(['defaultFont' => 'sans-serif']);

        return $pdf->download($this->filename().'.pdf');
    }
}
