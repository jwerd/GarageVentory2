<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;

class ItemsController extends Controller
{
    public function index()
    {
        return Inertia::render('Items/Index', [
            'filters' => Request::all('search', 'trashed'),
            'items' => Auth::user()->account->items()
                ->orderBy('name')
                ->filter(Request::only('search', 'trashed'))
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($item) => $this->data($item)),
        ]);
    }

    public function create()
    {
        return Inertia::render('Items/Create');
    }

    public function store(ItemRequest $request)
    {
        Auth::user()->account->organizations()->create(
            $request->validated()
        );

        return Redirect::route('organizations')->with('success', 'Organization created.');
    }

    public function edit(Item $item)
    {
        return Inertia::render('Items/Edit', ['item' => $this->data($item)]);
    }

    public function update(Item $item, ItemRequest $request)
    {
        $organization->update(
            $request->validated()
        );

        return Redirect::back()->with('success', 'Organization updated.');
    }

    public function destroy(Item $item)
    {
        $item->delete();

        return Redirect::back()->with('success', 'Item deleted.');
    }

    public function restore(Item $item)
    {
        $item->restore();

        return Redirect::back()->with('success', 'Item restored.');
    }

    protected function data($item) : array
    {
        return [
            'id' => $item->id,
            'name' => $item->name,
            'dimension' => $item->dimension,
            'price' => $item->price,
        ];
    }
}
