@php($menus = \App\Facades\MenuBuilderFacade::getMenu())
<div class="menubar">
    @foreach($menus as $key => $menu)
        @if(!$menu->parent)
            @if (count($menu->children) <= 0)
                <a href="{{$menu->url}}">{{$menu->name}}</a>
            @else
                <div class="menu-item">
                    <a href="#">{{$menu->name}}</a>
                    <div class="sub-menu" style="display: none;">
                        @foreach ($menu->children as $sub_menu)
                            <a href="{{$sub_menu->url}}">{{$sub_menu->name}}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endif
    @endforeach
</div>

@push ("javascript")
    <script>
        const menuItems = [...document.querySelectorAll(".menu-item")]

        menuItems.forEach(function (MenuItem) {
            MenuItem.addEventListener("click", function () {
                const subMenus = [...MenuItem.querySelectorAll(".sub-menu")];
                subMenus.forEach(function(subMenuItem){
                    if(subMenuItem.style.display === "none"){
                        subMenuItem.style.display = "block";
                    }else {
                        subMenuItem.style.display = "none";
                    }
                });
            });
        });
    </script>
@endpush
