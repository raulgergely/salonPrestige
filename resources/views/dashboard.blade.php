
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <div class="container mt-4">

        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Căutare programări</h4>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Căutați după nume client..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Căutare</button>
                </form>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Programări în Curs</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                    <th>Acțiuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Maria Popescu</td>
                                    <td>Manichiură</td>
                                    <td>10:00</td>
                                    <td><span class="badge bg-warning">În curs</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal1">Modifică</button>
                                        <button class="btn btn-danger btn-sm">Șterge</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ion Ionescu</td>
                                    <td>Coafură</td>
                                    <td>12:00</td>
                                    <td><span class="badge bg-warning">În curs</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal2">Modifică</button>
                                        <button class="btn btn-danger btn-sm">Șterge</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Programări Realizate</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                    <th>Acțiuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>3</td>
                                    <td>Adriana Vasile</td>
                                    <td>Masaj</td>
                                    <td>14:30</td>
                                    <td><span class="badge bg-success">Realizată</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal3">Modifică</button>
                                        <button class="btn btn-danger btn-sm">Șterge</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Programări care Urmează</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Client</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                    <th>Acțiuni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>4</td>
                                    <td>Cristina Tudor</td>
                                    <td>Manichiură</td>
                                    <td>16:00</td>
                                    <td><span class="badge bg-primary">Confirmată</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal4">Modifică</button>
                                        <button class="btn btn-danger btn-sm">Șterge</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Laura Stoica</td>
                                    <td>Coafură</td>
                                    <td>17:00</td>
                                    <td><span class="badge bg-primary">Confirmată</span></td>
                                    <td>
                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editAppointmentModal5">Modifică</button>
                                        <button class="btn btn-danger btn-sm">Șterge</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editAppointmentModal1" tabindex="-1" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editAppointmentModalLabel">Modifică Programare</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="clientName" class="form-label">Nume Client</label>
                                <input type="text" class="form-control" id="clientName" value="Maria Popescu" required>
                            </div>
                            <div class="mb-3">
                                <label for="service" class="form-label">Serviciu</label>
                                <select class="form-select" id="service">
                                    <option>Manichiură</option>
                                    <option>Coafură</option>
                                    <option>Masaj</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="appointmentTime" class="form-label">Ora Programării</label>
                                <input type="time" class="form-control" id="appointmentTime" value="10:00">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvează modificările</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection


</body>
</html>
