<x-app-layout layout="billing" :assets="$assets ?? []">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2 sidebar-container" style="height: 100vh; background-color: white;">
                <h3 class="mb-4 text-center pt-3"><b><a href="{{ route('dashboard') }}">POSTAURANT</a></b></h3>
                <div class="nav flex-column nav-tabs mb-3" id="nav-tab" role="tablist">
                    @foreach ($productType as $key => $type)
                        <button class="btn btn-outline-warning p-4 mb-2 {{ $key == 0 ? 'active' : '' }} btn-white"
                            data-bs-toggle="tab" data-bs-target="#{{ $type->type }}" type="button" role="tab"
                            aria-controls="nav-home" aria-selected="true"><b>{{ $type->type }}</b></button>
                    @endforeach
                </div>
            </div>
            <div class="col-6">
                <h3 class="mb-4 text-center pt-3"><b>Menu</b></h3>
                <div class="tab-content">
                    @foreach ($product as $key => $value)
                        <div class="tab-pane fade {{ $key == array_values($productType->toArray())[0]['type'] ? 'show active' : '' }}"
                            id="{{ $key }}">
                            <div class="d-flex flex-wrap justify-content-center">
                                @foreach ($value as $item)
                                    <div class="col-md-4 mx-2">
                                        <div class="card">
                                            <div class="d-flex flex-col p-3">
                                                <img src="/storage/{{ $item->image }}"
                                                    style="width: 50%; height: 120px;" class="img-fluid rounded">
                                                <div class="mx-4">
                                                    <h5>{{ $item->name }}</h5>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="product">
                                                    <label>Size</label>
                                                    <div class="size-buttons mt-2">
                                                        @foreach ($item->productSizePrice as $price)
                                                            <button class="btn btn-primary size-button rounded-circle"
                                                                data-name="{{ $item->name }}"
                                                                data-id="{{ $price->id }}"
                                                                data-price="{{ $price->price }}">{{ $price->size }}</button>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="col-4" style="height: 100vh; background-color: white;">
                <h3 class="mb-4 text-center pt-3"><b>Bills</b></h3>
                <div class="container bg-white">
                    <form action="{{ route('invoice.store') }}" method="POST">
                        @csrf
                        @method('POST')

                        <table class="table p-5" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody id="productList"></tbody>
                        </table>

                        <hr>


                        <input type="text" name="sub_total" class="d-none" id="st">
                        {{-- <p>Subtotal</p> --}}
                        <p><strong>Subtotal: $<span id="totalUSDB" class="align-item-end">00.00</span></strong></p>

                        <label for="vat">VAT (%):</label>
                        <input type="text" name="vat" class="form-control mb-3 vat" id="vat"
                            placeholder="Enter VAT (%)" value="10">
                        <hr
                            style="display: inline-block;
                        border: none;
                        border-top: 3px dotted rgb(0, 0, 0);
                        color: #fff;
                        background-color: #fff;
                        height: 1px;
                        width: 100%;">
                        <p><strong>Grand Total: ៛<span id="totalKH">00.00</span></strong></p>
                        <p><strong>Grand Total: $<span id="totalUSD">00.00</span></strong></p>

                        <div class="form-group mt-3">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
                                placeholder="Enter your phone number">
                        </div>

                        {{-- <input type="text" name="total" class="d-none" id="itotal"> --}}
                        <input type="text" name="grand_total_usd" class="d-none" id="gtu">
                        <input type="text" name="grand_total_khr" class="d-none" id="gtk">

                        <button id="checkoutBtn" class="btn btn-primary">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    $(document).ready(function() {
        $('.size-button').click(function() {
            var name = $(this).data('name');
            var size = $(this).text();
            var id = $(this).data('id');
            var price = parseFloat($(this).data('price'));

            // Check if row exists
            var existingRow = $('#productList tr[data-id="' + id + '"]');

            if (existingRow.length) {
                // Update quantity
                var quantitySpan = existingRow.find('.quantity');
                var quantityInput = existingRow.find('.quantity_input');
                var quantity = parseInt(quantitySpan.text()) + 1;
                quantitySpan.text(quantity);
                quantityInput.val(quantity);
            } else {
                // Add new row
                var tr = document.createElement('tr');
                var html = '<tr data-id="' + id + '">' +
                    '<td>' + name + '</td>' +
                    '<td>' + size + '</td>' +
                    '<td><span class="quantity">1</span>' +
                    '<input type="hidden" name="quantity[' + id +
                    ']" class="quantity_input" value="1">' +
                    '<input type="hidden" name="productSizePriceId[' + id + ']" value="' + id +
                    '"></td>' +
                    '<td>' + price + '</td>' +
                    '<td><button class="btn btn-danger remove-button">' +
                    'Remove</button></td></tr>';

                $('#productList').append(html);
            }

            calculateTotal();
        });

        // Update hidden inputs before submitting the form
        $('form').submit(function() {
            $('.quantity_input').each(function(index) {
                var quantity = parseInt($(this).prev('.quantity').text());
                $(this).val(quantity);
            });
        });

        $(document).on('click', '.remove-button', function() {
            $(this).closest('tr').remove();
            calculateTotal();
        });

        $(document).on('change', '.quantity', function() {
            calculateTotal();
        });

        $(document).on('change', '.vat', function() {
            calculateTotal();
        });


        function calculateTotal() {
            var total = 0;
            $('.quantity').each(function() {
                var quantity = $(this).text();
                var price = parseFloat($(this).closest('tr').find('td:eq(3)')
                    .text()); // Convert price to a float
                total += quantity * price;
            });

            // Update the quantity input field with the span number
            $('.quantity_input').each(function() {
                $(this).val($($(this).closest('tr').find('.quantity')).text());
            });

            var vat = $('#vat').val();
            var totalWithVAT = 0;

            totalWithVAT = total + (total * (vat / 100));

            $('#st').val(total.toFixed(2));
            $('#totalUSDB').text(total.toFixed(2));
            $('#totalKH').text(totalWithVAT.toFixed(2) * 4000);
            $('#totalUSD').text(totalWithVAT.toFixed(2));
            // $('#itotal').val(total.toFixed(2));
            $('#gtu').val(totalWithVAT.toFixed(2));
            $('#gtk').val(totalWithVAT.toFixed(2) * 4000);
        }
    });
</script>
