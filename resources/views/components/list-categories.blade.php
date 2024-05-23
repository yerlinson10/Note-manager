<ul class="nav nav-pills d-block group-list" id="pills-tab" role="tablist">
    @foreach ($categories as $category)
    <li class="nav-item">
        <a class="nav-link list-actions {{ $CategoryinClass["$category->class"] }}" id="note-personal">{{$category->name}}</a>
    </li>
    @endforeach
</ul>