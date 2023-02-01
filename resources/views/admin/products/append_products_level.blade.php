<?php 
//use to hold update selected value
$currentParentId= isset($product['parent_id'])? $product['parent_id']:0;
?>
<label for="parent_id">Select Category Level</label>
<select name="parent_id" class="form-control" id="parent_id">
    <option value="0" {{ ($currentParentId=='0') ? "selected": "" }} >Main Category</option>
    @if(!empty($categories))
        @foreach($categories as $category)
                       
        <option value="{{$category['id']}}" {{ ($currentParentId==$category['id']) ? "selected": "" }} >{{ $category['category_name']}}</option>
            
        @if(!empty($category['subcategory']))
            @foreach($category['subcategory'] as $subcategory)
            <option value="{{$subcategory['id']}}" {{ ($currentParentId==$subcategory['id']) ? "selected": "" }} >{{ $subcategory['category_name']}}</option>
            @endforeach
        @endif
        @endforeach
    @endif
</select>