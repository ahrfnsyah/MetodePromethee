@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4 mb-4">Bobot Kriteria</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kombinasi</th>
                <th>F1</th>
                <th>F2</th>
                <th>F3</th>
                <th>F4</th>
                <th>F5</th>
                <th>HD</th>
                <th>Bobot Kriteria</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($preferensiMatrix as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row['kombinasi'] }}</td>
                <td>{{ $row['f1'] }}</td>
                <td>{{ $row['f2'] }}</td>
                <td>{{ $row['f3'] }}</td>
                <td>{{ $row['f4'] }}</td>
                <td>{{ $row['f5'] }}</td>
                <td>{{ $row['hd'] }}</td>
                <td>{{ number_format((1 / 5) * $row['hd'], 4) }}</td> <!-- Misalnya jumlah kriteria 5 -->
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
