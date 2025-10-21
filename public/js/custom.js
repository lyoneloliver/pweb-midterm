// =======================================
// Custom JS - FRS System
// =======================================

// Sidebar toggle
document.addEventListener('DOMContentLoaded', function () {
    const sidebar = document.querySelector('.sidebar');
    const toggleBtn = document.querySelector('#sidebarToggle');
    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('d-none');
        });
    }
});

// Confirm delete
function confirmDelete(event, formId) {
    event.preventDefault();
    if (confirm('Apakah kamu yakin ingin menghapus data ini?')) {
        document.getElementById(formId).submit();
    }
}

// Auto-hide alert
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.alert').forEach(alert => {
        setTimeout(() => {
            alert.style.opacity = '0';
            setTimeout(() => alert.remove(), 500);
        }, 4000);
    });
});

// Table filter
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
