<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Barcods;
use App\Models\Outgoings;
use App\Models\OutgoingsEnd;
use Illuminate\Http\Request;

class EndeController extends Controller
{
    public function index()
    {
        return view('outgoing_end.index',[
            'outgoing_ends' => OutgoingsEnd::orderBy('current_date', 'asc')->filter(request(['search',]))->paginate(15),
        ]);
    }
    public function create($id)
    {
        $outgoings = Outgoings::where('id', $id)->first();
        $item = $outgoings->qty_item_info;
        $items = [];
        $pattern = "/\(([^)]+)\)/";

        foreach (explode(",", $item) as $data) {
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 2) as $chunk) {
                    $dts = Items::where('no_item', $chunk[0])->first();
                    $items[] = "($chunk[0])($dts->name_item)($chunk[1])($dts->brcd_item)";
                }
            }
        }

        return view('outgoing_end.create', [
            'outgoings' => $outgoings,
            'items' => implode('|-|', $items)
        ]);
    }

    public function adddata(Request $request)
    {
        $outgoings = Outgoings::where('id', $request->id_data)->first();
        $amt_use = $request->amt_use;
        $items_in_files = [];
        $brcds_defect_files = [];
        $pattern = "/\(([^)]+)\)/";

        foreach (explode(",", $outgoings->qty_item_info) as $index => $data){
            if (preg_match_all($pattern, $data, $matches)) {
                foreach (array_chunk($matches[1], 2) as $chunk) {
                    $result_amt=intval($chunk[1])-intval($amt_use[$index]);
                    $dts = Items::where('no_item', $chunk[0])->first();
                    $ttl_qty=intval($dts->qty_item)+intval($result_amt);
                    $dts->update([
                        'qty_item' =>  $ttl_qty,
                    ]);
                    $items_in_files[]="($chunk[0])($chunk[1])($amt_use[$index])($result_amt)";
                    
                }
            }

        }

        $datas = explode(",", $outgoings->brcd_item_info);

        $brcd_use = $request->selectOption;
        if($brcd_use){
            $brcd_in = array_diff($datas,$brcd_use);
            foreach ($brcd_in as $brcd_ins) {
                if (preg_match_all($pattern, $brcd_ins, $matches)) {
                    foreach (array_chunk($matches[1], 3) as $chunk) {
                        Barcods::create([
                            'no_item' => $chunk[0],
                            'no_brcd' => $chunk[1],
                            'po_item' => $chunk[2],
                        ]);
                    }
                }
            }
        } else {
            $brcd_in = $outgoings->brcd_item_info;
            if (preg_match_all($pattern, $brcd_in, $matches)) {
                foreach (array_chunk($matches[1], 3) as $chunk) {
                    Barcods::create([
                        'no_item' => $chunk[0],
                        'no_brcd' => $chunk[1],
                        'po_item' => $chunk[2],
                    ]);
                }
            }
        }

        $no_brcd_defct = $request->no_brcd_defct;
        $coment_brcd_defct = $request->coment_brcd_defct;

        if($no_brcd_defct){
            foreach ($no_brcd_defct as $j => $no_brcd_defcti){
               $brcds_defect_files[] = "($no_brcd_defcti)($coment_brcd_defct[$j])";
            }
        }

        OutgoingsEnd::create([
            'name_pic' => $outgoings->name_pic,
            'id_pic' => $outgoings->id_pic,
            'current_date' => $outgoings->current_date,
            'site_name' => $outgoings->site_name,
            'coment' => $request->coment,
            'qty_item_info' => implode(',', $items_in_files),
            'brcd_item_info_out' => $outgoings->brcd_item_info,
            'brcd_item_info_use' => is_array($brcd_use) ? implode(',', $brcd_use) : $brcd_use,
            'brcd_item_info_in' => is_array($brcd_in) ? implode(',', $brcd_in) : $brcd_in,
            'brcd_item_info_defect' => implode(',', $brcds_defect_files),
        ]);

        return redirect('/outgoing_end')->with('success', 'New Outgoing End has been added!');

    }

    public function delete($id)
    {
        OutgoingsEnd::where('id', $id)->delete();
        return redirect('/outgoing_end')->with('success', 'Outgoing END has been deleted!');
    }
    
}
