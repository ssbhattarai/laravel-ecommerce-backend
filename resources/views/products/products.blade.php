{{--  @extends('layouts.app')
@section('content')
<div class="container">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
               @if (session('status'))
               <div class="alert alert-success" role="alert">
                  {{ session('status') }}
               </div>
               @endif
               You are logged in!
            </div>
         </div>
      </div>
   </div>
</div>
@endsection  --}}
<html>
   @include('frontend.head');
   <body >
      @include('frontend.nav')
      <!-- headimage -->
      <div class="headerimg">
         <h1>PRODUCTS</h1>
         <img src="/img/leaf-white.png" alt="">
      </div>
      <div class="contents">
         <div class="cattitle">
            <h5>CATEGORY/VEGETABLES</h5>
         </div>
         <div class="catsort">
            <div style="flex-grow: 1">
               <h5>DATES</h5>
               <i class="fas fa-caret-down"></i>
            </div>
            <div style="flex-grow: 1">
               <h5>PRICE</h5>
               <i class="fas fa-caret-down"></i>
            </div>
            <div style="flex-grow: 6"></div>
            <div style="flex-grow: 1">
               <h5>VIEW</h5>
               <select>
                  <option value="6">6</option>
                  <option value="4">4</option>
               </select>
            </div>
            <div style="flex-grow: 1">
               <h5>SORT BY</h5>
               <select>
                  <option value="popularity">Popularity</option>
                  <option value="recent">Recent</option>
               </select>
            </div>
         </div>
         <div class="products">
            <ul class="pro-list">
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/lettuce.png" alt="">
                        <h6>LETTUCE</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/cauli.png" alt="">
                        <h6>CAULIFLOWER</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/lettuce.png" alt="">
                        <h6>LETTUCE</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/cauli.png" alt="">
                        <h6>CAULIFLOWER</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/cauli.png" alt="">
                        <h6>CAULIFLOWER</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/lettuce.png" alt="">
                        <h6>LETTUCE</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/cauli.png" alt="">
                        <h6>CAULIFLOWER</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
               <a href="product-cart">
                  <div class="pro-item">
                     <li>
                        <img src="img/lettuce.png" alt="">
                        <h6>LETTUCE</h6>
                        <div class="star">
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star checked"></span>
                           <span class="fa fa-star"></span>
                           <span class="fa fa-star"></span>
                        </div>
                        <h5>Rs. 200</h5>
                        <button>Add to cart</button>
                     </li>
                  </div>
               </a>
            </ul>
         </div>
         <div class="centerPagination">
            <div class="pagination">
               <a href="#">&laquo;</a>
               <a href="#">1</a>
               <a href="#" class="active">2</a>
               <a href="#">3</a>
               <a href="#">4</a>
               <a href="#">5</a>
               <a href="#">6</a>
               <a href="#">&raquo;</a>
            </div>
         </div>
      </div>
      <div class="cate">
         <div>
            <h1>OTHER CATEGORIES</h1>
            <img src="img/leaf-GREEN.png" alt="" class="leaf">
         </div>
         <div class="catelist">
            <a href="">
               <div class="textbox">
                  <img src="img/livestock.png" alt="">
                  <h2>LIVE STOCK</h2>
               </div>
            </a>
            <a href="">
               <div class="textbox">
                  <img src="img/fruit.png" alt="">
                  <h2>FRUITS</h2>
               </div>
            </a>
            <a href="">
               <div class="textbox">
                  <img src="img/cereal.png" alt="">
                  <h2>CEREAL</h2>
               </div>
            </a>
         </div>
      </div>
      @include('frontend.footer');
   </body>
</html>