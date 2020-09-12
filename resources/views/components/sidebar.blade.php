<aside class="sidebar">
    @foreach($links as $link)
        @if(is_array($link['url']))
            @if(isset($link['role']))
            @role($link['role'])
            <div class="accordion menu menu-nav">
                <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
                <label class="accordion-header c-hand" for="accordion-1">
                    <i data-feather="{{ $link['icon'] }}"></i>
                    {{ $link['name'] }}
                    <i class="icon icon-arrow-right float-right mt-1 mr-1"></i>
                </label>
                <div class="accordion-body">
                    <ul class="menu menu-nav">
                        @foreach($link['url'] as $sub)
                        <li class="menu-item">
                            <a href="{{ $sub['url'] }}">
                                <i data-feather="{{ $sub['icon'] }}"></i>
                                {{ $sub['name'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endrole
            @else
            <div class="accordion menu menu-nav">
                <input type="checkbox" id="accordion-1" name="accordion-checkbox" hidden>
                <label class="accordion-header c-hand" for="accordion-1">
                    <i data-feather="{{ $link['icon'] }}"></i>
                    {{ $link['name'] }}
                    <i class="icon icon-arrow-right float-right mt-1 mr-1"></i>
                </label>
                <div class="accordion-body">
                    <ul class="menu menu-nav">
                        @foreach($link['url'] as $sub)
                        <li class="menu-item">
                            <a href="{{ $sub['url'] }}">
                                <i data-feather="{{ $sub['icon'] }}"></i>
                                {{ $sub['name'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endif
        @else
            @if(isset($link['role']))
            @role($link['role'])
            <ul class="menu menu-nav">
                <li class="menu-item">
                    <a href="{{ $link['url'] }}">
                        <i data-feather="{{ $link['icon'] }}"></i>
                        {{ $link['name'] }}
                    </a>
                </li>
            </ul>
            @endrole
            @else
            <ul class="menu menu-nav">
                <li class="menu-item">
                    <a href="{{ $link['url'] }}">
                        <i data-feather="{{ $link['icon'] }}"></i>
                        {{ $link['name'] }}
                    </a>
                </li>
            </ul>
            @endif
        @endif
    @endforeach
</aside>
