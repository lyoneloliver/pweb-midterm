/* =======================================
   Custom JS - FRS System
   Author: Abid Alfaridzi
   ======================================= */

// Sidebar toggle (mobile responsive)
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('#sidebarToggle');

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('d-none');
        });
    }
});

// Confirmation for delete
function confirmDelete(event, formId) {
    event.preventDefault();
    if (confirm('Apakah kamu yakin ingin menghapus data ini?')) {
        document.getElementById(formId).submit();
    }
}

// Auto-hide alert messages
document.addEventListener('DOMContentLoaded', function () {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            alert.style.transition = 'opacity 0.5s';
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });
});

// Dynamic table search (simple client-side filter)
function filterTable(inputId, tableId) {
    const input = document.getElementById(inputId);
    const filter = input.value.toLowerCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName('tr');

    for (let i = 1; i < rows.length; i++) {
        const rowText = rows[i].textContent.toLowerCase();
        rows[i].style.display = rowText.includes(filter) ? '' : 'none';
    }
}
