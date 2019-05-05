@php
    $items = $menu->items;
    $hasItems = !empty($items) && $items->count() > 0;
@endphp

<li class="menu-item {{ $hasItems ? 'menu-item-has-children ' : '' }}px-1">
    <a class="nav-link" href="{{ $menu->getUrl() }}">{{ $menu->title }}</a>
    @if ($hasItems)
        <ul class="sub-menu">
            @foreach($items as $item)
                @include('components.menu-item', ['menu' => $item])
            @endforeach
        </ul>
    @endif
</li>
