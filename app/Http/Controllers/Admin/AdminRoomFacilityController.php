<?php

namespace App\Http\Controllers\Admin;

use App\Models\Facility;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminRoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Fasilitas Kamar';
        $room_facilities = Facility::where('facility_type', 'room')->latest()->paginate(5);

        return view('admin.room-facilities.index', compact('title', 'room_facilities'))
        ->with('i', (request()->input('page', 1) - 1) * 5);;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create | Fasilitas Kamar';

        return view('admin.room-facilities.create', compact('title'));
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

        $validatedData['facility_type'] = 'room';

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Facility::create($validatedData);

        return redirect('/dashboard/room-facilities')->with('success', 'Data Fasilitas Kamar Ditambah');
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
    public function edit(Facility $room_facility)
    {
        $title = 'Edit | Fasilitas Kamar';

        return view('admin.room-facilities.edit', compact('title', 'room_facility'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facility $room_facility)
    {
        $rules = [
            'facility_name' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        $validatedData['facility_type'] = 'room';

        if ($request->file('image')) {
            if ($room_facility->image) {
                Storage::delete('uploaded-images/' . $room_facility->image);
            }

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Facility::where('id', $room_facility->id)->update($validatedData);

        return redirect('/dashboard/room-facilities')->with('success', 'Data Fasilitas Kamar Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facility $room_facility)
    {
        if ($room_facility->image) {
            Storage::delete('uploaded-images/' . $room_facility->image);
        }

        Facility::destroy($room_facility->id);

        return redirect('/dashboard/room-facilities')->with('success', 'Data Fasilitas Kamar Terhapus');
    }
}
