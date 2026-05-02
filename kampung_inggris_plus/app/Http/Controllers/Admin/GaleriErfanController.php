<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriErfan;
use App\Models\GaleriErfanImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriErfanController extends Controller
{
    public function index()
    {
        $galeries = GaleriErfan::withCount('images')->latest()->paginate(10);
        return view('admin.galeri_erfan.index', compact('galeries'));
    }

    public function create()
    {
        return view('admin.galeri_erfan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'event_date' => 'nullable|date',
            'status'     => 'required|boolean',
            'images.*'   => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $galeri = GaleriErfan::create([
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'status'      => $request->status,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('galeri_erfan', 'public');
                $galeri->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.galeri-erfan.index')->with('success', 'Galeri Erfan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $galeri = GaleriErfan::with('images')->findOrFail($id);
        return view('admin.galeri_erfan.show', compact('galeri'));
    }

    public function edit($id)
    {
        $galeri = GaleriErfan::with('images')->findOrFail($id);
        return view('admin.galeri_erfan.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = GaleriErfan::findOrFail($id);

        $request->validate([
            'title'      => 'required|string|max:255',
            'description'=> 'nullable|string',
            'event_date' => 'nullable|date',
            'status'     => 'required|boolean',
            'images.*'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $galeri->update([
            'title'       => $request->title,
            'description' => $request->description,
            'event_date'  => $request->event_date,
            'status'      => $request->status,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('galeri_erfan', 'public');
                $galeri->images()->create(['image_path' => $path]);
            }
        }

        return redirect()->route('admin.galeri-erfan.index')->with('success', 'Galeri Erfan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = GaleriErfan::with('images')->findOrFail($id);

        foreach ($galeri->images as $image) {
            if (Storage::disk('public')->exists($image->image_path)) {
                Storage::disk('public')->delete($image->image_path);
            }
            $image->delete();
        }

        $galeri->delete();

        return redirect()->route('admin.galeri-erfan.index')->with('success', 'Galeri Erfan berhasil dihapus.');
    }

    public function destroyImage($id)
    {
        $image = GaleriErfanImage::findOrFail($id);

        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
