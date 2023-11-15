divdiv<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                           <h4 class="card-title">Update {{$data->name}}</h4>
                        </div>
                     </div>
                     <div class="card-body">
                        <form action="{{route('products.update', $data->id)}}" method="POST" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label" for="validationProductName">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="validationProductName" value="{{$data->name}}" required>
                                </div>
                                <div class="col-md-6">
                                    <select name="product_type_id" class="form-select">
                                        @foreach ($productType as $key => $value)
                                            <option value="{{$key}}" @if ($data->product_type_id == $key) selected @endif>{{$value}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <label for="validationDetail" class="form-label">Detail</label>
                                    <textarea name="detail" id="validationDetail" class="form-control">{{$data->detail}}</textarea>
                                </div>
                                <div class="col-md-12 mb-6">
                                    <label class="form-label" for="file">Image</label>
                                    <input type="file" name="image" class="form-control" value="{{$data->image}}" id="file" >
                                </div>
                                <div id="sizeprice" class="row">
                                    @foreach($data->productSizePrice as $key => $value)
                                        <div class="col-md-6 mb-3" id="size">
                                            <label class="form-label" for="size">Size</label>
                                            <input type="text" name="product[{{$key}}][size]" value="{{$value->size}}" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3" id="price">
                                            <label class="form-label">Price</label>
                                            <input type="text" name="product[{{$key}}][price]" value="{{$value->price}}" class="form-control">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-danger" id="remove">Remove Size Price</button>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button class="btn btn-info" id="add">Add New Size Price</button>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Submit form</button>
                            </div>
                        </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const addButton = document.getElementById('add');
    const removeButton = document.getElementById('remove');
    const sizePrice = document.getElementById('sizeprice');
    var count = sizePrice.children.length / 2;
    console.log(sizePrice.children);
    addButton.addEventListener('click', function(e) {
        e.preventDefault();
        const size = document.getElementById('size');
        const price = document.getElementById('price');

        var cloneSize = size.cloneNode(true);
        var clonePrice = price.cloneNode(true);

        cloneSize.querySelector('input').setAttribute('name', 'product[' + count + '][size]');
        cloneSize.querySelector('input').value = '';
        clonePrice.querySelector('input').setAttribute('name', 'product[' + count + '][price]');
        clonePrice.querySelector('input').value = '';

        sizePrice.appendChild(cloneSize);
        sizePrice.appendChild(clonePrice);
        count++;
    });
    removeButton.addEventListener('click', function(e) {
        e.preventDefault();
        if (count > 1) {
            sizePrice.removeChild(sizePrice.lastElementChild);
            sizePrice.removeChild(sizePrice.lastElementChild);
            count--;
        }
    });

</script>


