<x-app-layout layout="simple" :assets="$assets ?? []">
<div class="container-fluid m-0 p-0">
    <div class="col-lg-12">
            <div class="card-body">
                <div class="container-fluid p-3 mt-3">
                    <nav>
                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                            @foreach ($productType as $key => $type)
                                <button class="nav-link {{ $key == 0 ? 'active' : '' }}" data-bs-toggle="tab" data-bs-target="#{{$type->type}}" type="button" role="tab" aria-controls="nav-home" aria-selected="true">{{$type->type}}</button>
                            @endforeach
                        </div>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="tab-content">
                            @foreach ($product as $key => $value)
                                <div class="tab-pane fade {{ $key == array_values($productType->toArray())[0]['type'] ? 'show active' : '' }}" id="{{$key}}">
                                    @foreach ($value as $item)
                                        <div class="col-md-6">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h5>{{$item->name}}</h5>
                                                </div>
                                                <div class="card-body">
                                                    <div class="product">
                                                        <img src="/storage/{{$item->image}}" style="width: 100%; height: 200px;">
                                                        <div class="size-buttons mt-3">
                                                            @foreach ($item->productSizePrice as $price)
                                                                <button class="btn btn-primary size-button" data-name="{{$item->name}}" data-id="{{$price->id}}"  data-price="{{$price->price}}">{{$price->size}}</button>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    </div>

                      <div class="col-md-6">
                        <!-- Order Summary -->
                        <div class="container bg-white m-0 p-2">
                            <div class="container bg-white mb-2">
                                <h5>Order Summary</h5>
                            </div>
                            <div class="container bg-white">
                                <form action="{{route('invoice.store')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productList">
                                        </tbody>
                                    </table>
                                    <hr>
                                    <label for="vat">VAT (%):</label>
                                    <input type="text" name="vat" class="form-control mb-3 vat" id="vat" placeholder="Enter VAT (%)" value="10">
                                    <input type="text" name="sub_total" class="d-none" id="st">
                                    <p>Subtotal</p>
                                    <p><strong>Subtotal: $<span id="totalUSDB">00.00</span></strong></p>
                                    <p>Total After VAT</p>
                                    <p><strong>Total: ៛<span id="totalKH">00.00</span></strong></p>
                                    <p><strong>Total: $<span id="totalUSD">00.00</span></strong></p>
                                    <div class="form-group mt-3">
                                        <label for="phoneNumber">Phone Number:</label>
                                        <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Enter your phone number">
                                        <input type="text" name="total" class="d-none" id="itotal">
                                        <input type="text" name="grand_total_usd" class="d-none" id="gtu">
                                        <input type="text" name="grand_total_khr" class="d-none" id="gtk">
                                    </div>
                                    <!-- Checkout Button -->
                                    <button id="checkoutBtn" class="btn btn-primary">Checkout</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>


<script>
    $(document).ready(function() {
    $('.size-button').click(function() {
        var list = document.getElementById('productList').children.length;
        var name = $(this).data('name');
        var price = parseFloat($(this).data('price')); // Convert price to a float
        var size = $(this).text();
        var id = $(this).data('id');
        var tr = document.createElement('tr');

        var html = '<tr><td>'+name+'</td><td>'+size+'</td><td><input type="text" class="form-control quantity" name="quantity['+ list +']" value="1"><input type="text" class="d-none" name="productSizePriceId['+ list +']" value="'+ id +'"></td><td>'+price +' $'+'</td><td><button class="btn btn-danger remove-button">Remove</button></td></tr>';
        $('#productList').append(html);
        calculateTotal();
    });

    $(document).on('change', '.quantity', function() {
        calculateTotal();
    });

    $(document).on('change', '.vat', function() {
        calculateTotal();
    });

    $(document).on('click', '.remove-button', function() {
        $(this).closest('tr').remove();
        calculateTotal();
    });

    function calculateTotal() {
        var total = 0;
        $('.quantity').each(function() {
            var quantity = $(this).val();
            var price = parseFloat($(this).closest('tr').find('td:eq(3)').text()); // Convert price to a float
            total += quantity * price;
        });

        var vat = $('#vat').val();
        var totalWithVAT = 0;

        totalWithVAT = total + (total * (vat / 100));

        $('#st').val(total.toFixed(2));
        $('#totalUSDB').text(total.toFixed(2));
        $('#totalKH').text(totalWithVAT.toFixed(2) * 4000);
        $('#totalUSD').text(totalWithVAT.toFixed(2));
        $('#itotal').val(total.toFixed(2));
        $('#gtu').val(totalWithVAT.toFixed(2));
        $('#gtk').val(totalWithVAT.toFixed(2) * 4000);
    }
});
</script>
