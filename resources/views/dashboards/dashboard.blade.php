<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="row row-cols-1">
                <div class="d-slider1 overflow-hidden ">
                    <ul class="col-lg-12 list-inline m-0 p-0 mb-2">
                        <div class="col-lg-12 d-flex">
                            <li class="card card-slide col-lg-4" data-aos="fade-up" data-aos-delay="700">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-01"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" height="24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Sales</p>
                                            <h4 class="counter" style="visibility: visible;">${{ $sum_total }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1200">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-06"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Today</p>
                                            <h4 class="counter">${{ $sum_today }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1300">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-07"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                                            <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Members</p>
                                            <h4 class="counter">{{ $member->count() }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div>

                        {{-- Added Feature --}}
                        {{-- <div class="col-lg-12 d-flex">
                            <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1000">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-04"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                                            <svg class="card-slie-arrow " width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Revenue</p>
                                            <h4 class="counter text-danger">N/A</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1100">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-05"
                                            class="circle-progress-01 circle-progress circle-progress-primary text-center"
                                            data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                                            <svg class="card-slie-arrow " width="24px" height="24px"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Net Income</p>
                                            <h4 class="counter text-danger">N/A</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="800">
                                <div class="card-body">
                                    <div class="progress-widget">
                                        <div id="circle-progress-02"
                                            class="circle-progress-01 circle-progress circle-progress-info text-center"
                                            data-min-value="0" data-max-value="100" data-value="80"
                                            data-type="percent">
                                            <svg class="card-slie-arrow " width="24" height="24"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                            </svg>
                                        </div>
                                        <div class="progress-detail">
                                            <p class="mb-2">Total Profit</p>
                                            <h4 class="counter text-danger">N/A</h4>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </div> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-12">
            <div class="row">
                {{-- <div class="col-md-12 col-lg-12">
                    <div class="card" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    ${{ $sum_usd }} | ៛{{ $sum_khr }}
                                </h4>
                                <p class="mb-0">Gross Sales</p>
                            </div>
                            <div class="d-flex align-items-center align-self-center">
                                <div class="d-flex align-items-center text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <g id="Solid dot2">
                                            <circle id="Ellipse 65" cx="12" cy="12" r="8"
                                                fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                    <div class="ms-2">
                                        <span class="text-gray">Sales USD</span>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center ms-3 text-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <g id="Solid dot3">
                                            <circle id="Ellipse 66" cx="12" cy="12" r="8"
                                                fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                    <div class="ms-2">
                                        <span class="text-gray">Sales KHR</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">{{ $selectedDate }}</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                    <li><a href="{{ route('dashboard', ['date' => 'today']) }}" class="dropdown-item" id="today">Today</a></li>
                                    <li><a href="{{ route('dashboard', ['date' => 'this_week']) }}" class="dropdown-item" id="this_week">This Week</a></li>
                                    <li><a href="{{ route('dashboard', ['date' => 'this_month']) }}" class="dropdown-item" id="this_month">This Month</a></li>
                                    <li><a href="{{ route('dashboard', ['date' => 'this_year']) }}" class="dropdown-item" id="this_year">This Year</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="d-main" class="d-main"></div>
                        </div>
                    </div>
                </div> --}}

                {{-- Query Header --}}
                <div class="col-md-12 col-lg-12 p-3">
                    <div class="row">
                        <div class="col-6">
                            <h2 class="text-info text-start">Gross Sales</h2>
                        </div>
                        <div class="dropdown text-end col-6">
                            <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton2"
                                data-bs-toggle="dropdown" aria-expanded="false">{{ $selectedDate }}</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                                <li><a href="{{ route('dashboard', ['date' => 'today']) }}" class="dropdown-item"
                                        id="today">Today</a></li>
                                <li><a href="{{ route('dashboard', ['date' => 'this_week']) }}" class="dropdown-item"
                                        id="this_week">This Week</a></li>
                                <li><a href="{{ route('dashboard', ['date' => 'this_month']) }}" class="dropdown-item"
                                        id="this_month">This Month</a></li>
                                <li><a href="{{ route('dashboard', ['date' => 'this_year']) }}" class="dropdown-item"
                                        id="this_year">This Year</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                {{-- USD Chart --}}

                <div class="col-md-6 col-lg-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    ${{ $sum_usd }}
                                </h4>
                                <p class="mb-0">Gross Sales USD</p>
                            </div>
                            <div class="d-flex align-items-center align-self-center">
                                <div class="d-flex align-items-center text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <g id="Solid_dot2">
                                            <circle id="Ellipse_65" cx="12" cy="12" r="8"
                                                fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                    <div class="ms-2">
                                        <span class="text-gray">Sales USD</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="usd-chart" class="d-main"></div>
                        </div>
                    </div>
                </div>

                {{-- KHR Chart --}}

                <div class="col-md-6 col-lg-6">
                    <div class="card" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title">
                                    ៛{{ $sum_khr }}
                                </h4>
                                <p class="mb-0">Gross Sales KHR</p>
                            </div>
                            <div class="d-flex align-items-center align-self-center">
                                <div class="d-flex align-items-center ms-3 text-info">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <g id="Solid_dot3">
                                            <circle id="Ellipse_66" cx="12" cy="12" r="8"
                                                fill="currentColor"></circle>
                                        </g>
                                    </svg>
                                    <div class="ms-2">
                                        <span class="text-gray">Sales KHR</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="khr-chart" class="d-main"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12">
                    <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                        <div class="card-header d-flex justify-content-between flex-wrap">
                            <div class="header-title">
                                <h4 class="card-title mb-2">Daily Receipts</h4>
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
                                    {{ $invoices_daily->count() }}
                                </h5>
                            </div>
                            <div class="text-end text-info">{{ $todayDate }}</div>
                            {{-- <div class="dropdown">
                                <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown"
                                    aria-expanded="false" role="button">
                                </span>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                                    <a class="dropdown-item " href="javascript:void(0);">Action</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                                    <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                                </div>
                            </div> --}}
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
                                        @foreach ($invoices_daily as $item)
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
                                    {{$invoices_daily->links('pagination::bootstrap-4')}}
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
    var chartData = @json($chartData);

    if (document.querySelectorAll('.d-main').length) {
        console.log(chartData);

        // Chart for USD
        const usdOptions = {
            series: [{
                name: 'sales_usd',
                data: chartData.sales_usd,
            }],
            chart: {
                fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                height: 245,
                type: 'area',
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: false,
                },
            },
            colors: ["#3a57e8"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            yaxis: {
                show: true,
                labels: {
                    show: true,
                    style: {
                        colors: "#8A92A6",
                    },
                },
                categories: [0, 100, 1000, 10000],
            },
            legend: {
                show: true,
            },
            xaxis: {
                labels: {
                    minHeight: 22,
                    maxHeight: 22,
                    show: true,
                    style: {
                        colors: "#8A92A6",
                    },
                },
                lines: {
                    show: false //or just here to disable only x axis grids
                },
                categories: chartData.date
            },
            grid: {
                show: false,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: "vertical",
                    shadeIntensity: 0,
                    gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                    inverseColors: true,
                    opacityFrom: .4,
                    opacityTo: .1,
                    stops: [0, 50, 80],
                    colors: ["#3a57e8"]
                }
            },
            tooltip: {
                enabled: true,
            },
        };

        const usdChart = new ApexCharts(document.querySelector("#usd-chart"), usdOptions);
        usdChart.render();

        // Chart for KHR
        const khrOptions = {
            series: [{
                name: 'sales_khr',
                data: chartData.sales_khr,
            }],
            chart: {
                fontFamily: '"Inter", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"',
                height: 245,
                type: 'area',
                toolbar: {
                    show: false
                },
                sparkline: {
                    enabled: false,
                },
            },
            colors: ["#4bc7d2"],
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth',
                width: 3,
            },
            yaxis: {
                show: true,
                labels: {
                    show: true,
                    style: {
                        colors: "#8A92A6",
                    },
                },
                categories: [0, 100, 1000, 10000],
            },
            legend: {
                show: true,
            },
            xaxis: {
                labels: {
                    minHeight: 22,
                    maxHeight: 22,
                    show: true,
                    style: {
                        colors: "#8A92A6",
                    },
                },
                lines: {
                    show: false //or just here to disable only x axis grids
                },
                categories: chartData.date
            },
            grid: {
                show: false,
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    type: "vertical",
                    shadeIntensity: 0,
                    gradientToColors: undefined, // optional, if not defined - uses the shades of same color in series
                    inverseColors: true,
                    opacityFrom: .4,
                    opacityTo: .1,
                    stops: [0, 50, 80],
                    colors: ["#4bc7d2"]
                }
            },
            tooltip: {
                enabled: true,
            },
        };

        const khrChart = new ApexCharts(document.querySelector("#khr-chart"), khrOptions);
        khrChart.render();

        document.addEventListener('ColorChange', (e) => {
            console.log(e)
            const usdNewOpt = {
                colors: [e.detail.detail1],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0,
                        gradientToColors: [e.detail
                            .detail1
                        ], // optional, ifdefined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: .4,
                        opacityTo: .1,
                        stops: [0, 50, 60],
                        colors: [e.detail.detail1],
                    }
                },
            };
            const khrNewOpt = {
                colors: [e.detail.detail2],
                fill: {
                    type: 'gradient',
                    gradient: {
                        shade: 'dark',
                        type: "vertical",
                        shadeIntensity: 0,
                        gradientToColors: [e.detail
                            .detail2
                        ], // optional, if not defined - uses the shades of same color in series
                        inverseColors: true,
                        opacityFrom: .4,
                        opacityTo: .1,
                        stops: [0, 50, 60],
                        colors: [e.detail.detail2],
                    }
                },
            };

            usdChart.updateOptions(usdNewOpt);
            khrChart.updateOptions(khrNewOpt);
        });
    }


    // Update the displayed text when a dropdown item is clicked
    const dropdownItems = document.querySelectorAll('.dropdown-item');
    const dropdownToggle = document.querySelector('.dropdown-toggle');

    dropdownItems.forEach(item => {
        item.addEventListener('click', function() {
            dropdownToggle.textContent = this.textContent;
        });
    });
</script>
