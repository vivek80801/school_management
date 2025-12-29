@php($menus = \App\Facades\MenuBuilderFacade::getMenu())
<div>
    @foreach($menus as $key => $menu)
        @if(!$menu->parent)
            <a href="{{$menu->url}}">{{$menu->name}}</a>
        @endif
    @endforeach
</div>
