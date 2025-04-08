<div class="modal fade" id="finishAppoinmentModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="confirmationModalLabel">Finalizare Programare</h3>
                 </div>
            <form action="{{route('appointment.finish')}}" method="POST" id="confirmationForm" class="needs-validation" novalidate>
                @csrf
            <div class="modal-body">
                <p class="fs-5">Programarea a fost finalizata?</p>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="appointmentIdFinish" value="">
                <input type="hidden" name="name" id="clientNameFinish" value="">
                <input type="hidden" name="service" id="serviceFinish" value="">
                <input type="hidden" name="date" id="dateFinish" value="">
                <input type="hidden" name="hour" id="timeFinish" value="">
                <button type="button" class="btn custom-btn-secondary" data-bs-dismiss="modal">Anulează</button>
                <button type="submit" class="btn custom-btn-primary" id="confirmButton">Confirmă</button>
            </div>
            </form>
        </div>
    </div>
</div>
