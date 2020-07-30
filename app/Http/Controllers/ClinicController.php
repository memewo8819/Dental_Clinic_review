<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Comment;

class ClinicController extends Controller
{
    public function searchClinic(Clinic $clinic)
    {
        $clinics = Clinic::all();

        $query = Clinic::query();
        $query->where('pref', '愛知県')->get();
        $result = $query->paginate(10);

        return view('welcome', [
            'clinics' => $clinics,
            'result' => $result,
        ]);
    }
}
