@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Kartu Rencana Studi (KRS)</h3>
    <p class="text-muted">
        Tahun Akademik: {{ $academicYear?->year ?? 'Belum ditentukan' }}
    </p>

    {{-- Notifikasi --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Daftar KRS --}}
    <h5 class="mt-4">Mata Kuliah yang Telah Diambil</h5>
    @if($enrollments->isEmpty())
        <p class="text-muted">Belum ada mata kuliah yang diambil.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->classSection->course->code }}</td>
                        <td>{{ $enrollment->classSection->course->name }}</td>
                        <td>{{ $enrollment->classSection->course->credits }}</td>
                        <td>
                            <form method="POST" action="{{ route('student.enrollment.destroy', $enrollment->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Batalkan mata kuliah ini?')">Batal</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Daftar Kelas Tersedia --}}
    <h5 class="mt-5">Daftar Mata Kuliah Tersedia</h5>
    <table class="table table-hover mt-3">
        <thead class="table-secondary">
            <tr>
                <th>Kode</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availableClasses as $class)
                <tr>
                    <td>{{ $class->course->code }}</td>
                    <td>{{ $class->course->name }}</td>
                    <td>{{ $class->course->credits }}</td>
                    <td>
                        <form method="POST" action="{{ route('student.enrollment.store') }}">
                            @csrf
                            <input type="hidden" name="class_section_id" value="{{ $class->id }}">
                            <button type="submit" class="btn btn-sm btn-success">Ambil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
