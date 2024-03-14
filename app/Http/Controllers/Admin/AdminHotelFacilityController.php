<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminHotelFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Fasilitas Hotel';
        $hotel_facilities = Facility::where('facility_type', 'hotel')->latest()->paginate(5);

        return view('admin.hotel-facilities.index', compact('title', 'hotel_facilities'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create | Fasilitas Hotel';

        return view('admin.hotel-facilities.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'facility_name' => 'required|max:255',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'hotel';

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Facility::create($validatedData);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Data Fasilitas Hotel ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facility $hotel_facility)
    {
        $title = 'Edit | Fasilitas Hotel';

        return view('admin.hotel-facilities.edit', compact('title', 'hotel_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $hotel_facility)
    {
        $rules = [
            'facility_name' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'hotel';

        if ($request->file('image')) {
            if ($hotel_facility->image) {
                Storage::delete('uploaded-images/' . $hotel_facility->image);
            }

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Facility::where('id', $hotel_facility->id)->update($validatedData);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Data Fasilitas Hotel Data Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $hotel_facility)
    {
        if ($hotel_facility->image) {
            Storage::delete('uploaded-images/' . $hotel_facility->image);
        }

        Facility::destroy($hotel_facility->id);

        return redirect('/dashboard/hotel-facilities')->with('success', 'Data Fasiitas Hotel Data Terhapus');
    }
}
