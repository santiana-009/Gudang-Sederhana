<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Barcods;
use App\Models\Outgoings;
use App\Http\Requests\StoreOutgoingsRequest;
use App\Http\Requests\UpdateOutgoingsRequest;

class OutgoingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('outgoing.index',[
            'outgoings' => Outgoings::orderBy('current_date', 'asc')->filter(request(['search',]))->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outgoing.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOutgoingsRequest $request)
    {
        $items_in_file = [];
        $brcd_in_file = [];

        foreach ($request->no_items as $index => $no_items_item) {
            $dtItems = Items::where('no_item', $no_items_item)->first();

            $qty_items_item = $request->qty_items[$index];
            $ttl_qty = intval($dtItems->qty_item) - intval($qty_items_item);
            $items_in_file[] = "($no_items_item)($qty_items_item)";

            $dtItems->update([
                'qty_item' => $ttl_qty,
            ]);

        }

        if($request->no_brcds)  {
            foreach ($request->no_brcds as $index2 => $no_brcd_item) {
                $dtBRCD = Barcods::where('no_brcd', $no_brcd_item)->first();
                $brcd_in_file[] = "($dtBRCD->no_item)($no_brcd_item)($dtBRCD->po_item)";
                Barcods::where('no_brcd', $no_brcd_item)->delete();
            }
        }

        $intOut = [
            'name_pic' => $request->name_pic,
            'id_pic' => $request->id_pic,
            'current_date' => $request->current_date,
            'site_name' => $request->site_name,
            'coment' => $request->coment,
            'qty_item_info' => implode(',', $items_in_file),
            'brcd_item_info' => implode(',', $brcd_in_file),
        ];

        Outgoings::insert($intOut);

        return redirect('/outgoing')->with('success', 'New Outgoing has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Outgoings $outgoings)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outgoings $outgoings)
    {
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

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOutgoingsRequest $request, Outgoings $outgoings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Outgoings::where('id', $id)->delete();
        return redirect('/outgoing')->with('success', 'Outgoing has been deleted!');
    }
}
