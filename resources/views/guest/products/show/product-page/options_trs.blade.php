@if(count($product->params))
    @foreach($product->params as $key => $param)
        <tr class="product-params__row">
            <th class="product-params__cell">
                <span class="product-params__cell-decor">
                    <span>{{$param->name}}</span>
                </span>
            </th>
            <td class="product-params__cell">{{$param->value}}</td>
        </tr>
        @isset($breakId)
            @if(  $key+1 == $breakId)
                @break
            @endif
        @endisset
    @endforeach
@endif
