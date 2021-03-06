@extends('layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">View Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">View Category</li>
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
              <h3 class="card-title">view category</h3>
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
                  <th>Category Name</th>
                  <th>Category Description</th>
                  <th>Parent Id</th>
                  <th>Created At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $category->category_name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if($category->parent_id == NULL)
                                <p>Parent Category</p>
                            @else
                                @foreach(App\Category::orderBy('id','desc')->where('id', $category->parent_id)->get() as $parent)
                                    {{ $parent->category_name }}
                                @endforeach
                            @endif
                        </td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ url('category/edit') }}/{{ $category->id }}" type="button" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('category/delete') }}/{{ $category->id }}" type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </div>
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