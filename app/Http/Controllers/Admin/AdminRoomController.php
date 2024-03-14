<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AdminRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Data Kamar';
        $rooms = Room::latest()->paginate(5);

        return view('admin.rooms.index', compact('title', 'rooms'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create | Data Kamar';
        $facilities = Facility::all()->where('facility_type', 'room');

        return view('admin.rooms.create', compact('title', 'facilities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'room_type' => 'required|max:255',
            'number_of_rooms' => 'required|numeric',
            'facility_id' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Room::create($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'Data Kamar Ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $title = 'Detail | Data Kamar';

        return view('admin.rooms.show', compact('title', 'room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $title = 'Edit | Data Kamar';
        $facilities = Facility::all()->where('facility_type', 'room');

        return view('admin.rooms.edit', compact('title', 'room', 'facilities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        
        $rules = [
            'room_type' => 'required|max:255',
            'number_of_rooms' => 'required|numeric',
            'facility_id' => 'required',
            'description' => 'required',
            'image' => 'image|file|max:3024',
        ];

        $validatedData = $request->validate($rules);

        if ($request->file('image')) {
            if ($room->image) {
                Storage::delete('uploaded-images/' . $room->image);
            }

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Mengambil nama file asli

            // Simpan gambar dengan nama yang sama seperti aslinya
            $image->storeAs('uploaded-images', $imageName);

            $validatedData['image'] = $imageName;
        }

        Room::where('id', $room->id)->update($validatedData);

        return redirect('/dashboard/rooms')->with('success', 'Data Kamar Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        if ($room->image) {
            Storage::delete('uploaded-images/' . $room->image);
        }

        Room::destroy($room->id);

        return redirect('/dashboard/rooms')->with('success', 'Data Kamar Terhapus');
    }
}
