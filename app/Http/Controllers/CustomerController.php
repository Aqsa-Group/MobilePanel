<?php
namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Customer;
class CustomerController extends Controller
{
public function generatePDF($id)
{
    $customer = \App\Models\Customer::findOrFail($id);
    $pdf = Pdf::loadView('pdf.customer', [
        'customer' => $customer
    ])->setPaper('A4');
    $dompdf = $pdf->getDomPDF();
    $options = $dompdf->getOptions();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);
    $options->set('defaultFont', 'Vazir');
    $dompdf->setOptions($options);
    return $pdf->stream('customer.pdf');
}
}
