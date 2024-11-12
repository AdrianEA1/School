<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\DB;


class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $students = Student::where('user_id', $user_id)->withCount('reports')->get();
        // $reporCount = Report::where('student_id', $students -> id)->count();
        //$user = User::find($user_id);

        return view('school.tutor_interface', compact('students'));
    }

    public function statistics()
    {

        return view('school.student_statistics_interface');
    }

    public function getAttendances($student_id)
    {
        $attendances = Attendance::where('student_id', $student_id)->get();
        return response()->json($attendances);
    }

    public function reports($student_id)
    {
        $reports = Report::where('student_id', $student_id)->get();
        //$student = Student::find($student_id);
        //$user = User::find($student->user_id);

        return view('school.tutor_reports_interface', compact('reports'));
    }

    public function statistics($student_id)
    {
        $attendances = Attendance::where('student_id', $student_id)->get();
        return view('school.prueba', compact('attendances'));
    }


    public function getAttendancesChart(Request $request){
        $startDate = $request['startDate'];
        $endDate = $request['endDate'];

        $asistenciasPorMes = Attendance::query()
        ->join('students', 'attendances.student_id', '=', 'students.id')
        ->where('students.id', $request['student_id'])
        ->whereBetween('attendances.fecha', [$startDate, $endDate])
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

    public function makeReport(Request $request){
        // require ('../../public/fpdf186/fpdf.php');
        // require('../../public/fpdf186/fpdf.php');
        require_once(public_path('fpdf186/fpdf.php'));

        // $imagenUrl = $request->input('img');
        // $student = $request->input('datos');

        $student = $_POST['datos'];
        $name = $_POST['studentName'];
        // return $student;
        // dd($student);

        $pdf = new \FPDF();
        $pdf -> AddPage();
        $pdf -> SetFont('Arial', 'B', 16);
        // HEAD
        $pdf->Cell(80);
        $pdf -> Cell(30, 30, ' Escuela Secundaria Monte de las Ideas ', 0, 1,'C');
        $pdf -> Line(20, 50, 190, 50);

        $pdf->Cell(50);
        $pdf -> Cell(30, 50, 'Fecha del reporte: ', 0, 0);
        $pdf -> SetFont('Arial', '', 14);
        $pdf->Cell(30);
        $pdf -> Cell(30, 50, $student['fecha'], 0, 1);

        $pdf->Cell(50);
        $pdf -> SetFont('Arial', 'B', 16);
        $pdf -> Cell(30, 0, 'Nombre del alumno: ', 0, 0);
        $pdf -> SetFont('Arial', '', 14);
        $pdf->Cell(30);
        $pdf -> Cell(30, 0, $name, 0, 1);

        $pdf->Cell(35);
        $pdf -> SetFont('Arial', 'B', 16);
        $pdf -> Cell(30, 50, 'Maestro quien hizo el reporte: ', 0, 0);
        $pdf -> SetFont('Arial', '', 14);
        $pdf->Cell(60);
        $pdf -> Cell(30, 50, $student['maestro'], 0, 1);

        $pdf->Cell(55);
        $pdf -> SetFont('Arial', 'B', 16);
        $pdf -> Cell(30, 0, 'Tipo de reporte: ', 0, 0);
        $pdf -> SetFont('Arial', '', 14);
        $pdf->Cell(30);
        $pdf -> Cell(30, 0, $student['tipo'], 0, 1);

        $pdf->Cell(50);
        $pdf -> SetFont('Arial', 'B', 16);
        $pdf -> Cell(30, 50, 'Motivo del reporte: ', 0, 0);
        $pdf -> SetFont('Arial', '', 14);
        $pdf->Cell(25);
        $pdf -> Cell(30, 50, $student['motivo'], 0, 1);
        // $pdf -> Image($imagenUrl, 10, 20, 40);
        // $pdf -> Output();

        // return $pdf;
        // var_dump($pdf);
        // return true;

        // Captura la salida del PDF en un buffer
        $output = $pdf->Output('S');

        // Retorna el contenido del PDF como una respuesta en binario
        return response($output)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="documento.pdf"');

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
