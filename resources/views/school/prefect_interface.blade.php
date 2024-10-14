@extends('layouts.school')

@section('content')

    <div class="d-flex align-items-center justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <img height="60px" src="{{asset('assets/img/beePresent.png')}}">
                        &nbsp;
                        <h4 class="card-title">Escuela Secundaria Monte de las Ideas</h4>
                        <h5
                            class="ms-auto"
                            data-bs-toggle="modal"
                            data-bs-target="#addRowModal"
                        >

                            [Aquí va el nombre del prefecto]
                        </h5>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="d-flex align-items-center justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">

                    <!-- Modal
                    <div
                        class="modal fade"
                        id="addRowModal"
                        tabindex="-1"
                        role="dialog"
                        aria-hidden="true"
                    >
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title">
                                        <span class="fw-mediumbold"> New</span>
                                        <span class="fw-light"> Row </span>
                                    </h5>
                                    <button
                                        type="button"
                                        class="close"
                                        data-dismiss="modal"
                                        aria-label="Close"
                                    >
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="small">
                                        Create a new row using this form, make sure you
                                        fill them all
                                    </p>
                                    <form>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Name</label>
                                                    <input
                                                        id="addName"
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="fill name"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-6 pe-0">
                                                <div class="form-group form-group-default">
                                                    <label>Position</label>
                                                    <input
                                                        id="addPosition"
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="fill position"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-group-default">
                                                    <label>Office</label>
                                                    <input
                                                        id="addOffice"
                                                        type="text"
                                                        class="form-control"
                                                        placeholder="fill office"
                                                    />
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer border-0">
                                    <button
                                        type="button"
                                        id="addRowButton"
                                        class="btn btn-primary"
                                    >
                                        Add
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-danger"
                                        data-dismiss="modal"
                                    >
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    End Modal -->

                    <div class="table-responsive">
                        <table
                            id="add-row"
                            class="display table table-striped table-hover"
                        >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>GRADO</th>
                                <th>GRUPO</th>
                                <th style="width: 10%">DETALLE</th>
                            </tr>
                            </thead>

                            <tbody>

                            <tr>
                                <td>[Aquí va el id del grupo]</td>
                                <td>[Aquí va el grado del grupo]</td>
                                <td>[Aquí va el carácter alfabético del grupo]</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>[Aquí va el id del grupo]</td>
                                <td>[Aquí va el grado del grupo]</td>
                                <td>[Aquí va el carácter alfabético del grupo]</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>[Aquí va el id del grupo]</td>
                                <td>[Aquí va el grado del grupo]</td>
                                <td>[Aquí va el carácter alfabético del grupo]</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>[Aquí va el id del grupo]</td>
                                <td>[Aquí va el grado del grupo]</td>
                                <td>[Aquí va el carácter alfabético del grupo]</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>[Aquí va el id del grupo]</td>
                                <td>[Aquí va el grado del grupo]</td>
                                <td>[Aquí va el carácter alfabético del grupo]</td>
                                <td>
                                    <div class="form-button-action">
                                        <button
                                            type="button"
                                            data-bs-toggle="tooltip"
                                            title=""
                                            class="btn btn-link btn-primary btn-lg"
                                            data-original-title="Edit Task"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
