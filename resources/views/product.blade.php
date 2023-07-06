@extends('master')
@section("content")
<div class="custom-product">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <!-- Placeholder slide -->
             <img class="slider-img" src="placeholder.jpg">
            <div class="carousel-caption slider-text">
              <h3>Placeholder Title</h3>
              <p>Placeholder Description</p>
            </div> 
          </div>
          @foreach ($products as $item)
            <div class="item">
              <a href="detail/{{$item['id']}}">
                <img class="slider-img" src="{{$item['gallery']}}">
                <div class="carousel-caption slider-text">
                  <h3>{{$item['name']}}</h3>
                  <p>{{$item['description']}}</p>
                </div>
              </a>
            </div>
          @endforeach
        </div>
      
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="trending-wrapper">
            <h3 class="tp_heading">Trending Products</h3>
            <div class="container">
              <div class="pr row ps-5">
                @foreach($products as $item)
                  <div class="col-md-4">
                    <div class="card">
                      <img class="card-img-top" src="{{$item['gallery']}}" alt="{{$item['name']}}">
                      <div class="card-body">
                        <h5 class="card-title">{{$item['name']}}</h5>
                        <p class="card-text">{{$item['description']}}</p>
                        <div class="tp_buttons">
                          <a href="detail/{{$item['id']}}" class="btn btn-primary">View Details</a>
                          <form action="/add_to_cart" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value={{$item['id']}}>
                            <button class="btn btn-success">Add to Cart</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
              <div class="pagination">
                {{$products->links()}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="filter-section">
            <h3>Filter</h3>
            <form action="{{ route('products.filter') }}" method="GET">
              <div class="form-group">
                <select class="form-control" name="filter" id="filter">
                  <option value="">Select Filter</option>
                  <option value="price_low">Price: Low to High</option>
                  <option value="price_high">Price: High to Low</option>
                  <option value="Electronics">Category: Electronics</option>
                  <option value="Fashion">Category: Fashion</option>
                  <option value="Appliances">Category: Appliances</option>
                  <!-- Add more options for different filters as needed -->
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Apply Filter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
