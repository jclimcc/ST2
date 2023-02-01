<ul>
    @foreach($childs as $child)
        <li>            
            {{ $child->category_name}}
            @if(!empty($child->subCategories()))
                @include('admin.categories.manageCategoryChild',['childs' => $child->subCategories])
            @endif
        </li>
    @endforeach
    </ul>