<?php

namespace App\Http\Controllers;

use App\Models\TypeItems;
use App\Http\Requests\StoreTypeItemsRequest;
use App\Http\Requests\UpdateTypeItemsRequest;

class TypeItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('typeitem.index', [
            'typeitems' => TypeItems::orderBy('name', 'asc')->filter(request(['search']))->paginate(10),
        ]);
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
    public function store(StoreTypeItemsRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        TypeItems::create($validatedData);

        return redirect('/typeitem')->with('success', 'New Type has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TypeItems $typeItems)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TypeItems $typeItems)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTypeItemsRequest $request, TypeItems $typeItems)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        TypeItems::where('id',$id)->delete();
        return redirect('/typeitem')->with('success', 'typeitems has been deleted!');
    }
}
