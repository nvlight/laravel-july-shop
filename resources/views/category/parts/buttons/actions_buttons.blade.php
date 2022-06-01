<td class="d-flex justify-content-around">
    @include('category.parts.buttons.show_button',   ['id' => $category->id])
    @include('category.parts.buttons.edit_button',   ['id' => $category->id, 'class' => 'd-flex'])
    @include('category.parts.buttons.delete_button', ['id' => $category->id])
</td>
