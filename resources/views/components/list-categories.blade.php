<ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
    @forelse ($categories as $category)
    <li class="nav-item">
        <a class="nav-link list-actions {{ isset($categoryInClass["$category->class"]) ? $categoryInClass["$category->class"] : 'g-dot-dark' }}" id="note-personal">{{$category->name}}</a>
    </li>
    @empty
    <li class="nav-item">
        No hay categorías
    </li>
    @endforelse
</ul>