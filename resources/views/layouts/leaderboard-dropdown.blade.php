@php
    $leaderboard = App\Models\DrinkOrder::selectRaw('user_id, sum(quantity) as total_drinks')
        ->groupBy('user_id')
        ->orderBy('total_drinks', 'desc')
        ->with('user')
        ->take(10)
        ->get();
@endphp

<li class="dropdown" onclick="toggleDropdown(event, this)">
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div style="display: flex; align-items: center;">
            <span class="material-symbols-outlined" style="margin-right: 6px;">leaderboard</span>
            <div>Top Drinkers</div>
            <span class="material-symbols-outlined dropdownarrow">keyboard_arrow_up</span>
        </div>
    </div>
    <ul style="display: none;">
        @foreach($leaderboard as $entry)
            @if($entry->user)
                <li onclick="event.stopPropagation();" style="cursor: default;">
                    <div style="display: flex; justify-content: space-between; align-items: center; width: 100%; padding-right: 10px;">
                        <span>{{ $entry->user->name }}</span>
                        <span style="font-weight: bold; color: var(--primary);">{{ $entry->total_drinks }}</span>
                    </div>
                </li>
            @endif
        @endforeach
        @if($leaderboard->isEmpty())
             <li onclick="event.stopPropagation();" style="cursor: default;">
                <div style="color: var(--text-secondary); font-style: italic;">No data available</div>
            </li>
        @endif
    </ul>
</li>
