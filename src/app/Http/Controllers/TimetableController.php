<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    public function index()
    {
        $monday = DB::select('SELECT period, name, teacher, room FROM courses WHERE day = ? ORDER BY period', [1]);
        $required = DB::select('SELECT name, credits FROM courses WHERE required = true');

        return view('timetable', [
            'monday' => $monday,
            'required' => $required,
        ]);
    }
}