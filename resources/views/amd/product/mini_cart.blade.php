<div class="col-2"><!--MENU DESPLEGABLE DEL CARRITO-->
    <ul class="nav-item dropdown no-arrow mx-1">
        <a href="{{-- 'add_to_cart',$product->id --}}" class="badge badge-success nav-link dropdown-toggle" aria-expanded="false" data-toggle="dropdown" role="button" aria-haspopup="true">
            <i class="fa fa-shopping-cart"></i>
             <span class="badge badge-pill badge-danger">{{ $shopping_cart->quantity_of_products() }}</span> carrito</a>

        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">
                Carrito de Compras
            </h6>
            @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail )
                <li>
                    <div class="cart-image">
                        <a href=""><img src="{{ $shopping_cart_detail->pro->image->pluck('url')[0] }}" alt=""></a>
                    </div>
                    <div class="cart-info">
                        <h4><a href="">{{ $shopping_cart_detail->pro->name }}</a></h4>
                        <span>{{ $shopping_cart_detail->product->pro->price }}</span>
                    </div>
                </li>
            @endforeach
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-primary">
                        <i class="fas fa-file-alt text-white"></i>
                    </div>
                    @foreach ($shopping_cart->shopping_cart_details as $shopping_cart_detail )
                <li>
                    <div class="cart-image">
                        <a href=""><img src="{{ $shopping_cart_detail->pro->image->pluck('url')[0] }}" alt=""></a>
                    </div>
                    <div class="cart-info">
                        <h4><a href="">{{ $shopping_cart_detail->pro->name }}</a></h4>
                        <span>{{ $shopping_cart_detail->product->pro->price }}</span>
                    </div>
                </li>
            @endforeach
                    <span>Subtotal: {{ $shopping_cart->total_price() }}</span>
                </div>
                <div>
                    <div class="small text-gray-500">December 12, 2019</div>
                    <span class="font-weight-bold">A download!</span>
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-success">
                        <i class="fas fa-donate text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">December 7, 2019</div>
                    $290.29 account!
                </div>
            </a>
            <a class="dropdown-item d-flex align-items-center" href="#">
                <div class="mr-3">
                    <div class="icon-circle bg-warning">
                        <i class="fas fa-exclamation-triangle text-white"></i>
                    </div>
                </div>
                <div>
                    <div class="small text-gray-500">Abril, 2023</div>
                    Spending Alert: account.
                </div>
            </a>
            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
        </div>
    </ul>
</div>
