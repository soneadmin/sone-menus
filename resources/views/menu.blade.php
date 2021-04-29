                @foreach($menus as $menu)
                    <li @if($menu->id == 1) class="active" @endif><a @if($menu->url != NULL) target="_blank" @endif href="@if($menu->url == NULL)#{{ $menu->alias }}@else {{ $menu->url }} @endif"><i class="{{ $menu->icon }}"></i> <span>{{ __('sone::admin.'.$menu->alias)}}</span></a></li>
                @endforeach
