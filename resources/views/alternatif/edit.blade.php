@extends('layouts.app')

@section('content')
<div class="container form-container">
    <h2>Edit Alternatif</h2>

    <form action="{{ route('alternatif.update', $alternatif->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="kriteria_id">Kriteria:</label>
            <select id="kriteria_id" name="kriteria_id" class="form-control">
                @foreach ($kriteria as $k)
                    <option value="{{ $k->id }}" {{ $alternatif->kriteria_id == $k->id ? 'selected' : '' }}>{{ $k->kriteria }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="a1">Alternatif A1:</label>
            <input type="text" id="a1" name="a1" class="form-control" value="{{ $alternatif->a1 }}">
        </div>

        <div class="form-group">
            <label for="a2">Alternatif A2:</label>
            <input type="text" id="a2" name="a2" class="form-control" value="{{ $alternatif->a2 }}">
        </div>

        <div class="form-group">
            <label for="a3">Alternatif A3:</label>
            <input type="text" id="a3" name="a3" class="form-control" value="{{ $alternatif->a3 }}">
        </div>

        <div class="form-group">
            <label for="a4">Alternatif A4:</label>
            <input type="text" id="a4" name="a4" class="form-control" value="{{ $alternatif->a4 }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

@section('styles')
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<style>
    .form-container {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        background-color: #f8f9fa;
    }
    .form-container h2 {
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
    }
    .form-group input,
    .form-group select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }
    .form-group button {
        margin-top: 10px;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
