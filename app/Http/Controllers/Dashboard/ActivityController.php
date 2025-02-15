<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
//        $status = $request->get('status');
//        $activities = Activity::
//        when($status, function ($query, $status) {
//            return $query->where('status', $status);
//        })->paginate(5);

       $activities = Activity::all();
        return view('Dashboard.Activities.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Dashboard.activities.create');
    }

    /**
     * تخزين النشاط الجديد في قاعدة البيانات
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('activities', 'public');
        }

        Activity::create($data);

        return redirect()->route('activities.index')->with('success', 'Activity created successfully.');
    }



/**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $activity = Activity::findOrFail($id);
//        dd($activity);
        return view('Dashboard.Activities.show',compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);
//        dd($activity);
        return view('Dashboard.Activities.edit',compact('activity'));

    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, Activity $activity)
    {
        // التحقق من البيانات المدخلة
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // الصورة اختيارية
        ]);

        // التحقق مما إذا كان هناك صورة جديدة مرفوعة
        if ($request->hasFile('photo')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($activity->photo) {
                Storage::disk('public')->delete($activity->photo);
            }

            // حفظ الصورة الجديدة
            $validated['photo'] = $request->file('photo')->store('activities', 'public');
        }

        // تحديث بيانات النشاط
        $activity->update($validated);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('activities.index')->with('success', 'Activity updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */


    public function destroy(Activity $activity)
    {
        // حذف الصورة إذا كانت موجودة
        if ($activity->photo) {
            Storage::disk('public')->delete($activity->photo);
        }

        // حذف النشاط من قاعدة البيانات
        $activity->delete();

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('activities.index')->with('success', 'Activity deleted successfully!');
    }

}
