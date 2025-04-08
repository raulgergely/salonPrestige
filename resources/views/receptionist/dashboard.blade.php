
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

</head>
<body>
    @push("styles")
    <link rel="stylesheet" href="{{ asset('css/receptionist/dashboardModal/appointment.css') }}">
    <link rel="stylesheet" href="{{ asset('css/receptionist/dashboard.css') }}">
    @endpush
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
                                    <th>Nr telefon</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                    <th>Acțiuni</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($appointmentsPending as $appointment)
                                <tr>
                                    <td>1</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->service}}</td>
                                    <td>{{$appointment->hour}}</td>
                                    <td><span class="badge bg-warning">În curs</span></td>
                                    <td>
                                        <button class="btn btn-success btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmationModal"
                                        data-client-name="{{$appointment->name}}"
                                        data-appointment-id="{{$appointment->id}}"
                                        data-service="{{$appointment->service}}"
                                        data-time="{{$appointment->hour}}"
                                        data-day="{{$appointment->date}}">Confirma</button>
                                        <button class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#removeAppoinmentModal"
                                        data-client-name="{{$appointment->name}}"
                                        data-appointment-id="{{$appointment->id}}"
                                        data-service="{{$appointment->service}}"
                                        data-time="{{$appointment->hour}}"
                                        data-day="{{$appointment->date}}">Șterge</button>

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('receptionist.dashboardModal.confirmationAppoinment')

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
                                    <th>Numar de telefon</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointmentsFinished as $appointment)
                                <tr>
                                    <td>1</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->service}}</td>
                                    <td>{{$appointment->hour}}</td>
                                    <td><span class="badge bg-success">Realizată</span></td>
                                </tr>
                                @endforeach
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
                                    <th>Numar telefon</th>
                                    <th>Serviciu</th>
                                    <th>Ora Programării</th>
                                    <th>Status</th>
                                    <th>Acțiuni</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($appointmentsConfirmed as $appointment)
                                <tr>
                                    <td>1</td>
                                    <td>{{$appointment->name}}</td>
                                    <td>{{$appointment->phone}}</td>
                                    <td>{{$appointment->service}}</td>
                                    <td>{{$appointment->hour}}</td>
                                    <td><span class="badge bg-primary">Confirmată</span></td>
                                    <td>
                                        <button class="btn btn-success btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#finishAppoinmentModal"
                                        data-client-name="{{$appointment->name}}"
                                        data-appointment-id="{{$appointment->id}}"
                                        data-service="{{$appointment->service}}"
                                        data-time="{{$appointment->hour}}"
                                        data-day="{{$appointment->date}}">Confirma</button>
                                        <button class="btn btn-danger btn-sm"
                                        data-bs-toggle="modal"
                                        data-bs-target="#removeAppoinmentModal"
                                        data-client-name="{{$appointment->name}}"
                                        data-appointment-id="{{$appointment->id}}"
                                        data-service="{{$appointment->service}}"
                                        data-time="{{$appointment->hour}}"
                                        data-day="{{$appointment->date}}">Șterge</button>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('receptionist.dashboardModal.finishAppoinment')
        @include('receptionist.dashboardModal.removeAppointment')

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
                                <label for="appointmentTime2" class="form-label">Ora Programării</label>
                                <input type="time" class="form-control" id="appointmentTime2" value="10:00">
                            </div>
                            <button type="submit" class="btn btn-primary">Salvează modificările</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection
    @section("scripts")
    <script>


