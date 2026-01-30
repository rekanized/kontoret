@extends('layouts.main-layout')

@section('content')
<div class="transparentsectionbox">
    <h1>Create Beverage Entry</h1>
    <p>Add a new drink to the organizational catalog.</p>
</div>

<div class="glass-card" style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('drinks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Beverage Name</label>
            <input type="text" name="name" id="name" required placeholder="e.g., Artisan Cold Brew">
        </div>

        <div class="form-group">
            <label for="description" class="form-label">Flavor Profile / Description</label>
            <textarea name="description" id="description" rows="4" placeholder="Describe the beverage..."></textarea>
        </div>

        <div class="form-group" style="padding: 20px; background: rgba(255,255,255,0.02); border-radius: 16px; border: 1px solid var(--glass-border); flex-direction: row; align-items: center; justify-content: space-between;">
            <label for="is_available" class="form-label" style="margin: 0;">Currently In Stock</label>
            <div style="position: relative; display: inline-block; width: 44px; height: 24px;">
                <input type="hidden" name="is_available" value="0">
                <input type="checkbox" name="is_available" id="is_available" value="1" checked style="opacity: 0; width: 0; height: 0;">
                <label for="is_available" style="position: absolute; cursor: pointer; top: 0; left: 0; right: 0; bottom: 0; background-color: #334155; transition: .4s; border-radius: 34px;"></label>
            </div>
        </div>

        <div style="display: flex; gap: 12px; margin-top: 30px;">
            <button type="submit" class="btn btn-blue" style="flex: 1;">Create Entry</button>
            <a href="{{ route('drinks.admin.index') }}" class="btn btn-ghost">Cancel</a>
        </div>
    </form>
</div>

<style>
    /* Toggle Switch Logic (Simplified for Vanilla) */
    input:checked + label {
        background-color: var(--accent) !important;
    }
    label:after {
        content: "";
        position: absolute;
        height: 18px;
        width: 18px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }
    input:checked + label:after {
        transform: translateX(20px);
    }
</style>
@endsection
