<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-md-12 col-lg-12">
         <div class="row row-cols-1">
            <div class="d-slider1 overflow-hidden ">
               <ul  class="col-lg-12 list-inline m-0 p-0 mb-2">
                  <div class="col-lg-12 d-flex">
                     <li class="card card-slide col-lg-4" data-aos="fade-up" data-aos-delay="700">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-01" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="90" data-type="percent">
                                 <svg class="card-slie-arrow " width="24" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Total Sales</p>
                                 <h4 class="counter" style="visibility: visible;">$560K</h4>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="800">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-02" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="80" data-type="percent">
                                 <svg class="card-slie-arrow " width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Total Profit</p>
                                 <h4 class="counter">$185K</h4>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1300">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-07" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="30" data-type="percent">
                                 <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Members</p>
                                 <h4 class="counter">11.2M</h4>
                              </div>
                           </div>
                        </div>
                     </li>                 
                  </div>
                  <div class="col-lg-12 d-flex">
                     <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1000">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-04" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="60" data-type="percent">
                                 <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Revenue</p>
                                 <h4 class="counter">$742K</h4>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1100">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-05" class="circle-progress-01 circle-progress circle-progress-primary text-center" data-min-value="0" data-max-value="100" data-value="50" data-type="percent">
                                 <svg class="card-slie-arrow " width="24px" height="24px" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M5,17.59L15.59,7H9V5H19V15H17V8.41L6.41,19L5,17.59Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Net Income</p>
                                 <h4 class="counter">$150K</h4>
                              </div>
                           </div>
                        </div>
                     </li>
                     <li class="col-lg-4 card card-slide" data-aos="fade-up" data-aos-delay="1200">
                        <div class="card-body">
                           <div class="progress-widget">
                              <div id="circle-progress-06" class="circle-progress-01 circle-progress circle-progress-info text-center" data-min-value="0" data-max-value="100" data-value="40" data-type="percent">
                                 <svg class="card-slie-arrow " width="24" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M19,6.41L17.59,5L7,15.59V9H5V19H15V17H8.41L19,6.41Z" />
                                 </svg>
                              </div>
                              <div class="progress-detail">
                                 <p  class="mb-2">Today</p>
                                 <h4 class="counter">$4600</h4>
                              </div>
                           </div>
                        </div>
                     </li>
                  </div>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-12 col-lg-12">
         <div class="row">
            <div class="col-md-12">
               <div class="card" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">$855.8K</h4>
                        <p class="mb-0">Gross Sales</p>
                     </div>
                     <div class="d-flex align-items-center align-self-center">
                        <div class="d-flex align-items-center text-primary">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                              <g id="Solid dot2">
                                 <circle id="Ellipse 65" cx="12" cy="12" r="8" fill="currentColor"></circle>
                              </g>
                           </svg>
                           <div class="ms-2">
                              <span class="text-gray">Sales</span>
                           </div>
                        </div>
                        <div class="d-flex align-items-center ms-3 text-info">
                           <svg xmlns="http://www.w3.org/2000/svg" width="12" viewBox="0 0 24 24" fill="currentColor">
                              <g id="Solid dot3">
                                 <circle id="Ellipse 66" cx="12" cy="12" r="8" fill="currentColor"></circle>
                              </g>
                           </svg>
                           <div class="ms-2">
                              <span class="text-gray">Cost</span>
                           </div>
                        </div>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton2">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-main" class="d-main"></div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1000">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Earnings</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div class="d-flex align-items-center justify-content-between">
                        <div id="myChart" class="col-md-8 col-lg-8 myChart"></div>
                        <div class="d-grid gap col-md-4 col-lg-4">
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#3a57e8">
                                 <g id="Solid dot">
                                    <circle id="Ellipse 67" cx="12" cy="12" r="8" fill="#3a57e8"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-gray">Fashion</span>
                                 <h6>251K</h6>
                              </div>
                           </div>
                           <div class="d-flex align-items-start">
                              <svg class="mt-2" xmlns="http://www.w3.org/2000/svg" width="14" viewBox="0 0 24 24" fill="#4bc7d2">
                                 <g id="Solid dot1">
                                    <circle id="Ellipse 68" cx="12" cy="12" r="8" fill="#4bc7d2"></circle>
                                 </g>
                              </svg>
                              <div class="ms-3">
                                 <span class="text-gray">Accessories</span>
                                 <h6>176K</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-lg-6">
               <div class="card" data-aos="fade-up" data-aos-delay="1200">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title">Conversions</h4>
                     </div>
                     <div class="dropdown">
                        <a href="#" class="text-gray dropdown-toggle" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                           This Week
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton3">
                           <li><a class="dropdown-item" href="#">This Week</a></li>
                           <li><a class="dropdown-item" href="#">This Month</a></li>
                           <li><a class="dropdown-item" href="#">This Year</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="card-body">
                     <div id="d-activity" class="d-activity"></div>
                  </div>
               </div>
            </div>
            <div class="col-md-12 col-lg-12">
               <div class="card overflow-hidden" data-aos="fade-up" data-aos-delay="400">
                  <div class="card-header d-flex justify-content-between flex-wrap">
                     <div class="header-title">
                        <h4 class="card-title mb-2">Daily Receipts</h4>
                        <p class="mb-0">
                           <svg class ="me-2" width="24" height="24" viewBox="0 0 24 24">
                              <path fill="#3a57e8" d="M21,7L9,19L3.5,13.5L4.91,12.09L9,16.17L19.59,5.59L21,7Z" />
                           </svg>
                           @foreach ($invoices as $item)
                              {{$item->count()}}
                           @endforeach
                        </p>
                     </div>
                     <div class="dropdown">
                        <span class="dropdown-toggle" id="dropdownMenuButton7" data-bs-toggle="dropdown" aria-expanded="false" role="button">
                        </span>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton7">
                           <a class="dropdown-item " href="javascript:void(0);">Action</a>
                           <a class="dropdown-item " href="javascript:void(0);">Another action</a>
                           <a class="dropdown-item " href="javascript:void(0);">Something else here</a>
                        </div>
                     </div>
                  </div>
                  <div class="card-body p-0">
                     <div class="table-responsive mt-4">
                        <table id="basic-table" class="table table-striped mb-0" role="grid">
                           <thead>
                              <tr>
                                 <th>Invoice No.</th>
                                 <th>Products</th>
                                 <th>Price</th>
                                 <th>Customer ID</th>
                                 <th>Date</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach ($invoices as $item)
                                 <tr>{{$item->invoice_id }}</tr>
                                 <tr>{{$item->product->name}}</tr>
                                 <tr>${{$item->product->productSizePrice->price}} </tr>
                                 <tr class="text-primary">{{$item->customer->customer_id}} </tr>
                                 <tr class="text-info">{{ $item->created_at}}</tr>
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</x-app-layout>
