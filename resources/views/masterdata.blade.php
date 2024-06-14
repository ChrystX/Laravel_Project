@extends('layout.main')
@section('title')
    <h1>Master Data</h1>
@endsection
@section('artikel')
<div class="container my-4"> <!-- Add container with margin -->
    <a href="/faq" class="btn btn-primary mb-3">
        <i class="bi bi-plus"></i> Create New Row
    </a>
    <table id="example" class="table table-striped table-responsive" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Listing Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prod as $idx => $product)
            <tr>
                <td>{{ $idx + 1 }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->product_stock }}</td>
                <td>{{ $product->product_category }}</td>
                <td>{{ $product->product_price }}</td>
                <td>
                    <img src="{{ asset('/storage/'.$product->product_image)}}" alt="{{ $product->product_image }}" height="80" width="80">
                </td>
                <td>{{ $product->listing_date }}</td>
                <td colspan="2">
                    <form action="{{ route('delete.product', $product->product_id) }}" method="POST" style="display:inline">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i>Delete</button>
                    </form>
                    <form action="{{ route('edit.product', $product->product_id) }}" method="GET" style="display:inline;">
                        <button type="submit" class="btn btn-warning"><i class="bi bi-pencil-square"></i>Edit</button>
                    </form>
                </td>                
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Stock</th>
                <th>Category</th>
                <th>Price</th>
                <th>Image</th>
                <th>Listing Date</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection