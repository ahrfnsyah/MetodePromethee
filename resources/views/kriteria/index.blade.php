@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Data Kriteria</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Kriteria</th>
                <th>Fungsi Preferensi</th>
                <th>Min/Max</th>
                <th>Bobot</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kriteria as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kriteria }}</td>
                <td>{{ $item->fungsi_preferensi }}</td>
                <td>{{ $item->min_max }}</td>
                <td>{{ $item->bobot }}</td>
                <td class="action-btns">
                    <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
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
    .action-btns {
        display: flex;
        justify-content: center;
    }
    .action-btns a, .action-btns button {
        margin: 0 5px;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
