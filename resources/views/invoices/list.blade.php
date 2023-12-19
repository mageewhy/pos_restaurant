<x-app-layout :assets="$assets ?? []">

    <div class="card overflow-hidden">
        <div class="card-header d-flex justify-content-between flex-wrap">
            <div class="header-title">
                <h4 class="card-title mb-2">All Receipts</h4>
                <h5 class="mb-0 text-info">
                    <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path opacity="0.4"
                            d="M16.191 2H7.81C4.77 2 3 3.78 3 6.83V17.16C3 20.26 4.77 22 7.81 22H16.191C19.28 22 21 20.26 21 17.16V6.83C21 3.78 19.28 2 16.191 2Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M8.07996 6.6499V6.6599C7.64896 6.6599 7.29996 7.0099 7.29996 7.4399C7.29996 7.8699 7.64896 8.2199 8.07996 8.2199H11.069C11.5 8.2199 11.85 7.8699 11.85 7.4289C11.85 6.9999 11.5 6.6499 11.069 6.6499H8.07996ZM15.92 12.7399H8.07996C7.64896 12.7399 7.29996 12.3899 7.29996 11.9599C7.29996 11.5299 7.64896 11.1789 8.07996 11.1789H15.92C16.35 11.1789 16.7 11.5299 16.7 11.9599C16.7 12.3899 16.35 12.7399 15.92 12.7399ZM15.92 17.3099H8.07996C7.77996 17.3499 7.48996 17.1999 7.32996 16.9499C7.16996 16.6899 7.16996 16.3599 7.32996 16.1099C7.48996 15.8499 7.77996 15.7099 8.07996 15.7399H15.92C16.319 15.7799 16.62 16.1199 16.62 16.5299C16.62 16.9289 16.319 17.2699 15.92 17.3099Z"
                            fill="currentColor"></path>
                    </svg>
                    {{ $invoice_sales->count() }}
                </h5>
            </div>
            <div class="dropdown text-end col-6">
                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                    aria-expanded="false">{{ $selectedDate }}</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                    <li><a href="{{ route('invoices.index', ['date' => 'today']) }}" class="dropdown-item"
                            id="today">Today</a></li>
                    <li><a href="{{ route('invoices.index', ['date' => 'this_week']) }}" class="dropdown-item"
                            id="this_week">This Week</a></li>
                    <li><a href="{{ route('invoices.index', ['date' => 'this_month']) }}" class="dropdown-item"
                            id="this_month">This Month</a></li>
                    <li><a href="{{ route('invoices.index', ['date' => 'this_year']) }}" class="dropdown-item"
                            id="this_year">This Year</a></li>
                </ul>
                <div class="text-end text-info p-3">Date: {{ $queryDate }}</div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive mt-4">
                <table id="basic-table" class="table table-striped mb-0" role="grid">
                    <thead>
                        <tr>
                            <th>Invoice No.</th>
                            <th>Price</th>
                            <th>Total (10% VAT)</th>
                            <th>Member No.</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice_sales as $item)
                            <tr>
                                <td>{{ $item->invoice_number }}</td>
                                <td>${{ $item->grand_total_usd }}</td>
                                <td>{{ $item->vat }}</td>
                                <td class="text-success">
                                    {{ $item->member ? $item->member->phone_number : '' }}
                                </td>
                                <td class="text-info">{{ $item->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination justify-content-center mt-3">
                    {{ $invoice_sales->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>

<script>
    // Update the displayed text when a dropdown item is clicked
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const dropdownToggle = document.querySelector('.dropdown-toggle');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            dropdownToggle.textContent = this.textContent;
        });
    });
</script>
