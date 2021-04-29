<li class="menu-parent-wrapper">
    <a class="menu-parent-wrapper--toggler nav-link last level-{{ $child->level }}" href="@if($child->route != NULL){{ route($child->route) }}@else{{ $child->url }}@endif">
        <i class="{{ $child->icon }}"></i>
        <span>{{ __('sone::admin.'.$child->alias) }}</span>
        @if ($child->menus->count() > 0)
        <div class="menu-parent-wrapper--toggler-icon"></div>
        @endif
    </a>
    @if ($child->menus)
        <ul>
            @foreach ($child->menus as $child)
                @include('sonemenus::child', ['child' => $child])
            @endforeach
        </ul>
    @endif
</li>
