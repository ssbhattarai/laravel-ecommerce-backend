@extends('layouts.master')

    @section('content')
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto">
          <h3 class="mt-4">{{ $products->products_name }} <span class="lead"> by <a href="#"> {{ $products->user->name }} </a></span> </h3>
          <hr>
          <p>productsed {{ $products->created_at->diffForHumans() }} </p>
          <hr>
          <img class="img-fluid rounded" src=" {!! !empty($products->image) ? '/uploads/productss/' . $products->image :  'http://placehold.it/750x300' !!} " alt="">
          <hr>
          <p class="lead">{{ $products->type }}</p>
          <hr>
          <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection