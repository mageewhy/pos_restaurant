<x-app-layout :assets="$assets ?? []">
    <div>
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add New Product</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="validationProductName">Product Name</label>
                                    <input type="text" class="form-control" name="name" id="validationProductName"
                                        required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="validationType">Product Type</label>
                                    <select name="product_type_id" class="form-select">
                                        <option selected disabled>Select Product Type</option>
                                        @foreach ($productType as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="validationDetail" class="form-label">Detail</label>
                                    <textarea name="detail" id="validationDetail" class="form-control"></textarea>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label" for="file">Image</label>
                                    <input type="file" name="image" class="form-control" id="file" required>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Drink Types
                                        <a class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Don't Select If Not
                                                Drinks">
                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.4"
                                                    d="M16.34 1.99976H7.67C4.28 1.99976 2 4.37976 2 7.91976V16.0898C2 19.6198 4.28 21.9998 7.67 21.9998H16.34C19.73 21.9998 22 19.6198 22 16.0898V7.91976C22 4.37976 19.73 1.99976 16.34 1.99976Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M11.1246 8.18921C11.1246 8.67121 11.5156 9.06421 11.9946 9.06421C12.4876 9.06421 12.8796 8.67121 12.8796 8.18921C12.8796 7.70721 12.4876 7.31421 12.0046 7.31421C11.5196 7.31421 11.1246 7.70721 11.1246 8.18921ZM12.8696 11.362C12.8696 10.88 12.4766 10.487 11.9946 10.487C11.5126 10.487 11.1196 10.88 11.1196 11.362V15.782C11.1196 16.264 11.5126 16.657 11.9946 16.657C12.4766 16.657 12.8696 16.264 12.8696 15.782V11.362Z"
                                                    fill="currentColor"></path>
                                            </svg> </a>
                                    </label>
                                    <div class="row">
                                        <div class="form-check d-block col-3">
                                            <input type="radio" class="btn-check" name="options-base" id="hot"
                                                autocomplete="off" value="Hot">
                                            <label class="btn" for="hot">Hot</label>
                                        </div>
                                        <div class="form-check d-block col-3">
                                            <input type="radio" class="btn-check" name="options-base" id="cold"
                                                autocomplete="off" value="Cold">
                                            <label class="btn" for="cold">Cold</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 shadow-lg p-3 mb-5 bg-white rounded">
                                <div id="sizeprice" class="row">
                                    <div class="col-md-6 mb-4" id="size">
                                        <label class="form-label" for="size">Size</label>
                                        <input type="text" name="product[0][size]" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-4" id="price">
                                        <label class="form-label">Price</label>
                                        <input type="text" name="product[0][price]" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <button class="btn btn-info" id="add">
                                        <div id="svg-container-71">
                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.7366 2.76175H8.08455C6.00455 2.75375 4.29955 4.41075 4.25055 6.49075V17.3397C4.21555 19.3897 5.84855 21.0807 7.89955 21.1167C7.96055 21.1167 8.02255 21.1167 8.08455 21.1147H16.0726C18.1416 21.0937 19.8056 19.4087 19.8026 17.3397V8.03975L14.7366 2.76175Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M14.4741 2.75V5.659C14.4741 7.079 15.6231 8.23 17.0431 8.234H19.7971"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M14.2936 12.9141H9.39355" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                                <path d="M11.8442 15.3639V10.4639" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </div>
                                    </button>
                                    <button class="btn btn-danger mx-3" id="remove">
                                        <div id="svg-container-70">
                                            <svg width="20" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M14.7366 2.76176H8.08455C6.00455 2.75276 4.29955 4.41076 4.25055 6.49076V17.3398C4.21555 19.3898 5.84855 21.0808 7.89955 21.1168C7.96055 21.1168 8.02255 21.1168 8.08455 21.1148H16.0726C18.1416 21.0938 19.8056 19.4088 19.8026 17.3398V8.03976L14.7366 2.76176Z"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M14.4731 2.75V5.659C14.4731 7.079 15.6221 8.23 17.0421 8.234H19.7961"
                                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path d="M14.2926 13.7471H9.39258" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                </path>
                                            </svg>
                                        </div>
                                    </button>
                                </div>
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
