<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Thana;
use App\Models\District;
use Illuminate\Http\Request;

class ThanaController extends Controller
{
    public function index()
    {
        $thanas = Thana::with('district')->latest()->get();
        return view('admin.thana.index', compact('thanas'));
    }

    public function create()
    {
        $districts = District::all();
        return view('admin.thana.add', compact('districts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|integer|exists:districts,id',
            'name' => 'required|array|min:1',
            'name.*' => 'required|string|max:255',
        ]);

        foreach ($request->name as $thanaName) {
            Thana::create([
                'district_id' => $request->district_id,
                'name' => $thanaName,
            ]);
        }

        return redirect()->route('thana.index')->with('success', 'Thanas created successfully.');
    }

    public function edit($id)
    {
        $thana = Thana::findOrFail($id);
        $districts = District::all();
        return view('admin.thana.edit', compact('thana', 'districts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'name' => 'required|string|max:255',
        ]);

        $thana = Thana::findOrFail($id);
        $thana->update([
            'district_id' => $request->district_id,
            'name' => $request->name,
        ]);

        return redirect()->route('thana.index')->with('success', 'Thana updated successfully.');
    }

    public function delete($id)
    {
        $thana = Thana::findOrFail($id);
        $thana->delete();

        return redirect()->route('thana.index')->with('success', 'Thana deleted successfully.');
    }
}
