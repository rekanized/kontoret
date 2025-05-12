@foreach($navigationItems as $navItem)
    @php $hasChildren = $navItem->children->isNotEmpty() @endphp
    <li @if($hasChildren) class="dropdown" onclick="toggleDropdown(event, this)" @else route="{{ $navItem->route }}" onclick="event.stopPropagation();window.location.href = '{{ $navItem->route }}'" @endif>
        <div style="display: flex; align-items: center;justify-content: space-between;">
            <div style="display: flex;align-items: center;">
                <span class="material-symbols-outlined" style="margin-right: 6px;">{{ $navItem->icon }}</span>
                <div>{{ $navItem->name }}</div>
                @if($hasChildren)
                    <span class="material-symbols-outlined dropdownarrow">keyboard_arrow_up</span>
                @endif
            </div>
            <div class="menuselect">
                @if(!$hasChildren)
                    <span class="material-symbols-outlined">arrow_right_alt</span>
                @endif
            </div>
        </div>
        @if($hasChildren)
            <ul style="display: none">
                @foreach($navItem->children->sortBy('order') as $navChild)
                    @include('layouts.menu', ['navigationItems' => [$navChild]])
                @endforeach
            </ul>
        @endif
    </li>
@endforeach