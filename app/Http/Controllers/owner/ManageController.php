<?php

namespace App\Http\Controllers\owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Field;
use App\Models\FieldChild;

class ManageController extends Controller
{


    public function getFieldDetails(Request $request, $id) {
        // Fetch field details based on the $id
        $field_child = \App\Models\FieldChild::where('id_field', $id)
            ->select('id','name_field_child','type_field_child','avt', 'price', 'status')
            ->get();    
        return response()->json($field_child);
    }
    public function getNameField(Request $request, $id) {
        // Fetch field details based on the $id
        $field = \App\Models\Field::where('id', $id)
            ->select('name_field')
            ->get();   
        return response()->json($field);
    }
    
}
?>
