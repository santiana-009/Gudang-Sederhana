<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Barcods;
use App\Models\TypeItems;
use Illuminate\Http\Request;

class GetDataController extends Controller
{
    public function getName(Request $request)
    {
        $no_item = $request->input('no_item');

        $name = Items::where('no_item', $no_item)->value('name_item');

        return response()->json($name);
    }

    public function getEnumValue(Request $request)
    {
        $no_item = $request->input('no_item');

        $name = Items::where('no_item', $no_item)->value('brcd_item');

        return response()->json($name);
    }
    
    public function getMaxQty(Request $request)
    {
        $no_item = $request->input('no_item');

        $name = Items::where('no_item', $no_item)->value('qty_item');

        return response()->json($name);
    }

    public function select_items()
    {
        $data = Items::orderBy('no_item', 'asc')->where('no_item', 'LIKE', '%' . request('q') . '%')->paginate();

        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = [
                'id' => $item->no_item,
                'text' => $item->no_item,
            ];
        }

        return response()->json(['results' => $formattedData]);
    }


    public function brcd_items(Request $request)
    {
        $id = $request->input('no_item');

        $data = Barcods::orderBy('no_brcd', 'asc')->where('no_item', $id)->where('no_brcd', 'LIKE', '%' . request('q') . '%')->paginate();

        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = [
                'id' => $item->no_brcd,
                'text' => $item->no_brcd,
            ];
        }
        return response()->json($formattedData);
    }


    public function type_items()
    {
        $data = TypeItems::orderBy('name', 'asc')->where('name', 'LIKE', '%' . request('q') . '%')->paginate();

        $formattedData = [];
        foreach ($data as $item) {
            $formattedData[] = [
                'id' => $item->id,
                'text' => $item->name,
            ];
        }

        return response()->json(['results' => $formattedData]);
    }
}
