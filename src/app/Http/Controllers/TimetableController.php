<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TimetableController extends Controller
{
    // courses テーブルの day（1〜5）と、画面に出す曜日の名前の対応
    private array $dayNames = [1 => '月', 2 => '火', 3 => '水', 4 => '木', 5 => '金'];

    public function index()
    {
        $courses = DB::select('select * from courses order by day, period, code');

        return view('timetable', [
            'title' => '時間割',
            'dayNames' => $this->dayNames,
            'courses' => $courses,
        ]);
    }
}
