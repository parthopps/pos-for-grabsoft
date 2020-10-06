@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Payment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Payment</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="card">
            <div class="card-header">
              <h3 class="card-title">view Payment</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (session('deletestatus'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('deletestatus') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Supplier Name</th>
                  <th>Product name</th>
                  <th>Pay amount</th>
                  <th>Due amount</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($payments as $payment)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ App\Supplier::find($payment->supplier_id)->supplier_name }}</td>
                        <td>{{ $payment->product_name }}</td>
                        <td>{{ $payment->pay }}</td>
                        <td>{{ $payment->due }}</td>
                        {{-- <td>{{ App\Supplier::find($product->supplier_id)->supplier_name }}</td> --}}
                        <td>{{ $payment->created_at }}</td>
                        <td>-
                          {{-- <a href="{{ url('payment') }}/{{ $product->id }}" type="button" class="btn btn-primary btn-sm">Add Payment</a> --}}
                            {{-- <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('category/edit') }}/{{ $category->id }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('category/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div> --}}
                        </td>
                      </tr>
                    @endforeach
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

         
    </section>
@endsection