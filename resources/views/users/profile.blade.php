<x-app-layout :assets="$assets ?? []">
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body">
               <div class="d-flex flex-wrap align-items-center justify-content-between">
                  <div class="d-flex flex-wrap align-items-center">
                     <div class="profile-img position-relative me-3 mb-3 mb-lg-0">
                        <img src="{{ $profileImage ?? asset('images/avatars/01.png')}}" alt="User-Profile" class="theme-color-default-img img-fluid rounded-pill avatar-100">
                        <img src="{{asset('images/avatars/avtar_1.png')}}" alt="User-Profile" class="theme-color-purple-img img-fluid rounded-pill avatar-100">
                        <img src="{{asset('images/avatars/avtar_2.png')}}" alt="User-Profile" class="theme-color-blue-img img-fluid rounded-pill avatar-100">
                        <img src="{{asset('images/avatars/avtar_4.png')}}" alt="User-Profile" class="theme-color-green-img img-fluid rounded-pill avatar-100">
                        <img src="{{asset('images/avatars/avtar_5.png')}}" alt="User-Profile" class="theme-color-yellow-img img-fluid rounded-pill avatar-100">
                        <img src="{{asset('images/avatars/avtar_3.png')}}" alt="User-Profile" class="theme-color-pink-img img-fluid rounded-pill avatar-100">
                     </div>
                     <div class="d-flex flex-wrap align-items-center mb-3 mb-sm-0">
                        <h4 class="me-2 h4">{{ $data->full_name ?? 'Austin Robertson'  }}</h4>
                        <span class="text-capitalize"> - {{ str_replace('_',' ',auth()->user()->user_type) ?? 'Marketing Administrator' }}</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg">
         <div class="card">
         <div class="card-header">
            <div class="header-title">
               <h4 class="card-title">About</h4>
            </div>
         </div>
         <div class="card-body">
            <p>Lorem ipsum dolor sit amet, contur adipiscing elit.</p>
            <div class="mb-1">Email: <a href="#" class="ms-3">nikjone@demoo.com</a></div>
            <div class="mb-1">Phone: <a href="#" class="ms-3">001 2351 256 12</a></div>
            <div>Location: <span class="ms-3">USA</span></div>
         </div>
         </div>
      </div>
   </div>

   @include('partials.components.share-offcanvas')
</x-app-layout>
