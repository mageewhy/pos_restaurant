<x-app-layout :assets="$assets ?? []">
<div class="row">
    <div class="col-lg-12">
        <div class="card   rounded">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                      <!-- Product Selection -->
                      <div class="card">
                        <div class="card-header">
                          <h5>Select Product</h5>
                        </div>
                        <div class="card-body">
                          <!-- Product options -->
                          <div class="form-group">
                            <label for="product">Product</label>
                            <select class="form-control" id="product" name="product">
                              <option value="10.00">Product 1 - $10.00</option>
                              <option value="15.00">Product 2 - $15.00</option>
                              <option value="20.00">Product 3 - $20.00</option>
                            </select>
                          </div>
                          <button class="btn btn-primary" id="selectButton">Select Product</button>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Order Summary -->
                        <div class="card">
                          <div class="card-header">
                            <h5>Order Summary</h5>
                          </div>
                          <div class="card-body">
                            <!-- Display order details here -->
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>Product</th>
                                  <th>Size</th>
                                  <th>Quantity</th>
                                  <th>Price</th>
                                </tr>
                              </thead>
                              <tbody id="productList">
                                <!-- Example product 1 -->
                                <tr>
                                  <td>Product 1</td>
                                  <td>Size: M</td>
                                  <td>Quantity: 2</td>
                                  <td>$20.00</td>
                                </tr>
                                <!-- Example product 2 -->
                                <tr>
                                  <td>Product 2</td>
                                  <td>Size: L</td>
                                  <td>Quantity: 1</td>
                                  <td>$15.00</td>
                                </tr>
                              </tbody>
                            </table>
                            <hr>
                            <p><strong>Total: $<span id="total">55.00</span></strong></p>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
