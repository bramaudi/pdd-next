<div class="accordion menu menu-nav">
    <input type="checkbox" id="accordion-{{ $link['name'] }}" name="accordion-checkbox" hidden>
    <label class="accordion-header c-hand" for="accordion-{{ $link['name'] }}">
        <i class="fas fa-{{ $link['icon'] }}"></i>
        {{ $link['name'] }}
        <i class="icon icon-arrow-right float-right mt-1 mr-1"></i>
    </label>
    <div class="accordion-body">
        <ul class="menu menu-nav">
            @foreach($link['url'] as $sub)
            <li class="menu-item">
                <a href="{{ $sub['url'] }}">
                    <i class="fas fa-{{ $sub['icon'] }}"></i>
                    {{ $sub['name'] }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>