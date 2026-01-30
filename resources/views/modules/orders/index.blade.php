@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Your Order History</h1>
    <p>Track your beverage requests and current status.</p>
</div>

<div class="sectionbox" style="padding-top: 0;">
    @if($orders->isEmpty())
        <div class="transparentsectionbox" style="width: 100%;">
            <span class="material-symbols-outlined" style="font-size: 3rem; color: var(--text-secondary); margin-bottom: 20px;">shopping_basket</span>
            <p>You haven't placed any orders yet.</p>
            <a href="{{ route('drinks.index') }}" class="btn btn-blue" style="margin-top: 10px;">Browse Catalog</a>
        </div>
    @else
        <div class="transparentsectionbox" style="padding: 0; overflow: hidden; border-radius: 16px; width: 100%;">
            <table style="width: 100%; border-collapse: collapse; text-align: left;">
                <thead>
                    <tr style="background: rgba(255,255,255,0.05); color: var(--text-secondary);">
                        <th style="padding: 20px;">Beverage</th>
                        <th style="padding: 20px;">Qty</th>
                        <th style="padding: 20px;">Ordered At</th>
                        <th style="padding: 20px;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr style="border-top: 1px solid var(--glass-border);">
                            <td style="padding: 20px; font-weight: 500;">{{ $order->drink->name }}</td>
                            <td style="padding: 20px;">{{ $order->quantity }}</td>
                            <td style="padding: 20px; color: var(--text-secondary); font-size: 0.85rem;">{{ $order->created_at->format('M d, H:i') }}</td>
                            <td style="padding: 20px;">
                                <span style="padding: 6px 14px; border-radius: 20px; font-size: 0.8rem; font-weight: 600; 
                                    background: {{ $order->status == 'completed' ? 'rgba(16, 185, 129, 0.1)' : ($order->status == 'cancelled' ? 'rgba(239, 68, 68, 0.1)' : 'rgba(245, 158, 11, 0.1)') }}; 
                                    color: {{ $order->status == 'completed' ? '#34d399' : ($order->status == 'cancelled' ? '#f87171' : '#fbbf24') }};">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
