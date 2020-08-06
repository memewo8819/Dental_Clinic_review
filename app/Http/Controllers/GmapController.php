<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Clinic;
use App\Models\Comment;

class GmapController extends Controller
{
    public function view(Clinic $clinic)
    {
        $gmap_clinic = Clinic::findOrFail($clinic->id);
        dd($gmap_clinic);

        return view('clinics.show', [
            'gmap_clinic' => $gmap_clinic
        ]);
    }
}
