@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mt-4">Tambah Kriteria</h2>

    <form action="{{ route('kriteria.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kriteria">Kriteria:</label>
            <input type="text" id="kriteria" name="kriteria" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="fungsi_preferensi">Fungsi Preferensi:</label>
            <input type="text" id="fungsi_preferensi" name="fungsi_preferensi" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="min_max">Min/Max:</label>
            <select id="min_max" name="min_max" class="form-control" required>
                <option value="min">Min</option>
                <option value="max">Max</option>
            </select>
        </div>

        <div class="form-group">
            <label for="bobot">Bobot:</label>
            <input type="text" id="bobot" name="bobot" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary btn-submit">Submit</button>
    </form>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<style>
    .container {
        margin-top: 20px;
    }
    form {
        margin-top: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-group input, .form-group select {
        width: 100%;
    }
    .btn-submit {
        margin-top: 20px;
    }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
