<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Your Product Type</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('product_types.store')}}">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="form-label" for="text">Product Types</label>
                                <input type="text" class="form-control" id="type" name="type">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('product_types.index')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
