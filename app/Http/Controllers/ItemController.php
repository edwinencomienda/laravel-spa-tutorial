<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();

        return ItemResource::collection($items);
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $item = Item::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        return new ItemResource($item);
    }

    public function update(Request $request, Item $item)
    {
        $this->validateRequest($request);

        $item->fill([
            'name' => $request->name,
            'price' => $request->price,
        ]);
        $item->save();

        return new ItemResource($item);
    }

    public function show(Item $item)
    {
        return new ItemResource($item);
    }

    public function delete(Item $item)
    {
        $item->delete();

        return response()->noContent();
    }
}
