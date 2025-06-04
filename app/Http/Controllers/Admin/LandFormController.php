<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Land;
use App\Models\Thana;
use App\Models\District;
use Barryvdh\DomPDF\Facade\Pdf;

class LandFormController extends Controller
{
    protected $district;
    protected $thana;

    public function __construct(District $district, Thana $thana)
    {
        $this->district = $district;
        $this->thana = $thana;
    }
public function downloadLandPdf()
{
    $pdf = Pdf::loadView('admin.land.show'); // ঠিক View path দিন
    $pdf->setPaper('A4', 'portrait');
    return $pdf->download('land-receipt.pdf');
}

    public function show($id)
    {
        $land = Land::findOrFail($id);
        return view('admin.land.show', compact('land'));
    }

    public function index()
    {
        $lands = Land::with('district', 'thana')->latest()->get();
        return view('admin.land.index', compact('lands'));
    }

    public function create()
    {
        $districts = $this->district::all();
        $thanas = $this->thana::all();
        return view('admin.land.add', compact('districts', 'thanas'));
    }
    public function getThana($district_id)
    {
        $thanas = $this->thana->where('district_id', $district_id)->get();

        return response()->json($thanas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'line_no' => 'required|array',
            'line_no.*' => 'required|string|max:255',
            'land_class' => 'required|array',
            'land_class.*' => 'required|string|max:255',
            'land_amount' => 'required|array',
            'land_amount.*' => 'required|numeric',
        ]);

        $land = new Land();
        $land->owner_name = $request->owner_name;
        $land->owner_share = $request->owner_share;
        $land->land_office = $request->land_office;
        $land->mouja = $request->mouja;
        $land->district_id = $request->district_id;
        $land->thana_id = $request->thana_id;
        $land->holding = $request->holding;
        $land->khatian = $request->khatian;
        $land->{'3YearsUpBokeya'} = $request->input('3YearsUpBokeya');
        $land->{'3YearsBokeya'} = $request->input('3YearsBokeya');
        $land->bokeyaAmount = $request->bokeyaAmount;
        $land->hallDabi = $request->hallDabi;
        $land->totalDabi = $request->totalDabi;
        $land->totalCollection = $request->totalCollection;
        $land->totalDue = $request->totalDue;
        $land->comments = $request->comments;
        $land->session = $request->session;
        $land->chalan = $request->chalan;

        // Store arrays as JSON
        $land->line_no = json_encode($request->line_no);
        $land->land_class = json_encode($request->land_class);
        $land->land_amount = json_encode($request->land_amount);

        $land->save();

        return redirect()->route('land.index')->with('success', 'Land record added successfully.');
    }

    public function edit($id)
    {
        $districts = $this->district::all();
        $thanas = $this->thana::all();
        $land = Land::findOrFail($id);

        return view('admin.land.edit', compact('land', 'districts', 'thanas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'owner_name' => 'required|string|max:255',
            'district_id' => 'required|exists:districts,id',
            'thana_id' => 'required|exists:thanas,id',
            'line_no' => 'required|array',
            'line_no.*' => 'required|string|max:255',
            'land_class' => 'required|array',
            'land_class.*' => 'required|string|max:255',
            'land_amount' => 'required|array',
            'land_amount.*' => 'required|numeric',
            // যদি চাইলে এখানে অন্য ফিল্ডগুলোও validate করতে পারেন
        ]);

        $land = Land::findOrFail($id);

        // ম্যানুয়ালি ফিল্ডগুলো সেট করা (fill ছাড়া)
        $land->owner_name = $request->owner_name;
        $land->owner_share = $request->owner_share;
        $land->land_office = $request->land_office;
        $land->mouja = $request->mouja;
        $land->district_id = $request->district_id;
        $land->thana_id = $request->thana_id;
        $land->holding = $request->holding;
        $land->khatian = $request->khatian;

        $land->{'3YearsUpBokeya'} = $request->input('3YearsUpBokeya');
        $land->{'3YearsBokeya'} = $request->input('3YearsBokeya');

        $land->bokeyaAmount = $request->bokeyaAmount;
        $land->hallDabi = $request->hallDabi;
        $land->totalDabi = $request->totalDabi;
        $land->totalCollection = $request->totalCollection;
        $land->totalDue = $request->totalDue;
        $land->comments = $request->comments;
        $land->session = $request->session;
        $land->chalan = $request->chalan;

        // JSON encode arrays
        $land->line_no = json_encode($request->line_no);
        $land->land_class = json_encode($request->land_class);
        $land->land_amount = json_encode($request->land_amount);

        $land->save();

        return redirect()->route('land.index')->with('success', 'Land record updated successfully.');
    }

    public function destroy($id)
    {
        $land = Land::findOrFail($id);
        $land->delete();

        return redirect()->back()->with('success', 'Land record deleted successfully.');
    }
}
