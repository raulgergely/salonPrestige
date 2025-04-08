<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal confirmModal">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmationModalLabel">Confirma Programarea</h3>
                 </div>
            <form action="{{route('appointment.set')}}" method="POST" id="confirmationForm" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <p class="fs-5">Esti sigur că vrei să confirmi programarea?</p>
                    <div>
                        <label class="fs-5" for="appointmentDate">Selectează ziua:</label>
                        <input type="date" id="appointmentDate" name="date" class="form-control" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}"/>
                    </div>
                    <div>
                        <label class="fs-5"for="appointmentTime">Selectează ora programării:</label>
                        <input type="time" id="appointmentTime" name="hour" class="form-control" step="900" required>
                        <div class="invalid-feedback">
                            Te rugăm să completezi câmpul pentru ora.
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-cente">
                    <input type="hidden" name="id" id="appointmentId" value="">
                    <input type="hidden" name="name" id="clientName" value="">
                    <input type="hidden" name="service" id="service" value="">
                    <button type="button" class="btn custom-btn-secondary" data-bs-dismiss="modal">Anulează</button>
                    <button type="submit" class="btn custom-btn-primary" id="confirmButton">Confirmă</button>
                </div>
            </form>
        </div>
    </div>
</div>
