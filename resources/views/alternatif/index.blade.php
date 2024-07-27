@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="my-4">Data Alternatif</h2>

    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>No.</th>
                <th>Kriteria</th>
                <th>Min/Max</th>
                <th colspan="4">Alternatif</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>A1</th>
                <th>A2</th>
                <th>A3</th>
                <th>A4</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatif as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kriteria->kriteria }}</td>
                <td>{{ $item->kriteria->min_max }}</td>
                <td>{{ $item->a1 }}</td>
                <td>{{ $item->a2 }}</td>
                <td>{{ $item->a3 }}</td>
                <td>{{ $item->a4 }}</td>
                <td class="actions">
                    <a href="{{ route('alternatif.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('alternatif.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('alternatif.create') }}" class="btn btn-success">Tambah Alternatif</a>
</div>
@endsection

@section('styles')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    table {
        width: 100%;
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
    .actions {
        display: flex;
        justify-content: center;
        gap: 5px;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
