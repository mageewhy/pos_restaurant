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
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                                <tr>
                                    <td>{{$value->id}}</td>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->product_type_id}}</td>
                                    <td><img src="/storage/{{$value->image}}" alt="" width="100"></td>
                                    <td>{{$value->created_at}}</td>
                                    <td class="text-info">{{$value->updated_at}}</td>
                                    <td class="text-danger">{{$value->deleted_at}}</td>
                                    <td class="d-flex">
                                        <a class="btn btn-warning me-3" href="{{route('products.edit', $value->id)}}">Edit</a>
                                        <form action="{{ route('products.destroy', $value->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onClick="return confirm('Are You Absolutely Sure You Want to Delete the Data?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('partials.components.share-offcanvas')
</x-app-layout>
