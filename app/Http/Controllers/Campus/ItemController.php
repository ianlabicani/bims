<?php

namespace App\Http\Controllers\Campus;

use App\Http\Controllers\Controller;
use App\Models\Building;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Building $building)
    {
        $items = $building->items()->with('room')->paginate(15);

        return view('campus.buildings.items.index', compact('items', 'building'));
    }

    public function create(Building $building)
    {
        return view('campus.buildings.items.form', compact('building'));
    }

    public function store(Request $request, Building $building)
    {
        $validated = $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'serial_number' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'acquisition_cost' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'inventoried_at' => 'required|date',
            'acquired_at' => 'required|date',
            'accountable_officer' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $building->items()->create($validated);

        return redirect()->route('campus.buildings.items.index', $building)->with('success', 'Item created successfully.');
    }

    public function show(Building $building, Item $item)
    {
        return view('campus.buildings.items.show', compact('building', 'item'));
    }

    public function edit(Building $building, Item $item)
    {
        return view('campus.buildings.items.form', compact('building', 'item'));
    }

    public function update(Request $request, Building $building, Item $item)
    {
        $validated = $request->validate([
            'room_id' => 'nullable|exists:rooms,id',
            'serial_number' => 'nullable|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'acquisition_cost' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'inventoried_at' => 'required|date',
            'acquired_at' => 'required|date',
            'accountable_officer' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $item->update($validated);

        return redirect()->route('campus.buildings.items.show', [$building, $item])->with('success', 'Item updated successfully.');
    }

    public function destroy(Building $building, Item $item)
    {
        $item->delete();

        return redirect()->route('campus.buildings.items.index', $building)->with('success', 'Item deleted successfully.');
    }
}
