<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = Activity::with('gallery')->get(); // جلب الأنشطة مع الصور المرتبطة بها
        return view('Dashboard.Gallery.index', compact('activities'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = Activity::all(); // جلب جميع الأنشطة لإتاحة الاختيار
        return view('Dashboard.Gallery.create', compact('activities'));
    }

    // حفظ الصور في المعرض
    public function store(Request $request)
    {
        $request->validate([
            'activity_id' => 'required|exists:activities,id',
            'media_url.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5120' // التأكد من أن كل ملف هو صورة
        ]);

        if ($request->hasFile('media_url')) {
            foreach ($request->file('media_url') as $file) {
                // حفظ الصورة في التخزين
                $path = $file->store('gallery', 'public');

                // حفظ البيانات في قاعدة البيانات
                Gallery::create([
                    'activity_id' => $request->activity_id,
                    'media_type' => 'image',
                    'media_url' => $path
                ]);
            }
        }

        return redirect()->route('gallery.index')->with('success', 'Images uploaded successfully.');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    // حذف صورة معينة
    public function destroy(Gallery $gallery)
    {
        // التأكد من وجود الصورة في التخزين قبل حذفها
        if ($gallery->media_url && Storage::disk('public')->exists($gallery->media_url)) {
            Storage::disk('public')->delete($gallery->media_url);
        }

        // حذف السجل من قاعدة البيانات
        $gallery->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully.');
    }


}
