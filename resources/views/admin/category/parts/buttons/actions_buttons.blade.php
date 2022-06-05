<td class="d-flex justify-content-around">
    @include('admin.category.parts.buttons.show_button',   ['id' => $category->id])
    @include('admin.category.parts.buttons.edit_button',   ['id' => $category->id, 'class' => 'd-flex'])
    @include('admin.category.parts.buttons.delete_button', ['id' => $category->id])
</td>
