<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($student_id, $nuevo = null)
    {
        if (!isset($nuevo)) {
            $nuevo=0;
        }

        $reports = Report::where('student_id', $student_id)->get();
        $student = Student::find($student_id);
        return view('school.reports_interface', compact('reports', 'student', 'nuevo'));
    }

    public function list($student_id)
{
    // Obtener los reportes del estudiante
    $reports = Report::where('student_id', $student_id)->get();

    // Retornar los datos en formato JSON para DataTables
    return response()->json([
        'data' => $reports
    ]);
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
        $request->validate([
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'maestro' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ], [
            'fecha.required' => 'La fecha es obligatoria y debe ser válida.',
            'motivo.required' => 'El motivo es obligatorio.',
            'motivo.max' => 'El motivo no debe superar los 255 caracteres.',
            'maestro.required' => 'El nombre del maestro es obligatorio.',
            'maestro.max' => 'El nombre del maestro no debe superar los 255 caracteres.',
            'tipo.required' => 'El tipo de conducta es obligatorio.',
        ]);

        $report = new Report();
        $report->fecha = $request->fecha;
        $report->motivo = $request->motivo;
        $report->maestro = $request->maestro;
        $report->tipo = $request->tipo;
        $report->confirmacion = $request->confirmacion ?? 0;
        $report->student_id = $request->student_id;
        $report->save();

        return response()->json(['message' => 'Reporte creado exitosamente'], 201);
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
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:reports,id',
            'fecha' => 'required|date',
            'motivo' => 'required|string|max:255',
            'maestro' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
        ], [
            'id.required' => 'El ID es obligatorio y debe existir en la base de datos.',
            'fecha.required' => 'La fecha es obligatoria y debe ser válida.',
            'motivo.required' => 'El motivo es obligatorio.',
            'motivo.max' => 'El motivo no debe superar los 255 caracteres.',
            'maestro.required' => 'El nombre del maestro es obligatorio.',
            'maestro.max' => 'El nombre del maestro no debe superar los 255 caracteres.',
            'tipo.required' => 'El tipo de conducta es obligatorio.',
        ]);

        // Buscar el reporte por ID y actualizar los campos
        $report = Report::find($request->id);
        $report->fecha = $request->fecha;
        $report->motivo = $request->motivo;
        $report->maestro = $request->maestro;
        $report->tipo = $request->tipo;
        $report->confirmacion = $request->confirmacion;
        $report->student_id = $request->student_id;
        $report->save();

        // Retornar una respuesta
        return response()->json(['message' => 'Reporte actualizado exitosamente'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request)
    {
        $report = Report::find($request->id);
        if ($report) {
            $report->delete();
            return response()->json(['success' => 'Reporte eliminado correctamente']);
        }
        return response()->json(['error' => 'Reporte no encontrado'], 404);
    }
}
