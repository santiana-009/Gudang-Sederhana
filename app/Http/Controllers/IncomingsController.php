<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Barcods;
use App\Models\Incomings;
use Illuminate\Support\Arr;
use App\Http\Requests\StoreIncomingsRequest;
use App\Http\Requests\UpdateIncomingsRequest;

class IncomingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('incoming.index',[
            'incomings' => Incomings::orderBy('current_date', 'asc')->filter(request(['search',]))->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Items::orderBy('no_item', 'ASC')->get();

        return view('incoming.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomingsRequest $request)
    {
        $items_in_files = [];
        $brcd_in_files = [];
        $limit = 0;
        $count = 0;

        foreach ($request->no_item as $index => $no_items_item) {
            $dtItem = Items::where('no_item', $no_items_item)->first();

            $qty_items_item = $request->qty_item[$index];
            $po_item_item = $request->po_item[$index];
            $items_in_files[] = "($no_items_item)($qty_items_item)($po_item_item)";

            $ttl_qty_items = intval($dtItem->qty_item) + intval($qty_items_item);

            $dtItem->update([
                'qty_item' => $ttl_qty_items,
            ]);

            if ($dtItem->brcd_item == 1) {
                $limit = $limit + $qty_items_item;

                foreach ($request->no_brcd as $index2 => $no_brcd_items) {
                    if ($count < $limit) {
                        $brcd_in_files[] = "($no_items_item)($no_brcd_items)";

                        Barcods::create([
                            'no_item' => $no_items_item,
                            'po_item' => $po_item_item,
                            'no_brcd' => $no_brcd_items,
                        ]);

                        $request->merge(['no_brcd' => Arr::except($request->no_brcd, [$index2])]);
                        $count++;
                    } else {
                        break;
                    }
                }
            }
            
        }

        Incomings::create([
            'current_date' => $request->current_date,
            'site_name' => $request->site_name,
            'coment' => $request->coment,
            'qty_items_info' => implode(',', $items_in_files),
            'brcd_items_info' => implode(',', $brcd_in_files),
        ]);

        return redirect('/incoming')->with('success', 'New Incoming has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Incomings $incomings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomingsRequest $request, Incomings $incomings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Incomings::where('id', $id)->delete();
        return redirect('/incoming')->with('success', 'Incoming has been deleted!');
    }
}
