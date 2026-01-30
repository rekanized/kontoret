@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Order Queue</h1>
    <p>Manage and fulfill beverage requests across the organization.</p>
</div>

<div class="transparentsectionbox" style="padding: 0; overflow: hidden; border-radius: 16px;">
    <table style="width: 100%; border-collapse: collapse; text-align: left;">
        <thead>
            <tr style="background: rgba(255,255,255,0.05); color: var(--text-secondary);">
                <th style="padding: 20px;">Requester</th>
                <th style="padding: 20px;">Item</th>
                <th style="padding: 20px;">Qty</th>
                <th style="padding: 20px;">Timestamp</th>
                <th style="padding: 20px;">Fulfillment Status</th>
                <th style="padding: 20px; text-align: right;">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr style="border-top: 1px solid var(--glass-border); transition: background 0.2s;" onmouseover="this.style.background='rgba(255,255,255,0.02)'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 20px;">
                        <div style="font-weight: 500;">{{ $order->user->name }}</div>
                        <div style="font-size: 0.75rem; color: var(--text-secondary);">{{ $order->user->email }}</div>
                    </td>
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
                    <td style="padding: 20px; text-align: right;">
                        <form action="{{ route('orders.updateStatus', $order) }}" method="POST" style="display: inline-flex; gap: 8px;">
                            @csrf
                            @method('PUT')
                            <select name="status" style="padding: 4px 12px; font-size: 0.85rem; border-radius: 8px; background: var(--bg-main);">
                                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-little btn-blue">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
