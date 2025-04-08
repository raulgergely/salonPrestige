class DashboardManager {

    constructor() {
        this.confirmationAppointment();
        this.removeAppointment();
        this.finishedAppoinment();
    }
    removeAppointment() {
        const removeModal = document.getElementById("removeAppoinmentModal");

        if (!removeModal) {
            return;
        }

        removeModal.addEventListener("show.bs.modal", (event) => {
            console.log("Modalul se deschide!");
            const button = event.relatedTarget;
            if (!button) return;

            // Extragem datele folosind destructurare
            const { clientName, appointmentId, service, time, day } = button.dataset;

            // Setăm valorile în câmpurile modalului
            const fields = {
                clientNameRemove: clientName,
                appointmentIdRemove: appointmentId,
                serviceRemove: service,
                dateRemove: day,
                timeRemove: time
            };

            Object.entries(fields).forEach(([id, value]) => {
                const input = removeModal.querySelector(`#${id}`);
                if (input) input.value = value;
            });
        });
    }

    confirmationAppointment(){
        var confirmationModal = document.getElementById('confirmationModal');

        confirmationModal.addEventListener('show.bs.modal', function (event) {
            // Obținem butonul care a activat modalul
            var button = event.relatedTarget;

            // Preluăm datele din atributele data-*
            var clientName = button.getAttribute('data-client-name');
            var appointmentId = button.getAttribute('data-appointment-id');
            var service = button.getAttribute('data-service');
            var time = button.getAttribute('data-time');

            // Populăm modalul cu datele respective
            var modalTitle = confirmationModal.querySelector('.modal-title');
            var modalBody = confirmationModal.querySelector('.modal-body p');
            var timeInput = confirmationModal.querySelector('#appointmentTime');

            // Actualizăm textul modalului și setăm valoarea implicită a orei
            modalTitle.textContent = 'Confirma Programarea pentru ' + clientName;
            modalBody.textContent = 'Serviciul: ' + service + ' la ora ' + time + '. Esti sigur că vrei să confirmi programarea?';
            timeInput.value = time; // Setăm ora implicită pe baza celei deja stabilite
            var clientNameInput = confirmationModal.querySelector('#clientName');
            var appointmentInput = confirmationModal.querySelector('#appointmentId');
            var serviceInput = confirmationModal.querySelector('#service');

            // Atribuim valorile corespunzătoare câmpurilor hidden
            clientNameInput.value = clientName;
            appointmentInput.value = appointmentId;
            serviceInput.value = service;
        });
    }


    finishedAppoinment(){
        var finishModal = document.getElementById('finishAppoinmentModal');
        finishModal.addEventListener('show.bs.modal', function (event) {

            var modalBody = finishModal.querySelector('.modal-body p');
            var button = event.relatedTarget;
            var clientName = button.getAttribute('data-client-name');
                    var appointmentId = button.getAttribute('data-appointment-id');
                    var service = button.getAttribute('data-service');
                    var time = button.getAttribute('data-time');
                    var day = button.getAttribute('data-day');
            modalBody.textContent = 'Serviciul: ' + service + ' la ora ' + time + ' pe numele '+clientName+'. Esti sigur că vrei să finalizezi programarea?';

            var clientNameInput = finishModal.querySelector('#clientNameFinish');
                    var appointmentInput = finishModal.querySelector('#appointmentIdFinish');
                    var serviceInput = finishModal.querySelector('#serviceFinish');
                    var dateInput = finishModal.querySelector('#dateFinish');
                    var timeInput = finishModal.querySelector('#timeFinish');

                    // Atribuim valorile corespunzătoare câmpurilor hidden
                    clientNameInput.value = clientName;
                    appointmentInput.value = appointmentId;
                    serviceInput.value = service;
                    dateInput.value = day;
                    timeInput.value = time;


        });
    }
}
document.addEventListener('DOMContentLoaded', function () {
    const manager = new DashboardManager();
});
