<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clinic;
use App\Models\Comment;

class ClinicController extends Controller
{
    public function searchClinic(Request $request, Clinic $clinic)
    {
        $pref_lists = Clinic::groupBy('pref')->get(['pref']);

        return view('welcome', [
            'pref_lists' => $pref_lists
        ]);
    }

    public function index_pref(Request $request, Clinic $clinic)
    {
        $search_pref = $request->input('pref_code');

        $city_lists = Clinic::groupBy('city')
            ->where('pref', $search_pref)
            ->get(['city']);

        $query = Clinic::query();
        $query->where('pref', $search_pref)
              ->with('comments')
              ->with('images')
              ->get();
        $all_clinic = $query->paginate(2);

        return view('clinics.index_pref', [
            'all_clinic' => $all_clinic,
            'city_lists' => $city_lists
            //'pref_lists' => $pref_lists
        ]);
    }

    public function index_city(Request $request, Clinic $clinic)
    {
        $search_pref = $request->input('pref_code');
        $search_city = $request->input('city_code');

        $city_lists = Clinic::groupBy('city')
            ->where('pref', $search_pref)
            ->get(['city']);

        $query = Clinic::query();
        $query->where('city', $search_city)
              ->with('comments')
              ->with('images')
              ->get();
        $all_clinic = $query->paginate(1);

        return view('clinics.index_pref', [
            'all_clinic' => $all_clinic,
            'city_lists' => $city_lists
            //'pref_lists' => $pref_lists
        ]);
    }
}
