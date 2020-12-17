<div class="breadcrumb">
    @foreach($prev as $name => $link)
    <a class="breadcrumb--item" href="{{ $link }}">{{ $name }}</a>
    <div class="breadcrumb--separator">/</div>
    @endforeach
    <span class="breadcrumb--item-active">{{ $current }}</span>
</div>