<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-start">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap  mb-3 mb-sm-0">
                                <h4 class="me-2 h4">Products</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-end">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap  mb-3 mb-sm-0">
                                <a href="{{route('products.create')}}">Add Products</a>
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
                        <h4 class="card-title">Product List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Detail</th>
                                <th>Price to Size</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img class="rounded img-fluid avatar-40 me-3 bg-soft-primary"
                                            src="{{ asset('images/shapes/01.png') }}" alt="profile">
                                        <h6>Soft UI XD Version</h6>
                                    </div>
                                </td>
                                <td>
                                    <div class="iq-media-group iq-media-group-1">
                                        <a href="#" class="iq-media-1">
                                            <div class="icon iq-icon-box-3 rounded-pill">SP</div>
                                        </a>
                                        <a href="#" class="iq-media-1">
                                            <div class="icon iq-icon-box-3 rounded-pill">PP</div>
                                        </a>
                                        <a href="#" class="iq-media-1">
                                            <div class="icon iq-icon-box-3 rounded-pill">MM</div>
                                        </a>
                                    </div>
                                </td>
                                <td>$14000</td>
                                <td>
                                    <div class="text-info">Pending</div>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center mb-2">
                                        <h6>60%</h6>
                                    </div>
                                    <div class="progress bg-soft-info shadow-none w-100" style="height: 6px">
                                        <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
