<div class="col l-2 m-0 c-0">
    <nav class="category">
        <h3 class="category__heading">
            Danh mục
        </h3>

        <ul class="category-list">
            @foreach($categories as $item)

                <li class="category-item">
                    <a href="#" class="category-item__link">{{$item->name}}</a>
                </li>

            @endforeach
        </ul>
    </nav>
</div>
