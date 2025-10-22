<div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar text-white p-3">
    <div class="text-center mb-4">
        <h5 class="fw-bold text-uppercase">Menu</h5>
        <hr class="border-light">
    </div>

    @auth
        {{-- ===== ADMIN MENU ===== --}}
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('admin.dashboard') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('admin.users.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('admin.users.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-people me-2"></i> Manajemen User
            </a>
            <a href="{{ route('admin.departments.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('admin.departments.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-building me-2"></i> Jurusan
            </a>
            <a href="{{ route('admin.courses.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('admin.courses.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-journal-bookmark me-2"></i> Mata Kuliah
            </a>
            <a href="{{ route('admin.reports.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('admin.reports.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-graph-up-arrow me-2"></i> Laporan
            </a>

        {{-- ===== STUDENT MENU ===== --}}
        @elseif (Auth::user()->role === 'student')
            <a href="{{ route('student.dashboard') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('student.dashboard') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-house-door me-2"></i> Dashboard
            </a>
            <a href="{{ route('student.enrollment.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('student.enrollment.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-journal-check me-2"></i> KRS Saya
            </a>
            <a href="{{ route('student.grades') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('student.grades') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-bar-chart-line me-2"></i> Nilai
            </a>
            <a href="{{ route('student.profile') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('student.profile') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-person me-2"></i> Profil
            </a>

        {{-- ===== LECTURER MENU ===== --}}
        @elseif (Auth::user()->role === 'lecturer')
            <a href="{{ route('lecturer.dashboard') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('lecturer.dashboard') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
            <a href="{{ route('lecturer.classes.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('lecturer.classes.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-journal-text me-2"></i> Kelas Ajar
            </a>
            <a href="{{ route('lecturer.attendance.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('lecturer.attendance.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-clipboard-check me-2"></i> Presensi
            </a>
            <a href="{{ route('lecturer.grading.index') }}" class="d-block py-2 px-3 text-decoration-none {{ request()->routeIs('lecturer.grading.*') ? 'bg-primary text-white rounded' : 'text-light' }}">
                <i class="bi bi-pencil-square me-2"></i> Penilaian
            </a>
        @endif
    @endauth

    <hr class="border-secondary my-4">

    <p class="text-muted small text-center">&copy; {{ date('Y') }} FRS System</p>
</div>
