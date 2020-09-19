<aside class="sidebar">
    @foreach($links as $link)
        @if(is_array($link['url']))
            
            @if(isset($link['permission']))
                @can($link['permission'])
                    @include('includes/sidebar-accordion', ['link' => $link])
                @endcan
            @else
                @include('includes/sidebar-accordion', ['link' => $link])
            @endif

        @else

            @if (array_key_exists('auth', $link))
                @if(Auth::user())
                    @include('includes/sidebar-link', ['link' => $link])
                @endif
            @elseif(array_key_exists('permission', $link))
                @can($link['permission'])
                    @include('includes/sidebar-link', ['link' => $link])
                @endcan
            @else
                @include('includes/sidebar-link', ['link' => $link])
            @endif

        @endif
    @endforeach
</aside>
