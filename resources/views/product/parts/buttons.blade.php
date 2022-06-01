<div class="d-flex justify-content-around">
    @include('product.parts.buttons.show',   ['id' => $product->id])
    @include('product.parts.buttons.edit',   ['id' => $product->id])
    @include('product.parts.buttons.delete', ['id' => $product->id])
</div>
