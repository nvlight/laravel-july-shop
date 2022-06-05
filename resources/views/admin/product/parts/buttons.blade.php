<div class="d-flex justify-content-around">
    @include('admin.product.parts.buttons.show',   ['id' => $product->id])
    @include('admin.product.parts.buttons.edit',   ['id' => $product->id])
    @include('admin.product.parts.buttons.delete', ['id' => $product->id])
</div>
