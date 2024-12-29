<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Barcods;
use App\Http\Requests\StoreBarcodsRequest;
use App\Http\Requests\UpdateBarcodsRequest;

class BarcodsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBarcodsRequest $request)
    {
        $validatedData = $request->validate([
            'no_item' => 'required|string|max:255',
            'po_item' => 'required|string|max:255',
            'no_brcd' => 'required|string|max:255',
        ]);

        Barcods::create($validatedData);

        return redirect("/barcods/$request->no_item")->with('success', 'New barcode has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show($is)
    {
        return view('barcode.index',[
            'item' => Items::where('no_item', $is)->first(),
            'barcods' => Barcods::where('no_item', $is)->orderBy('no_brcd', 'asc')->filter(request(['search',]))->paginate(15),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barcods $barcods)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarcodsRequest $request, Barcods $barcods)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Barcods::where('id', $id)->first();
        $request = $data->no_item;
        Barcods::where('id', $id)->delete();
        return redirect("/barcods/$request")->with('success', 'Barcod has been deleted!');
    }
}
