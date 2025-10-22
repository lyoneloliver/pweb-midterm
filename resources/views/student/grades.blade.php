@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Nilai Akademik</h3>

    @if($grades->isEmpty())
        <p class="text-muted mt-3">Belum ada nilai yang tersedia.</p>
    @else
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th>Nilai Akhir</th>
                </tr>
            </thead>
            <tbody>
                @foreach($grades as $grade)
                    <tr>
                        <td>{{ $grade->classSection->course->code }}</td>
                        <td>{{ $grade->classSection->course->name }}</td>
                        <td>{{ $grade->classSection->course->credits }}</td>
                        <td>{{ $grade->final_grade }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
