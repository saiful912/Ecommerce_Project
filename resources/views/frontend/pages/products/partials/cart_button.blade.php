{{--<form class="form-inline" action="{{route('carts.store')}}" method="post">--}}
    {{--@csrf--}}
    {{--<input type="hidden" name="product_id" value="{{$product->id}}">--}}
    {{--<button type="submit" class="btn btn-primary" onclick="addToCart({{$product->id}})"><i class="fa fa-plus"></i> Add to Cart</button>--}}
{{--</form>--}}

    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="btn btn-primary" onclick="addToCart({{$product->id}})"><i class="fa fa-plus"></i> Add to Cart</button>
