@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Dashboard</h1>
    <p>Welcome back! Here's an overview of your administration modules.</p>
</div>

<div class="sectionbox">
    <div class="componentbox" onclick="window.location.href='/drinks'">
        <div class="componentboxheader">
            <span>Drink Ordering</span>
            <span class="material-symbols-outlined" style="color: var(--accent);">local_cafe</span>
        </div>
        <div style="flex: 1; color: var(--text-secondary); line-height: 1.6;">
            Access the beverage catalog and place orders. Manage available stock and pricing through the admin portal.
        </div>
        <div style="margin-top: auto;">
            <button class="btn btn-blue" style="width: 100%;">Open Drinks Catalog</button>
        </div>
    </div>

    <!-- Future Module Template -->
    <div class="componentbox" style="opacity: 0.7; border-style: dashed;">
        <div class="componentboxheader">
            <span>Inventory Management</span>
            <span class="material-symbols-outlined">inventory_2</span>
        </div>
        <div style="flex: 1; color: var(--text-secondary); line-height: 1.6;">
            Module coming soon. This system is ready to host your next administration tool.
        </div>
        <div style="margin-top: auto;">
            <button class="btn btn-ghost" style="width: 100%;" disabled>Coming Soon</button>
        </div>
    </div>
</div>
@endsection