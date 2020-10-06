@extends('layouts.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Payment</li>
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
            <form method="post" action="{{ route('payment.insert') }}">
                @csrf
                
                <div class="form-group">
                    <label>Supplier name</label>
                    
                    @foreach(App\Supplier::where('id', $payment->supplier_id)->get() as $supplier)
                    <h3>{{ $supplier->supplier_name }}</h3>
                    <input type="hidden" value="{{ $supplier->id }}" name="supplier_id" class="form-control">
                    @endforeach
                </div>
                <div class="form-group">
                    <label>Product name</label>
                    <h3>{{ $payment->product_name }}</h3>
                    <input type="hidden" value="{{ $payment->product_name }}" name="product_name" class="form-control">
                </div>
                <div class="form-group">
                    {{-- <label>Product id</label> --}}
                    <input type="hidden" value="{{ $payment->id }}" name="product_id" class="form-control">
                </div>
                <div class="form-group">
                    <label>Pay amount</label>
                    <input type="text" value="" name="pay" class="form-control">
                    @error('pay')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Due amount</label>
                    <input type="text" value="" name="due" class="form-control">
                    @error('due')
                          <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
          </div>
    </section>

@endsection