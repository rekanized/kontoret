@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Manage Beverage Catalog</h1>
    <div style="margin-top: 20px;">
        <a href="{{ route('drinks.create') }}" class="btn btn-blue">
            <span class="material-symbols-outlined">add</span> Create New Entry
        </a>
    </div>
</div>

<div class="glass-table-container">
    <table class="glass-table">
        <thead>
            <tr>
                <th>Beverage Name</th>
                <th>Availability</th>
                <th style="text-align: right;">Operations</th>
            </tr>
        </thead>
        <tbody>
            @foreach($drinks as $drink)
                <tr>
                    <td style="font-weight: 500;">{{ $drink->name }}</td>
                    <td>
                        <span class="badge {{ $drink->is_available ? 'badge-success' : 'badge-danger' }}">
                            {{ $drink->is_available ? 'In Stock' : 'Out of Stock' }}
                        </span>
                    </td>
                    <td style="text-align: right; display: flex; justify-content: flex-end; gap: 10px;">
                        <a href="{{ route('drinks.edit', $drink) }}" class="btn btn-little btn-ghost">
                            <span class="material-symbols-outlined" style="font-size: 16px;">edit</span>
                        </a>
                        <form action="{{ route('drinks.destroy', $drink) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-little btn-ghost" style="color: #f87171;" onclick="return confirm('Are you sure?')">
                                <span class="material-symbols-outlined" style="font-size: 16px;">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
