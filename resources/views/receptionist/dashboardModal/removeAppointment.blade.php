<div class="modal fade" id="removeAppoinmentModal" tabindex="-1" aria-labelledby="removeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-modal">
            <div class="modal-header">
                <h3 class="modal-title">Ștergere Programare</h3>
             </div>
            <form action="{{route('appointment.delete')}}" method="POST" id="removeForm" class="needs-validation" novalidate>
                @csrf
                <div class="modal-body">
                    <p class="fs-5 text-center">Esti sigur ca vrei sa stergi programarea?</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="hidden" name="id" id="appointmentIdRemove" value="">
                    <input type="hidden" name="name" id="clientNameRemove" value="">
                    <input type="hidden" name="service" id="serviceRemove" value="">
                    <input type="hidden" name="date" id="dateRemove" value="">
                    <input type="hidden" name="hour" id="timeRemove" value="">
                    <button type="button" class="btn custom-btn-secondary" data-bs-dismiss="modal">Anulează</button>
                    <button type="submit" class="btn custom-btn-primary">Ștergere</button>
                </div>
            </form>
        </div>
    </div>
</div>


