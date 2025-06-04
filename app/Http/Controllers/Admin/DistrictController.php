<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\District;

class DistrictController extends Controller
{
    protected $district;

    public function __construct(District $district)
    {
        $this->district = $district;
    }

    public function index()
    {
        $districts = $this->district::latest()->get();
        return view('admin.district.index', compact('districts'));
    }

    public function create()
    {
        return view('admin.district.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->district::create([
            'name' => $request->name,
        ]);

        return redirect()->route('district.index')->with('success', 'District created successfully.');
    }

    public function edit($id)
    {
        $district = $this->district::findOrFail($id);
        return view('admin.district.edit', compact('district'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $district = $this->district::findOrFail($id);
        $district->update([
            'name' => $request->name,
        ]);

        return redirect()->route('district.index')->with('success', 'District updated successfully.');
    }

    public function delete($id)
    {
        $district = $this->district::findOrFail($id);
        $district->delete();

        return redirect()->route('district.index')->with('success', 'District deleted successfully.');
    }
}
