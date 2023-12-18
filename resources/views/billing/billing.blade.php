<x-app-layout layout="billing" :assets="$assets ?? []">
    <div class="container-fluid p-0 m-0">
        <div class="row m-0">
            <div class="col-3 sidebar-container" style="height: 100vh; background-color: white;">
                <h3 class="mb-4 text-center pt-3"><b><a href="{{ route('dashboard') }}">POSTAURANT</a></b></h3>
                <div class="nav flex-column nav-tabs mb-3" id="nav-tab" role="tablist">
                    @foreach ($productType as $key => $type)
                        <button class="btn btn-outline-primary p-4 mb-2 {{ $key == 0 ? 'active' : '' }} btn-white"
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
                                    <div class="col-5 mx-2">
                                        <div class="card">
                                            <div class="d-flex flex-col p-3">
                                                <img src="/storage/{{ $item->image }}"
                                                    style="width: 100%; height: 200px;" class="img-fluid rounded">
                                            </div>
                                            <div class="d-flex flex-row justify-content-between">
                                                <div class="mx-4">
                                                    <h5>{{ $item->name }}</h5>
                                                </div>
                                                <div class="mx-4">
                                                    @if ($item->drink_type == 'Hot')
                                                        Hot
                                                    @else
                                                        Cold
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body d-flex flex-row justify-content-between">
                                                <div class="product">
                                                    <label>Size</label>
                                                    <div class="mt-2">
                                                        @foreach ($item->productSizePrice as $price)
                                                            <a class="btn size-button-input rounded-circle"
                                                                data-name="{{ $item->name }}"
                                                                data-id="{{ $price->id }}"
                                                                data-price="{{ $price->price }}">{{ $price->size }}</a>
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
            <div class="col-3" style="height: 100vh; background-color: white;">
                <h3 class="mb-4 text-center pt-3"><b>Bills</b></h3>
                <div class="container bg-white">
                    <form action="{{ route('invoice.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        
                        <div id="productList"></div>
                        {{-- <table class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th></th>
                                </tr>
                            </thead>


                        </table> --}}


                        {{-- <hr> --}}

                        <input type="text" name="sub_total" class="d-none" id="st">
                        {{-- <p>Subtotal</p> --}}
                        <div class="d-flex justify-content-between">
                            <div><strong>Subtotal:</strong></div>
                            <div><strong>$<span id="totalUSDB">00.00</span></strong></div>
                        </div>

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

                        <div class="d-flex justify-content-between">
                            <div><strong>Grand Total KHR:</strong></div>
                            <div><strong>៛<span id="totalKH">00.00</span></strong></div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div><strong>Grand Total USD:</strong></div>
                            <div><strong>$<span id="totalUSD">00.00</span></strong></div>
                        </div>

                        <div class="form-group mt-3">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="text" name="phoneNumber" class="form-control" id="phoneNumber"
                                placeholder="Enter your phone number">
                        </div>

                        {{-- <input type="text" name="total" class="d-none" id="itotal"> --}}
                        <input type="text" name="grand_total_usd" class="d-none" id="gtu">
                        <input type="text" name="grand_total_khr" class="d-none" id="gtk">

                        <button id="checkoutBtn" class="btn btn-primary p-3 rounded-4" style="width: 100%;">Print
                            Receipt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    // $(document).ready(function() {
    //     $('.size-button-input').click(function() {
    //         var name = $(this).data('name');
    //         var size = $(this).text();
    //         var id = $(this).data('id');
    //         var price = parseFloat($(this).data('price'));

    //         // Check if row exists
    //         var existingRow = $('#productList').find('.product-row[data-id="' + id + '"]');

    //         if (existingRow.length) {
    //             // Update quantity
    //             var quantitySpan = existingRow.find('.quantity');
    //             var quantityInput = existingRow.find('.quantity_input');
    //             var quantity = parseInt(quantitySpan.text()) + 1;
    //             quantitySpan.text(quantity);
    //             quantityInput.val(quantity);
    //         } else {
    //             // Add new row
    //             var html = '<div class="row product-row" data-id="' + id + '">' +
    //                 '<div class="product-name col-6">' + name + '</div>' +
    //                 '<div class="product-size col-6">' + size + '</div>' +
    //                 '<div class="product-quantity">' +
    //                 '<span class="quantity">1</span>' +
    //                 '<input type="hidden" name="quantity[' + id +
    //                 ']" class="quantity_input" value="1">' +
    //                 '<input type="hidden" name="productSizePriceId[' + id + ']" value="' + id + '">' +
    //                 '</div>' +
    //                 '<div class="product-price">$' + price + '</div>' +
    //                 '<div class="product-remove">' +
    //                 '<a class="remove-button">' +
    //                 '<svg width="10" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
    //                 '<path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>' +
    //                 '<path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>' +
    //                 '</svg>' +
    //                 '</a>' +
    //                 '</div>' +
    //                 '</div>';

    //             $('#productList').append(html);
    //         }

    //         calculateTotal();
    //     });

    //     // Update hidden inputs before submitting the form
    //     $('form').submit(function() {
    //         $('.quantity_input').each(function(index) {
    //             var quantity = parseInt($(this).prev('.quantity').text());
    //             $(this).val(quantity);
    //         });
    //     });

    //     $(document).on('click', '.remove-button', function() {
    //         $(this).closest('.product-row').remove();
    //         calculateTotal();
    //     });

    //     $(document).on('change', '.quantity', function() {
    //         calculateTotal();
    //     });

    //     $(document).on('change', '.vat', function() {
    //         calculateTotal();
    //     });


    //     function calculateTotal() {
    //         var total = 0;
    //         $('.quantity').each(function() {
    //             var quantity = $(this).text();
    //             var price = parseFloat($(this).closest('tr').find('td:eq(3)')
    //                 .text()); // Convert price to a float
    //             total += quantity * price;
    //         });

    //         // Update the quantity input field with the span number
    //         $('.quantity_input').each(function() {
    //             $(this).val($($(this).closest('tr').find('.quantity')).text());
    //         });

    //         var vat = $('#vat').val();
    //         var totalWithVAT = 0;

    //         totalWithVAT = total + (total * (vat / 100));

    //         $('#st').val(total.toFixed(2));
    //         $('#totalUSDB').text(total.toFixed(2));
    //         $('#totalKH').text(totalWithVAT.toFixed(2) * 4000);
    //         $('#totalUSD').text(totalWithVAT.toFixed(2));
    //         // $('#itotal').val(total.toFixed(2));
    //         $('#gtu').val(totalWithVAT.toFixed(2));
    //         $('#gtk').val(totalWithVAT.toFixed(2) * 4000);
    //     }
    // });

    $(document).ready(function() {
        $(document).on('click', '.size-button-input', function() {
            var name = $(this).data('name');
            var size = $(this).text();
            var id = $(this).data('id');
            var price = parseFloat($(this).data('price'));

            // Check if row exists
            var existingRow = $('.product-row[data-id="' + id + '"]');

            if (existingRow.length) {
                // Update quantity
                var quantitySpan = existingRow.find('.quantity');
                var quantityInput = existingRow.find('.quantity_input');
                var quantity = parseInt(quantitySpan.text()) + 1;
                quantitySpan.text(quantity);
                quantityInput.val(quantity);
            } else {
                // Add new row
                var html = '<div style="background-color: #D6E4FF" class="row product-row rounded-2 text-black card-body mb-2 p-2" data-id="' + id + '">' +
                    '<div class="product-name col-6 mb-2">' + name + '</div>' +
                    '<div class="product-remove col-6 text-end">' +
                    '<a class="remove-button" style="color:red">' +
                    '<svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">' +
                    '<path opacity="0.4" d="M19.643 9.48851C19.643 9.5565 19.11 16.2973 18.8056 19.1342C18.615 20.8751 17.4927 21.9311 15.8092 21.9611C14.5157 21.9901 13.2494 22.0001 12.0036 22.0001C10.6809 22.0001 9.38741 21.9901 8.13185 21.9611C6.50477 21.9221 5.38147 20.8451 5.20057 19.1342C4.88741 16.2873 4.36418 9.5565 4.35445 9.48851C4.34473 9.28351 4.41086 9.08852 4.54507 8.93053C4.67734 8.78453 4.86796 8.69653 5.06831 8.69653H18.9388C19.1382 8.69653 19.3191 8.78453 19.4621 8.93053C19.5953 9.08852 19.6624 9.28351 19.643 9.48851Z" fill="currentColor"></path>' +
                    '<path d="M21 5.97686C21 5.56588 20.6761 5.24389 20.2871 5.24389H17.3714C16.7781 5.24389 16.2627 4.8219 16.1304 4.22692L15.967 3.49795C15.7385 2.61698 14.9498 2 14.0647 2H9.93624C9.0415 2 8.26054 2.61698 8.02323 3.54595L7.87054 4.22792C7.7373 4.8219 7.22185 5.24389 6.62957 5.24389H3.71385C3.32386 5.24389 3 5.56588 3 5.97686V6.35685C3 6.75783 3.32386 7.08982 3.71385 7.08982H20.2871C20.6761 7.08982 21 6.75783 21 6.35685V5.97686Z" fill="currentColor"></path>' +
                    '</svg>' +
                    '</a>' +
                    '</div>' +
                    '<div class="product-size col-2">' + size + '</div>' +
                    '<div class="product-quantity col-2 text-start ml-2">X' +
                    '<span class="quantity">1</span>' +
                    '<input type="hidden" name="quantity[' + id +
                    ']" class="quantity_input" value="1">' +
                    '<input type="hidden" name="productSizePriceId[' + id + ']" value="' + id + '">' +
                    '</div>' +
                    '<div class="product-price col-8 text-end">$' + price + '</div>' +
                    '</div>';

                $('#productList').append(html);
            }

            calculateTotal();
        });

        $('form').submit(function() {
            $('.quantity_input').each(function(index) {
                var quantity = parseInt($(this).prev('.quantity').text());
                $(this).val(quantity);
            });
        });

        $(document).on('click', '.remove-button', function() {
            $(this).closest('.product-row').remove();
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
                var price = parseFloat($(this).closest('.product-row').find('.product-price').text()
                    .replace('$', ''));
                total += quantity * price;
            });

            $('.quantity_input').each(function() {
                var quantity = parseInt($(this).closest('.product-row').find('.quantity').text());
                $(this).val(quantity);
            });

            var vat = $('.vat').val();
            var totalWithVAT = total + (total * (vat / 100));

            $('#st').val(total.toFixed(2));
            $('#totalUSDB').text(total.toFixed(2));
            $('#totalKH').text((totalWithVAT.toFixed(2) * 4000).toFixed(2));
            $('#totalUSD').text(totalWithVAT.toFixed(2));
            $('#gtu').val(totalWithVAT.toFixed(2));
            $('#gtk').val((totalWithVAT.toFixed(2) * 4000).toFixed(2));
        }
    });
</script>
