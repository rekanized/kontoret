@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Available Drinks</h1>
    <p>Premium selection of beverages for your administration team.</p>
</div>

<div class="sectionbox" style="padding-top: 0;">
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; width: 100%;">
        @foreach($drinks as $drink)
            <div class="glass-card">
                <div class="componentboxheader">
                    <span>{{ $drink->name }}</span>
                </div>
                <div style="color: var(--text-secondary); line-height: 1.5; margin: 15px 0;">
                    {{ $drink->description ?: 'No description available for this beverage.' }}
                </div>
                <div style="margin-top: auto; padding-top: 20px; border-top: 1px solid var(--glass-border);">
                    @if($drink->is_available)
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="drink_id" value="{{ $drink->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="btn btn-blue" style="width: 100%;">Complete Order</button>
                        </form>
                    @else
                        <button class="btn btn-ghost" style="width: 100%; opacity: 0.5;" disabled>Currently Unavailable</button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
