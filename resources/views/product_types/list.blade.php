<x-app-layout :assets="$assets ?? []">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-wrap align-items-start">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap  mb-3 mb-sm-0">
                                <h4 class="me-2 h4">Product Types</h4>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap align-items-end">
                        <div class="d-flex flex-wrap">
                            <div class="d-flex flex-wrap  mb-3 mb-sm-0">
                                <a href="{{route('product_types.create')}}">Add Product Types</a>
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
                        <h4 class="card-title">Product Types List</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table id="basic-table" class="table table-striped mb-0" role="grid">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Type</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($product_type as $item)
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <h6>{{$item->id}}</h6>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="">
                                            <div class="">{{$item->type}}</div>
                                        </div>
                                    </td>
                                    <td>{{$item->created_at}}</td>
                                    <td>
                                        <div class="text-info">{{$item->updated_at}}</div>
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
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