(function () {
  'use strict'

  var forms = document.querySelectorAll('.needs-validation')

  Array.prototype.slice.call(forms)
    .forEach(function (form) {
      form.addEventListener('submit', function (event) {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
})()
    </script>

    @endsection
    @push('scripts')
        <script src="{{ asset('js/receptionist/dashboardManager.js') }}"></script>
    @endpush
</body>
</html>



<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vizualizare Program Angajați</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>

        /* Adăugăm stiluri pentru calendarul de vizualizare */
        .availability-table td.occupied {
            background-color: #f8d7da;
            color: #721c24;
        }
        .availability-table td.available {
            background-color: #d4edda;
            color: #155724;
        }

        /* Responsivitate pentru tabel */
        @media (max-width: 767px) {
            .availability-table td {
                font-size: 0.8rem;
                padding: 5px;
            }

            .availability-table th {
                font-size: 0.9rem;
            }
        }

        @media (min-width: 768px) {
            .availability-table td {
                font-size: 1rem;
                padding: 10px;
            }

            .availability-table th {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">

        <!-- Calendar pentru a selecta data -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>Selectează data</h4>
                <input type="date" id="date" class="form-control" required>
            </div>
        </div>

        <!-- Vizualizarea disponibilității angajaților -->
        <div class="row mb-4">
            <div class="col-md-12">
                <h4>Programul angajaților pentru ziua selectată</h4>
                <table class="table table-bordered availability-table">
                    <thead>
                        <tr>
                            <th>Angajat</th>
                            <!-- Orele de la 8:00 la 20:00 -->
                            <th>08:00</th>
                            <th>09:00</th>
                            <th>10:00</th>
                            <th>11:00</th>
                            <th>12:00</th>
                            <th>13:00</th>
                            <th>14:00</th>
                            <th>15:00</th>
                            <th>16:00</th>
                            <th>17:00</th>
                            <th>18:00</th>
                            <th>19:00</th>
                            <th>20:00</th>
                        </tr>
                    </thead>
                    <tbody id="availability-table-body">
                        <!-- Rânduri pentru fiecare angajat -->
                        <tr>
                            <td>Maria Popescu</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                        </tr>
                        <tr>
                            <td>Ion Ionescu</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                        </tr>
                        <tr>
                            <td>Adriana Vasile</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                            <td class="occupied">Ocupat</td>
                            <td class="available">Disponibil</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Simulare date pentru disponibilitate
        const availabilityData = {
            "2025-03-17": {
                "Maria Popescu": ["08:00", "10:00", "12:00", "13:00", "15:00", "16:00", "18:00"],
                "Ion Ionescu": ["09:00", "10:00", "12:00", "14:00", "16:00", "17:00"],
                "Adriana Vasile": ["08:00", "09:00", "11:00", "12:00", "14:00", "16:00", "17:00", "19:00"]
            },
            "2025-03-18": {
                "Maria Popescu": ["09:00", "11:00", "12:00", "14:00", "16:00", "18:00"],
                "Ion Ionescu": ["08:00", "10:00", "12:00", "13:00", "15:00"],
                "Adriana Vasile": ["09:00", "10:00", "12:00", "14:00", "15:00", "17:00"]
            }
        };

        document.getElementById("date").addEventListener("change", function () {
            const selectedDate = this.value;
            const tableBody = document.getElementById("availability-table-body");

            // Verificăm dacă există date pentru ziua selectată
            if (availabilityData[selectedDate]) {
                const employees = Object.keys(availabilityData[selectedDate]);

                // Golim tabelul înainte de a-l umple
                tableBody.innerHTML = "";

                employees.forEach(employee => {
                    const row = document.createElement("tr");
                    const cell = document.createElement("td");
                    cell.textContent = employee;
                    row.appendChild(cell);

                    for (let hour = 8; hour <= 20; hour++) {
                        const time = `${hour < 10 ? "0" : ""}${hour}:00`;
                        const status = availabilityData[selectedDate][employee].includes(time) ? "available" : "occupied";
                        const cell = document.createElement("td");
                        cell.textContent = status === "available" ? "Disponibil" : "Ocupat";
                        cell.classList.add(status);
                        row.appendChild(cell);
                    }

                    tableBody.appendChild(row);
                });
            }
        });
    </script>
</body>
</html>
