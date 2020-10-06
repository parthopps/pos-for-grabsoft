@extends('layouts.master')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
            <form method="post" action="{{ route('category.insert') }}">
                @csrf
                <div class="form-group">
                  <label>Category Name</label>
                  <input type="text" name="category_name" class="form-control" placeholder="Enter category name">
                  @error('category_name')
                        <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Category Description</label>
                  <textarea class="form-control" name="description" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Parent Id</label>
                    <select class="form-control" name="parent_id">
                      <option value="">- select one -</option>
                      @foreach(App\Category::orderBy('id','desc')->where('parent_id',NULL)->get() as $parent)
                      <option value="{{ $parent->id }}">{{ $parent->category_name }}</option>
                      @endforeach
                    </select>
                  </div>
                <button type="submit" class="btn btn-primary">Add</button>
              </form>
          </div>
    </section>

@endsection