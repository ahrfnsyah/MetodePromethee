@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Evaluasi Matriks</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th>Min/Max</th>
                <th colspan="4">Alternatif</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluasiMatrix as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['kriteria'] }}</td>
                <td>{{ $row['min_max'] }}</td>
                <td>{{ number_format($row['a1'], 2) }}</td>
                <td>{{ number_format($row['a2'], 2) }}</td>
                <td>{{ number_format($row['a3'], 2) }}</td>
                <td>{{ number_format($row['a4'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="mt-4">Nilai Preferensi</h2>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                <th colspan="12">D(Ai - Aj)</th>
                <th colspan="12">H(D(Ai - Aj))</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th>D(A1 - A2)</th>
                <th>D(A1 - A3)</th>
                <th>D(A1 - A4)</th>

                <th>D(A2 - A1)</th>
                <th>D(A2 - A3)</th>
                <th>D(A2 - A4)</th>

                <th>D(A3 - A1)</th>
                <th>D(A3 - A2)</th>
                <th>D(A3 - A4)</th>

                <th>D(A4 - A1)</th>
                <th>D(A4 - A2)</th>
                <th>D(A4 - A3)</th>

                <th>H(D(A1 - A2))</th>
                <th>H(D(A1 - A3))</th>
                <th>H(D(A1 - A4))</th>

                <th>H(D(A2 - A1))</th>
                <th>H(D(A2 - A3))</th>
                <th>H(D(A2 - A4))</th>

                <th>H(D(A3 - A1))</th>
                <th>H(D(A3 - A2))</th>
                <th>H(D(A3 - A4))</th>

                <th>H(D(A4 - A1))</th>
                <th>H(D(A4 - A2))</th>
                <th>H(D(A4 - A3))</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preferensiMatrix as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['kriteria'] }}</td>
                <td>{{ number_format($row['d_a1_a2'], 2) }}</td>
                <td>{{ number_format($row['d_a1_a3'], 2) }}</td>
                <td>{{ number_format($row['d_a1_a4'], 2) }}</td>

                <td>{{ number_format($row['d_a2_a1'], 2) }}</td>
                <td>{{ number_format($row['d_a2_a3'], 2) }}</td>
                <td>{{ number_format($row['d_a2_a4'], 2) }}</td>

                <td>{{ number_format($row['d_a3_a1'], 2) }}</td>
                <td>{{ number_format($row['d_a3_a2'], 2) }}</td>
                <td>{{ number_format($row['d_a3_a4'], 2) }}</td>

                <td>{{ number_format($row['d_a4_a1'], 2) }}</td>
                <td>{{ number_format($row['d_a4_a2'], 2) }}</td>
                <td>{{ number_format($row['d_a4_a3'], 2) }}</td>

                <td>{{ number_format($row['h_d_a1_a2'], 2) }}</td>
                <td>{{ number_format($row['h_d_a1_a3'], 2) }}</td>
                <td>{{ number_format($row['h_d_a1_a4'], 2) }}</td>

                <td>{{ number_format($row['h_d_a2_a1'], 2) }}</td>
                <td>{{ number_format($row['h_d_a2_a3'], 2) }}</td>
                <td>{{ number_format($row['h_d_a2_a4'], 2) }}</td>

                <td>{{ number_format($row['h_d_a3_a1'], 2) }}</td>
                <td>{{ number_format($row['h_d_a3_a2'], 2) }}</td>
                <td>{{ number_format($row['h_d_a3_a4'], 2) }}</td>

                <td>{{ number_format($row['h_d_a4_a1'], 2) }}</td>
                <td>{{ number_format($row['h_d_a4_a2'], 2) }}</td>
                <td>{{ number_format($row['h_d_a4_a3'], 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .container {
        margin-top: 20px;
    }
    .table {
        margin-top: 20px;
    }
    .table th, .table td {
        text-align: center;
    }
    .table th {
        background-color: #f8f9fa;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
