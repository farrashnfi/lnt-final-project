<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $categoryController = new CategoryController;
        $categories = $categoryController->getAll();
        return view('items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->image = $request->image;
        $item->category_id = $request->category_id;
        $item->save();

        return redirect('/items');
    }

    public function edit($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        $categoryController = new CategoryController;
        $categories = $categoryController->getAll();

        return view('items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->image = $request->image;
        $item->category_id = $request->category_id;
        $item->save();

        return redirect('/items');
    }

    public function destroy($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'message' => 'Item not found',
            ], 404);
        }

        $item->delete();

        return redirect('/items');
    }
}
