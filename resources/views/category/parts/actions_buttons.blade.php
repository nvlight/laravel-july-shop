<td class="d-flex justify-content-around">
    @include('category.parts.show_button',   ['id' => $category->id])
    @include('category.parts.edit_button',   ['id' => $category->id, 'class' => 'd-flex'])
    @include('category.parts.delete_button', ['id' => $category->id])
</td>
