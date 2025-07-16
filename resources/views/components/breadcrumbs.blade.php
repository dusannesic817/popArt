@props(['crumb', 'isLast' => false])

<li class="breadcrumb-item {{ $isLast ? 'active' : '' }}" {{ $isLast ? 'aria-current=page' : '' }}>
    @if ($isLast)
        {{ $crumb->name }}
    @else
        <a href="{{ route('categories.show', $crumb) }}">{{ $crumb->name }}</a>
    @endif
</li>