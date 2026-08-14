<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocietyBlockPost;
use App\Http\Requests\StoreSocietyPost;
use App\Society;
use App\SocietyBlock;

class SocietyController extends Controller
{
    public function index()
    {
        $societies = Society::orderBy('city')->orderBy('name')->paginate(30);

        return view('admin.societies.index', compact('societies'));
    }

    public function create()
    {
        return view('admin.societies.create');
    }

    public function store(StoreSocietyPost $request)
    {
        Society::create($request->validated());

        return redirect()->route('admin.societies.index')->with('success', 'Society created.');
    }

    public function edit(Society $society)
    {
        $blocks = $society->blocks()->orderBy('name')->get();

        return view('admin.societies.edit', compact('society', 'blocks'));
    }

    public function storeBlock(StoreSocietyBlockPost $request, Society $society)
    {
        $society->blocks()->create($request->validated());

        return redirect()->route('admin.societies.edit', $society)->with('success', 'Block added.');
    }

    public function destroyBlock(Society $society, SocietyBlock $block)
    {
        $block->delete();

        return redirect()->route('admin.societies.edit', $society)->with('success', 'Block deleted.');
    }

    public function toggleBlockStatus(Society $society, SocietyBlock $block)
    {
        $block->update(['status' => $block->status ? 0 : 1]);

        return redirect()->route('admin.societies.edit', $society)->with('success', 'Block status updated.');
    }

    public function update(StoreSocietyPost $request, Society $society)
    {
        $society->update($request->validated());

        return redirect()->route('admin.societies.index')->with('success', 'Society updated.');
    }

    public function destroy(Society $society)
    {
        $society->delete();

        return redirect()->route('admin.societies.index')->with('success', 'Society deleted.');
    }

    public function toggleStatus(Society $society)
    {
        $society->update(['status' => $society->status ? 0 : 1]);

        return redirect()->back()->with('success', 'Society status updated.');
    }
}
