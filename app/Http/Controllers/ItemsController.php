<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Http\Requests\StoreItemsRequest;
use App\Http\Requests\UpdateItemsRequest;
use GuzzleHttp\Psr7\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('items.index',[
            'items' => Items::orderBy('name_item', 'asc')->filter(request(['search',]))->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create',[]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreItemsRequest $request)
    {
        $validatedData = $request->validate([
            'name_item' => 'required|string|max:255',
            'type_item' => 'required|string|max:255',
            'no_item' => 'required',
            'qty_item' => 'required',
            'brcd_item'=> 'boolean'
        ]);

        Items::create($validatedData);
        return redirect('/items')->with('success', 'New Item has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Items $items)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($items)
    {
        return view('items.edit',[
            'item' => Items::where('id', $items)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Items::where('id', $id)->delete();
        return redirect('/items')->with('success', 'Items has been deleted!');
    }
}
