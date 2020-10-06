@extends('layouts.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


          <div>
            @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <form method="post" action="{{ route('product.insert') }}">
                @csrf
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}" placeholder="Enter product name">
                  @error('product_name')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Product Description</label>
                  <textarea class="form-control" name="description" value="{{ old('description') }}"  rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Category name</label>
                  <select class="form-control" name="category_id">
                    <option value="">- select one -</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label>Product Quantity</label>
                    <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}"  placeholder="Enter product quantity">
                    @error('quantity')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Buying Price</label>
                    <input type="text" name="buying_price" class="form-control" value="{{ old('buying_price') }}"   placeholder="Enter buying price">
                    @error('buying_price')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Selling Price</label>
                    <input type="text" name="selling_price" class="form-control" value="{{ old('selling_price') }}"  placeholder="Enter Selling price">
                    @error('selling_price')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <label>Supplier name</label> --}}
                    <input type="hidden" value="{{ $supplier_name->id }}" name="supplier_id" class="form-control">
                    @error('supplier_id')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
          </div>
    </section>

@endsection