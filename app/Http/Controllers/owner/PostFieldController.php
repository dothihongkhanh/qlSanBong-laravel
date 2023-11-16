<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\FieldChild;

class PostFieldController extends Controller
{
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'nameField' => 'required|string',
            'QuanHuyen' => 'required|exists:districts,id',
            'PhuongXa' => 'required|exists:sub_districts,id',
            'address' => 'required|string',
            'location' => 'url',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'nameFieldChild.*' => 'required|string',
            'typeFieldChild.*' => 'required|in:san5,san7,san11',
            'price.*' => 'required|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
            'time_open' => 'required|string',
            'time_close' => 'required|string',
        ]);

        // Create the main field entry
        $field = new Field([
            'name_field' => $request->input('nameField'),
            'id_sub_district' => $request->input('PhuongXa'),
            'description' => $request->input('description'),
            'address' => $request->input('address'),
            'locate' => $request->input('location'),
            'time_open' => $request->input('time_open'),
            'time_close' => $request->input('time_close'),
        ]);

        // Upload and save main field image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('field_images', 'public');
            $field->avt = $imagePath;
        }

        $field->save();

        // Create child field entries
        foreach ($request->input('nameFieldChild') as $key => $nameFieldChild) {
            $childField = new FieldChild([
                'id_field' => $field->id,
                'name_field_child' => $nameFieldChild,
                'type_field_child' => $request->input('typeFieldChild.' . $key),
                'price' => $request->input('price.' . $key),
            ]);

            // Upload and save child field image
            if ($request->hasFile('image.' . $key)) {
                $imagePathChild = $request->file('image.' . $key)->store('field_child_images', 'public');
                $childField->avt = $imagePathChild;
            }

            $childField->save();
        }

        return redirect()->back()->with('success', 'Sân bóng đã được đăng thành công!');
    }
}
