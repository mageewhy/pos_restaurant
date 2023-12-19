<!doctype html>
<html lang="en">

<head>
    <title>Receipt</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="col-4" style="height: 100vh; background-color: white;">
        <h3 class="mb-4 text-center"><b>{{ $user->userProfile->company_name }}</b></h3>
        <h6 class="mb-4 text-center p-0">{{ $user->userProfile->street_addr_1 }}</h6>
        <table class="table table-striped dataTable">
            <thead class="">
                <tr>
                    <th colspan="2" class="text-center">Invoice</th>
                    <th colspan="2" class="text-center">{{ $invoice->invoice_number }}</th>
                    <th colspan="2" class="text-center">{{ $date }}</th>
                </tr>
            </thead>
        </table>

        <div class="container bg-white">
            <table class="table" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Description</th>
                        <th>Size</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoice as $item)
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforeach

                </tbody>

            </table>


            <hr>

            <div class="d-flex justify-content-between">
                <div><strong><label>Subtotal:</label></strong></div>
                <div><strong>$<span id="totalUSDB">00.00</span></strong></div>
            </div>

            <div class="d-flex justify-content-between">
                <div><strong><label>VAT: </label></strong></div>
                <div><strong><span>10%</span></strong></div>
                
            </div>
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
                <div><strong>៛<span id="totalKH">{{ $invoice->grand_total_khr }}</span></strong></div>
            </div>
            <div class="d-flex justify-content-between">
                <div><strong>Grand Total USD:</strong></div>
                <div><strong>$<span id="totalUSD">{{ $invoice->grand_total_usd }}</span></strong></div>
            </div>
            @if ($invoice->member_point_id == NULL)
                
            @else
                <div class="form-group mt-3">
                    <label for="phoneNumber">Phone Number:
                        <span class="text-danger">*</span>
                    </label>
                </div>
            @endif
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
