@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Matrix Bobot Kriteria</h1>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th></th>
                @foreach ($alternatives as $alt)
                    <th>{{ $alt }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($alternatives as $row)
                <tr>
                    <th>{{ $row }}</th>
                    @foreach ($alternatives as $col)
                        <td>{{ number_format($matrixBobot[$row][$col], 2) }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="my-4">Leaving Flow</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>Alternative</th>
                <th>Leaving Flow</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leavingFlow as $alt => $flow)
                <tr>
                    <td>{{ $alt }}</td>
                    <td>{{ number_format($flow, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2 class="my-4">Entering Flow</h2>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>Alternative</th>
                <th>Entering Flow</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enteringFlow as $alt => $flow)
                <tr>
                    <td>{{ $alt }}</td>
                    <td>{{ number_format($flow, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    
    <h1 class="my-4">Net Flow</h1>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>Alternative</th>
                <th>Net Flow</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($netFlow as $alt => $flow)
                <tr>
                    <td>{{ $alt }}</td>
                    <td>{{ number_format($flow, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h1 class="my-4">Ranking</h1>
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th>Rank</th>
                <th>Alternative</th>
                <th>Net Flow</th>
            </tr>
        </thead>
        <tbody>
            @php $rank = 1; @endphp
            @foreach ($netFlow as $alt => $flow)
                <tr>
                    <td>{{ $rank++ }}</td>
                    <td>{{ $alt }}</td>
                    <td>{{ number_format($flow, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection
