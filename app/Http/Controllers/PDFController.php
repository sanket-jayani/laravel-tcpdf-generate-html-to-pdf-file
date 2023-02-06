<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Elibyy\TCPDF\Facades\TCPDF;
  
class PDFController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {
        $filename = 'demo.pdf';
  
        $data = [
            'title' => 'Generate PDF using Laravel TCPDF - ItSolutionStuff.com!'
        ];
  
        $html = view()->make('pdfSample', $data)->render();
  
        $pdf = new TCPDF;
          
        $pdf::SetTitle('Hello World');
        $pdf::AddPage();
        $pdf::writeHTML($html, true, false, true, false, '');
  
        $pdf::Output(public_path($filename), 'F');
  
        return response()->download(public_path($filename));
    }
}