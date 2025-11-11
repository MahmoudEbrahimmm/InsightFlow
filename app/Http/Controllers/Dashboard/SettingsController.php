<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

use App\Models\Setting;
use Illuminate\Http\Request;


class SettingsController extends Controller
{
    public function index()
    {
        $settings = Setting::latest()->get();
        return view('dashboard.settings.index', compact('settings'));
    }

    public function update(Request $request, Setting $setting)
{
    $data = [
        'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        'favicon' => 'nullable|image|mimes:jpg,jpeg,png,svg|max:2048',
        'facebook' => 'nullable|string|max:255',
        'instgram' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'required|string|max:20',
    ];

    foreach (config('app.languages') as $key => $lang) {
        $data[$key . '*.title'] = 'required|string';
        $data[$key . '*.content'] = 'required|string';
        $data[$key . '*.address'] = 'required|string';
    }

    $validateData = $request->validate($data);

    $updateData = $request->except(['logo', 'favicon', '_token']);

    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/website'), $name);
        $updateData['logo'] = 'uploads/website/' . $name;
    }

    if ($request->hasFile('favicon')) {
        $file = $request->file('favicon');
        $name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/website'), $name);
        $updateData['favicon'] = 'uploads/website/' . $name;
    }

    $setting->update($updateData);

    return redirect()->route('settings')->with('success', 'Saved data successfully');
}

}
