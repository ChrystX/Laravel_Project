@extends('layout.main')
@section('title')
    <h1>Form Add Data</h1>
@endsection
@section('artikel')
<form action="/save" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="product_name">Product Name</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="product_stock">Product Stock</label>
        <input type="number" class="form-control" id="product_stock" name="product_stock" required>
    </div>
    <div class="form-group">
        <label for="product_category">Product Category</label>
        <select class="form-control" id="product_category" name="product_category" required>
            <option value="Services">Services</option>
            <option value="Software">Software</option>
            <option value="Fraud">Fraud</option>
            <option value="Documents">Documents</option>
            <option value="Drugs">Drugs</option>
            <option value="Others">Others</option>
        </select>
    </div>
    <div class="form-group">
        <label for="product_price">Product Price</label>
        <input type="number" class="form-control" id="product_price" name="product_price" required>
    </div>
    <div class="form-group">
        <label for="product_image">Product Image</label>
        <input type="file" class="form-control-file" id="product_image" name="product_image" required>
    </div>
    <div class="form-group">
        <label for="listing_date">Listing Date</label>
        <input type="date" class="form-control" id="listing_date" name="listing_date" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
@endsection
