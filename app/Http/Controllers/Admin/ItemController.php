<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Building;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Building $building)
    {
        $items = $building->items()->get();

        return view('admin.buildings.items.index', compact('items', 'building'));
    }


    public function show(Building $building, Item $item)
    {
        return view('admin.buildings.items.show', compact('building', 'item'));
    }
}
