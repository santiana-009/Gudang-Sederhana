<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Incomings;
use App\Models\Outgoings;
use App\Models\OutgoingsEnd;
use Illuminate\Http\Request;
use setasign\Fpdi\TcpdfFpdi;
use Elibyy\TCPDF\Facades\TCPDF;



class PdfController extends Controller
{
    public function pdfincoming($id) 
    {
        $incoming = Incomings::where('id',$id)->first();
        $pattern = "/\(([^)]+)\)/";
    	$filename = "$incoming->site_name.pdf";
    	$pdf = new TCPDF( 'page_units', PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf::SetCreator(PDF_CREATOR);
        $pdf::SetAuthor('Fadhil');
        $pdf::SetTitle('');
        $pdf::SetSubject('');
        $pdf::SetKeywords('TCPDF, PDF');

        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        // ---------------------------------------------------------


        // add a page
        $pdf::AddPage();


        $pdf::SetFont('times', '', 7);

        // -----------------------------------------------------------------------------

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="4">Employee's Information</td> 
            </tr>
            <tr>
                <td width="400"><p><i>Curent Date :</i></p><h1 align="center">$incoming->current_date</h1></td>
                <td width="238" rowspan="2"><p><i>SRM Reservation No.</i></p></td>
            </tr>
            <tr>
                <td><p><i>Site Name :</i></p><h1 align="center">$incoming->site_name</h1></td>
            </tr>
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');
        // -----------------------------------------------------------------------------

        // NON-BREAKING TABLE (nobr="true")

        $tbl = <<<EOD
        <table border="1" cellpadding="1" cellspacing="1">
            <tr style="background-color:green;color:white;">
                <td colspan="6">Material & Equpmant List</td> 
            </tr>
            <tr>
                <td width="20" rowspan="2" align="center;"><b>No.</b></td>
                <td width="250" rowspan="2" align="center"><b>TYPE / NAME OF GOODS</b></td>
                <td width="214" rowspan="2" align="center"><b>MATERIAL NO</b></td>
                <td width="48" align="center"> <b>AMOUNT</b></td>
                <td width="100" rowspan="2" align="center"><b>BARCODE OK</b></td>
            </tr>
            <tr>
                <td align="center">IN</td>
            </tr>
        EOD;


        $no = 1;

        foreach (explode(",", $incoming->qty_items_info) as $data) {
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 3) as $chunk) {
                    $item = Items::where('no_item', $chunk[0])->first();
                    $noitem = $chunk[0];
                    $tbl .= "<tr>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$no</td>";
                    $tbl .= "<td>$item->name_item</td>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$noitem</td>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                    $tbl .= "<td><table>";
                    foreach (explode(",", $incoming->brcd_items_info) as $data) {
                        if (preg_match_all($pattern, $data, $matches)) {
                            foreach (array_chunk($matches[1], 2) as $chunk) {
                                if ($chunk[0] == $noitem) {
                                    $tbl .= "<tr>";
                                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                                    $tbl .= "</tr>";
                                }
                            }
                        }
                    }
                    $tbl .= "</table></td>";
                    $tbl .= "</tr>";
                    $no++;
                }
            }
        }

        $tbl .= <<<EOD
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');


        // // -----------------------------------------------------------------------------

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="6">Filled When Incoming</td> 
            </tr>
            <tr>
                <td width="233" height="100"><p><i>Condition and Remarks Explanation :</i></p><br>$incoming->coment</td>
                <td width="135" ><p><i>User :</i></p></td>
                <td width="135" ><p><i>Carried by :</i></p></td>
                <td width="135" ><p><i>Cheked by :</i></p></td>
                </tr>
        </table>
        EOD;
        $pdf::writeHTML($tbl, true, false, true, false, '');

        $pdf::Output($filename, 'I');
    }

    public function pdfoutgoing($id) 
    {
        $outgoing = Outgoings::where('id',$id)->first();
        $pattern = "/\(([^)]+)\)/";
    	$filename = "$outgoing->name_pic.pdf";
    	$pdf = new TCPDF( 'page_units', PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf::SetCreator(PDF_CREATOR);
        $pdf::SetAuthor('Fadhil');
        $pdf::SetTitle('');
        $pdf::SetSubject('');
        $pdf::SetKeywords('TCPDF, PDF');

        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        // ---------------------------------------------------------


        // add a page
        $pdf::AddPage();


        $pdf::SetFont('times', '', 7);

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="6">Employee's Information</td> 
            </tr>
            <tr>
                <td width="235" height="70"><p><i>Employee Name :</i></p><h1 style="text-align: center;">$outgoing->name_pic</h1></td>
                <td width="235"><p><i>Curent Date :</i></p><h1 style="text-align: center;">$outgoing->current_date</h1></td>
                <td width="168" rowspan="2"><p><i>SRM Reservation No.</i></p></td>
            </tr>
            <tr>
                <td height="70"><p><i>Employee ID :</i></p><h1 style="text-align: center;">$outgoing->id_pic</h1></td>
                <td><p><i>Site Name :</i></p><h1 style="text-align: center;">$outgoing->site_name</h1></td>
            </tr>
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');

        // -----------------------------------------------------------------------------

        // NON-BREAKING TABLE (nobr="true")

        $tbl = <<<EOD
        <table border="1" cellpadding="1" cellspacing="1">
            <tr style="background-color:green;color:white;">
                <td colspan="7">Material & Equpmant List</td> 
            </tr>
            <tr>
                <td width="15" rowspan="2" align="center;"><b>No.</b></td>
                <td width="217" rowspan="2" align="center"><b>TYPE / NAME OF GOODS</b></td>
                <td width="97" rowspan="2" align="center"><b>MATERIAL NO</b></td>
                <td width="60" colspan="3" align="center"> <b>AMOUNT</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE OUT</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE USE</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE IN</b></td>
            </tr>
            <tr>
                <td align="center">OUT</td>
                <td align="center">USE</td>
                <td align="center">IN</td>
            </tr>
        EOD;

        $no = 1;
        foreach (explode(",", $outgoing->qty_item_info) as $data) {
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 2) as $chunk) {
                    $item = Items::where('no_item', $chunk[0])->first();
                    $noitem = $chunk[0];
                    $tbl .= "<tr>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$no</td>";
                    $tbl .= "<td>$item->name_item</td>";
                    $tbl .= "<td>$chunk[0]</td>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                    $tbl .= "<td></td>";
                    $tbl .= "<td></td>";
                    $tbl .= "<td><table>";
                    foreach (explode(",", $outgoing->brcd_item_info) as $data) {
                        if (preg_match_all($pattern, $data, $matches)) {
                            foreach (array_chunk($matches[1], 3) as $chunk) {
                                if ($chunk[0] == $noitem) {
                                    $tbl .= "<tr>";
                                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                                    $tbl .= "</tr>";
                                }
                            }
                        }
                    }
                    $tbl .= "</table></td>";
                    $tbl .= "<td></td>";
                    $tbl .= "<td></td>";
                    $tbl .= "</tr>";
                    $no++; 
                }
            }
        }
        $tbl .= <<<EOD
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');


        // -----------------------------------------------------------------------------

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="6">Filled When outgoing</td> 
            </tr>
            <tr>
                <td width="233" height="100"><p><i>Condition and Remarks Explanation :</i></p><br>$outgoing->coment</td>
                <td width="135" ><p><i>User :</i></p></td>
                <td width="135" ><p><i>Carried by :</i></p></td>
                <td width="135" ><p><i>Cheked by :</i></p></td>
                </tr>
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');

        //Close and output PDF document
        $pdf::Output($filename, 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }

    public function pdfoutgoingend($id) 
    {
        $outgoingend = OutgoingsEnd::where('id',$id)->first();
        $pattern = "/\(([^)]+)\)/";
    	$filename = "$outgoingend->name_pic.pdf";
    	$pdf = new TCPDF( 'page_units', PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf::SetCreator(PDF_CREATOR);
        $pdf::SetAuthor('Fadhil');
        $pdf::SetTitle('');
        $pdf::SetSubject('');
        $pdf::SetKeywords('TCPDF, PDF');

        // set default header data
        $pdf::SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' ', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf::setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf::setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf::SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf::SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf::SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf::setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
            require_once(dirname(__FILE__).'/lang/eng.php');
            $pdf::setLanguageArray($l);
        }

        // ---------------------------------------------------------


        // add a page
        $pdf::AddPage();


        $pdf::SetFont('times', '', 7);

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="6">Employee's Information</td> 
            </tr>
            <tr>
                <td width="235" height="70"><p><i>Employee Name :</i></p><h1 style="text-align: center;">$outgoingend->name_pic</h1></td>
                <td width="235"><p><i>Curent Date :</i></p><h1 style="text-align: center;">$outgoingend->current_date</h1></td>
                <td width="168" rowspan="2"><p><i>SRM Reservation No.</i></p></td>
            </tr>
            <tr>
                <td height="70"><p><i>Employee ID :</i></p><h1 style="text-align: center;">$outgoingend->id_pic</h1></td>
                <td><p><i>Site Name :</i></p><h1 style="text-align: center;">$outgoingend->site_name</h1></td>
            </tr>
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');

        // -----------------------------------------------------------------------------

        // NON-BREAKING TABLE (nobr="true")

        $tbl = <<<EOD
        <table border="1" cellpadding="1" cellspacing="1">
            <tr style="background-color:green;color:white;">
                <td colspan="7">Material & Equpmant List</td> 
            </tr>
            <tr>
                <td width="15" rowspan="2" align="center;"><b>No.</b></td>
                <td width="217" rowspan="2" align="center"><b>TYPE / NAME OF GOODS</b></td>
                <td width="97" rowspan="2" align="center"><b>MATERIAL NO</b></td>
                <td width="60" colspan="3" align="center"> <b>AMOUNT</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE OUT</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE USE</b></td>
                <td width="80" rowspan="2" align="center"><b>BARCODE IN</b></td>
            </tr>
            <tr>
                <td align="center">OUT</td>
                <td align="center">USE</td>
                <td align="center">IN</td>
            </tr>
        EOD;

        $no = 1;
        foreach (explode(",", $outgoingend->qty_item_info) as $data) {
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 4) as $chunk) {
                    $item = Items::where('no_item', $chunk[0])->first();
                    $noitem = $chunk[0];
                    $tbl .= "<tr>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$no</td>";
                    $tbl .= "<td>$item->name_item</td>";
                    $tbl .= "<td>$chunk[0]</td>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                    $tbl .= "<td>$chunk[2]</td>";
                    $tbl .= "<td>$chunk[3]</td>";
                    $tbl .= "<td><table>";
                    foreach (explode(",", $outgoingend->brcd_item_info_out) as $data) {
                        if (preg_match_all($pattern, $data, $matches)) {
                            foreach (array_chunk($matches[1], 3) as $chunk) {
                                if ($chunk[0] == $noitem) {
                                    $tbl .= "<tr>";
                                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                                    $tbl .= "</tr>";
                                }
                            }
                        }
                    }
                    $tbl .= "</table></td>";
                    $tbl .= "<td><table>";
                    foreach (explode(",", $outgoingend->brcd_item_info_use) as $data) {
                        if (preg_match_all($pattern, $data, $matches)) {
                            foreach (array_chunk($matches[1], 3) as $chunk) {
                                if ($chunk[0] == $noitem) {
                                    $tbl .= "<tr>";
                                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                                    $tbl .= "</tr>";
                                }
                            }
                        }
                    }
                    $tbl .= "</table></td>";
                    $tbl .= "<td><table>";
                    foreach (explode(",", $outgoingend->brcd_item_info_in) as $data) {
                        if (preg_match_all($pattern, $data, $matches)) {
                            foreach (array_chunk($matches[1], 3) as $chunk) {
                                if ($chunk[0] == $noitem) {
                                    $tbl .= "<tr>";
                                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                                    $tbl .= "</tr>";
                                }
                            }
                        }
                    }
                    $tbl .= "</table></td>";
                    $tbl .= "</tr>";
                    $no++; 
                }
            }
        }
        $tbl .= <<<EOD
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');


        // -----------------------------------------------------------------------------

        $tbl = <<<EOD
        <table border="1" cellpadding="1" cellspacing="1">
            <tr style="background-color:green;color:white;">
                <td>Defect Barcod List</td> 
            </tr>
            <tr>
                <td width="20" align="center;"><b>No.</b></td>
                <td width="100" align="center"><b>No. Barcode</b></td>
                <td width="515" align="center"><b>Coment</b></td>
            </tr>
        EOD;

        $no = 1;

        foreach (explode(",", $outgoingend->brcd_item_info_defect) as $data) {
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 3) as $chunk) {
                    $tbl .= "<tr>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$no</td>";
                    $tbl .= "<td>$chunk[0]</td>";
                    $tbl .= "<td style='text-align: center; vertical-align: middle;'>$chunk[1]</td>";
                    $tbl .= "</tr>";
                    $no++;
                }
            }
        }

        $tbl .= <<<EOD
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');


        // // -----------------------------------------------------------------------------

        $tbl = <<<EOD
        <table cellspacing="0" cellpadding="1" border="1" >
            <tr style="background-color:green;color:white;">
                <td colspan="6">Filled When outgoing</td> 
            </tr>
            <tr>
                <td width="233" height="100"><p><i>Condition and Remarks Explanation :</i></p><br>$outgoingend->coment</td>
                <td width="135" ><p><i>User :</i></p></td>
                <td width="135" ><p><i>Carried by :</i></p></td>
                <td width="135" ><p><i>Cheked by :</i></p></td>
                </tr>
        </table>
        EOD;

        $pdf::writeHTML($tbl, true, false, false, false, '');

        //Close and output PDF document
        $pdf::Output($filename, 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
    
}
