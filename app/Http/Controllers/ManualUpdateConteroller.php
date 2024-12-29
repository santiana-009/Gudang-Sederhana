<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\User;
use Illuminate\Http\Request;

class ManualUpdateConteroller extends Controller
{
    public function updatedataitem(Request $request){
        $dtitem = Items::where('name_item', $request->name_item)->first();

        $brcd_item = $request->brcd_item;
        
        if($brcd_item == null){
            $brcd_item = 0;
        }

        $dtitem->update([
            'name_item' => $request->name_item,
            'type_item' => $request->type_item,
            'no_item' => $request->no_item,
            'qty_item' => $request->qty_item,
            'brcd_item' => $brcd_item,
        ]);

        return redirect('/items')->with('success', 'Data Item has been change!');
    }

    public function updatedatauser(Request $request){
        $dtitem = User::where('id', $request->id)->first();

        $dtitem->update([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect('/user')->with('success', 'Data User has been change!');
    }
}
