    @foreach ($submenus as $submenu)
        <ul class="list-unstyled" data-link="{{ $submenu->alias }}">
            @foreach ($submenu->children as $child)
                @include('sonemenus::child', ['child' => $child])
            @endforeach
        </ul>
    @endforeach
