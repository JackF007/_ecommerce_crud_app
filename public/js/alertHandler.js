
    document.addEventListener("DOMContentLoaded", function() {

        const successAlerts = document.querySelectorAll('.alert-success');

        // Imposta un timeout per nascondere gli alert dopo 3 secondi 
        successAlerts.forEach(alert => {
            setTimeout(function() {
                alert.style.display = 'none';
            }, 3000); 
        });
    });
