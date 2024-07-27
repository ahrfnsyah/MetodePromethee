@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4 mb-4">Evaluasi Matriks</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
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
                <td>{{ $row['a1'] }}</td>
                <td>{{ $row['a2'] }}</td>
                <td>{{ $row['a3'] }}</td>
                <td>{{ $row['a4'] }}</td>
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
    table {
        margin-top: 20px;
        border-collapse: collapse;
    }
    th, td {
        padding: 12px;
        text-align: center;
        border: 1px solid #dee2e6;
    }
    th {
        background-color: #f8f9fa;
    }
    tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
    tbody tr:hover {
        background-color: #e9ecef;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
