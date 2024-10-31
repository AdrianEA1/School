<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{

    public function sendMail(Report $report, $subject){

        $tutor = $report->student->user;

        Mail::to($tutor->email)->send(new ContactMail(
                $tutor->nombre . ' ' . $tutor->apellido_paterno . ' ' . $tutor->apellido_materno,
                $tutor->email,
                $subject,
                $report->fecha,
                $report->student->nombre . " " . $report->student->apellido_paterno . " " . $report->student->apellido_materno,
                $report->motivo,
                $report->maestro,
                $report->tipo)
        );
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
