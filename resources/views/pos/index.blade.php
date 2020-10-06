@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">POS(point of sale)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">POS</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    

    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <section class="content">
            <div class="container-fluid">
      
              <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">pos</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="container">
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group">
                          <label>Select Customer</label>
                          <select class="form-control" name="customer_id">
                            <option value="">- select one -</option>
                            @foreach($customers as $customer)
                              <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalCenter" style="margin-top: 31px">
                          Add new Customer
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Add new customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form method="post" action="{{ route('customer.insert') }}">
                                  @csrf
                                  <div class="form-group">
                                    <label>Customer Name</label>
                                    <input type="text" name="customer_name" class="form-control" value="">
                                    @error('customer_name')
                                          <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Phone No</label>
                                    <input type="text" name="phone" class="form-control" value="">
                                    @error('phone')
                                          <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>
                                  <div class="form-group">
                                    <label>Customer Address</label>
                                    <textarea class="form-control" name="address" value=""  rows="3"></textarea>
                                  </div>
                                </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Add</button>
                              </div>
                            </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <div class="card-body">
                    <table id="example" class="table table-bordered table-striped display" style="width:100%">
                      <thead>
                        <tr class="table-primary">
                          <th>Product Name</th>
                          <th>Quantity</th>
                          {{-- <th>Buying Price</th> --}}
                          <th>Selling Price</th>
                          <th>Sub Total</th>
                          <th>Update</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($posinfo as $pos)
                        <tr>

                          <td>{{ $pos->product_name }}</td>
                          <form method="post" action="{{ url('pos/update') }}/{{ $pos->id }}">
                            @csrf
                          <td><input type="number" value="{{ $pos->quantity }}" name="quantity" min="1" class="form-control"></td>
                          {{-- <td>{{ $pos->buying_price }}</td> --}}
                          <td>
                            <input type="number" value="{{ $pos->selling_price }}" name="selling_price" min="1"  class="form-control">
                          </td>
                          <td>{{ $pos->quantity * $pos->selling_price }}</td>
                          <td>
                            <button href="" type="submit" class="btn btn-sm btn-outline-secondary mb-1">Update</button>
                          </td>
                        </form>
                          <td>
                            <a href="{{ url('pos/delete') }}/{{ $pos->id }}" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                          </td>
                          
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center text-danger">No Data Available</td>
                        </tr>
                        @endforelse
                      </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
          </div>
        </section>
        </div>


        <div class="col-md-4 mt-4">
          <div class="container-fluid">
            <div class="card">
              <div class="card-body bg-primary text-center">
                @php
                    $total_qty = 0;
                    foreach($posinfo as $pos)
                    {
                        $total_qty += $pos->quantity;
                    }
                  @endphp
                <h5>Quantity :  {{ $total_qty }} </h5>
                @php
                    $total_price = 0;
                    foreach($posinfo as $pos)
                    {
                        $total_price += $pos->quantity * $pos->selling_price;
                    }
                  @endphp
                <h5>Sub Total : {{ $total_price }}</h5>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="card">
              <div class="card-body bg-primary text-center">
                <h3>Total : {{ $total_price }}</h3>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="card">
              <div class="card-body text-center">
                <button type="button" class="btn btn-success">Create Invoice</button>
              </div>
            </div>
          </div>
        </div>
      </div>
<hr>
      <div class="row mt-4">
        <div class="col-md-12">
          <section class="content">
              <div class="container-fluid">
        
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Products</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Buying Price</th>
                          <th>Selling Price</th>
                          <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ App\Category::find($product->category_id)->category_name }}</td>
                                <td>{{ $product->buying_price }}</td>
                                <td>{{ $product->selling_price }}</td>

                                <form method="post" action="{{ route('pos.insert') }}">
                                  @csrf
                                  <input type="hidden" name="product_name" value="{{ $product->product_name }}" class="form-control">
                                  <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control">
                                  <input type="hidden" name="description" value="{{ $product->description }}" class="form-control">
                                  <input type="hidden" name="category_name" value="{{ App\Category::find($product->category_id)->category_name }}" class="form-control">
                                  <input type="hidden" name="category_id" value="{{ App\Category::find($product->category_id)->id }}" class="form-control">
                                  <input type="hidden" name="buying_price" value="{{ $product->buying_price }}" class="form-control">
                                  <input type="hidden" name="selling_price" value="{{ $product->selling_price }}" class="form-control">
                                  <input type="hidden" name="quantity" value="1" class="form-control">
                                  <input type="hidden" name="supplier_id" value="{{ $product->supplier_id }}" class="form-control">
                                <td>
                                  <button href="" type="submit" class="btn btn-primary"><i class="fa fa-plus fa-xs"></i></button>
                                </td>
                              </form>
                              </tr>
                          @endforeach
                            
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
        
                 
            </section>
      </div>
      </div>
    </div>
@endsection

@section('footer_scripts')
<script>
  $(document).ready(function(){
    $('#example').DataTable({
        "scrollY" : "200px",
        "scrollCollapse" : true,
        "paging" : false
    });
});
</script>
@endsection