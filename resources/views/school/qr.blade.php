@extends('layouts.school')

@section('content')
    <div class="container-qr">
        {{-- <div class="row justify-content-center mt-5 separate"> --}}
            <div class="col-md-5 shadow p-3">
              <h3 id="title" class="text-center">Favor de colocar tu código QR dado en la cámara</h3>
              <div class="row text-center ">
                    <canvas hidden="" id="qr-canvas" class="img-fluid"></canvas>
                </div>
            </div>
          {{-- </div> --}}
    </div>

@endsection
