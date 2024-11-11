<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($group_id)
    {
        $group = Group::find($group_id);
        return view('school.group_details_interface', compact('group'));
    }

    public function statistics($group_id)
    {
        $group = Group::find($group_id);
        return view('school.group_statistics_interface', compact('group'));
    }

    public function getAttendancesByGroup(Request $request){
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];
        // $attendances = Group::where('id', $request['groupId'])
        // ->with(['students.attendances' => function ($query) use ($startDate, $endDate) {
        //     $query->whereBetween('fecha', [$startDate, $endDate]);
        // }])
        // ->get();

        // $attendancesPerMonth = Group::where('id', $request['groupId'])
        // ->with(['students.attendances' => function ($query) use ($startDate, $endDate) {
        //     $query->whereBetween('fecha', [$startDate, $endDate])
        //           ->select(DB::raw('YEAR(fecha) as year'), DB::raw('MONTH(fecha) as month'), DB::raw('COUNT(*) as total'))
        //           ->groupBy('year', 'month');
        // }])
        // ->get();

        $asistenciasPorMes = Attendance::join('students', 'attendances.student_id', '=', 'students.id')
        ->join('groups', 'students.group_id', '=', 'groups.id')
        ->where('groups.id', $request['groupId'])
        ->whereBetween('attendances.fecha', [$startDate, $endDate])
        // ->whereBetween('attendances.fecha', ['2023-11-04', '2024-07-06'])
        ->select(
            DB::raw('YEAR(attendances.fecha) as year'),
            DB::raw('MONTHNAME(attendances.fecha) as month'),
            DB::raw('COUNT(attendances.id) as total')
        )
        ->groupBy('year', 'month')
        ->orderBy('year')
        ->orderBy('month')
        ->get();

    return $asistenciasPorMes;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
