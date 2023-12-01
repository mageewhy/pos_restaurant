<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Your Point Shop Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('point-shops.store')}}" enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="form-group">
                                <label class="form-label" for="text">Name</label>
                                <input type="text" class="form-control" id="type" name="name">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="text">Point</label>
                                <input type="text" class="form-control" id="type" name="point">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="file">Image</label>
                                <input type="file" name="image" class="form-control" id="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('point-shops.index')}}" class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
