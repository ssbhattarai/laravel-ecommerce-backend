

    <html>
        <head>
        <title>Agriculture</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    </head>
    
    <body style="background-color: #f3f3f3">
        



                  <!-- headimage and nav -->
                  <div class="indexCover"> 
                      
                  <nav id="navbar" class="navbar navbar-expand-sm fixed-top navbar-light">
                          <a class="navbar-brand" href="#"><img src="/img/logowhite.png" alt="" class="logo" ></a>
                          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                          </button>
                        
                          <div class="collapse navbar-collapse" id="navbarSupportedContent">
                              <ul class="navbarLinks2 mx-auto">
                                  <li class="nav-item">
                                    <a class="nav-link" href="/">HOME</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">ABOUT US</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">CONTACT US</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#">CATEGORY</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="products">PRODUCT</a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="supliers">SUPPLIER</a>
                                  </li>
                                  
                                </ul>
                                <div id="naviconblock2">
                                <ul class="nav pl-auto">
                                    <li class="nav-icon2">
                                        <a href="" ><i class="fas fa-search" id="navicon2"></i></a>
                                    </li>
                                    <li class="nav-icon2">
                                            <a href=""><i class="fas fa-shopping-cart" id="navicon2"></i></a>
                                            
                                        </li>
                                    <li class="nav-icon2">
                                         <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                         <i class="fas fa-user" id="navicon2"></i>
                                    </a>
                                     
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        
                       </form>
                                    </li>
                
                                </ul>
                              </div>
                          </div>
                        </nav>
                    
                  <h6>FRESH &</h6> <br> <h5 class="white-text">ORGANIC</h5> <button type="button" class="btn btn-light" id="indexcoverbutton">READ MORE</button>
              
                
                </div>





              <div class="contentwrapper">
                <div class="categories">
                        <a href="products.html">
                        <div class="textbox2">
                          <img src="/img/fruit.png" alt="">
                            <h2>FRUITS</h2>
                        </div></a>
                        <a href="products.html">
                            <div class="textbox2">
                              <img src="/img/vegetable.png" alt="">
                                <h2>VEGETABLES</h2>
                            </div></a>
                        <a href="products.html">
                            <div class="textbox2">
                              <img src="/img/livestock.png" alt="">
                                <h2>LIVE STOCK</h2>
                            </div></a>
                        <a href="products.html">
                        <div class="textbox2">
                          <img src="/img/cereal.png" alt="">
                            <h2>CEREAL</h2>
                        </div></a>
                        
                </div>



                <div class="service">
                    <div>
                        <h1>BEST SERVICE FOR YOU</h1>
                        <img src="/img/leaf-GREEN.png" alt="" class="leaf">
                       </div>

                       <div class="serviceImage">
                         <img src="/img/benefits.png" alt="">
                       </div>

                </div>






                <!-- Products -->

                <div class="indexProduct">
                    <h3>PRODUCTS</h3>
                    <img src="/img/leaf-GREEN.png" alt="" class="leaf">
      
                    
      
      
                    <div class="carouselWrapper">
                        <div class="main-content">
     
             {{--  @foreach ($products as $product)  --}}
                            <div class="owl-carousel owl-theme">
                                <div class="relpro-item">
                                    <li>
                                        <img src="/img/lettuce.png" alt="">
                                        {{--  <h6>{{$product->product_name}}</h6>  --}}
                                        <h6>test</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                                {{--  @endforeach  --}}
                                 </div>
                                   <div class="relpro-item">
                                    <li>
                                        <img src="/img/cauli.png" alt="">
                                        <h6>CAULIFLOWER</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                               
                                 </div>
                                 <div class="relpro-item">
                                    <li>
                                        <img src="/img/lettuce.png" alt="">
                                        <h6>LETTUCE</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                               
                                 </div>
                                 <div class="relpro-item">
                                    <li>
                                        <img src="/img/cauli.png" alt="">
                                        <h6>CAULIFLOWER</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                               
                                 </div>
                                 <div class="relpro-item">
                                    <li>
                                        <img src="/img/lettuce.png" alt="">
                                        <h6>LETTUCE</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                               
                                 </div>
                                 <div class="relpro-item">
                                    <li>
                                        <img src="/img/cauli.png" alt="">
                                        <h6>CAULIFLOWER</h6>
                                        <div class="star">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                          </div>
                                        <h5>Rs. 200</h5>
                                        <button>ADD TO CART</button>
                                    </li>
                                
                               
                                 </div>  
                          
                                
                            </div>
                            <div class="owl-theme">
                                <div class="owl-controls">
                                    <div class="custom-nav owl-nav"></div>
                                </div>
                            </div>
                          </div>
                   
                    </div>
                </div>
               



                <!-- get in touch parallax -->
                <div class="parallax"> <div class="over3"></div>
                  <div class="touch">
                    <div class="touchImage">
                      <img src="/img/vege slide.png" alt="">

                    </div>

                    <div class="touchText">
                      <div>
                        <h1>GET IN TOUCH</h1>
                      </div>
                      <div class="connectedText">
                        <p>Get connected with us and we'll let you know if we have any updates available</p>
                      </div>
                      <div class="contactInfo">
                        <div>
                          <p><i class="fas fa-envelope-open"></i> nature@gmail.com</p>

                        </div>
                        <div>
                          <p><i class="fas fa-phone"></i> nature@gmail.com</p>
                        </div>

                      </div>
                    </div>
                  </div>
                  
              </div>





              <!-- Supplier -->

              <div class="indexSupplier">
                  <h3>SUPPLIERS</h3>
                  <img src="/img/leaf-GREEN.png" alt="" class="leaf">
    
                  
    
    
                  <div class="carouselWrapper">
                      <div class="main-content">
                          <div class="owl-carousel owl-theme">
                    
                      <div class="indexsupp-item">
                          <li>
                              <img src="/img/farmer.jpg" alt="">
                              <h6>MIRA KHADKA</h6>
                              <div class="star">
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                </div>
                                <div><h4>PRODUCTS:</h4> <h5>Tomato, Onion, Rice</h5><br></div> 
                              <button>PROFILE</button>
                          </li>
                      </div>

                   <div class="indexsupp-item">
                    <li>
                        <img src="img/farmer.jpg" alt="">
                        <h6>MIRA KHADKA</h6>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <div><h4>PRODUCTS:</h4> <h5>Tomato, Onion, Rice</h5><br></div> 
                        <button>PROFILE</button>
                    </li>
                </div>

              <div class="indexsupp-item">
                    <li>
                        <img src="img/farmer.jpg" alt="">
                        <h6>MIRA KHADKA</h6>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <div><h4>PRODUCTS:</h4> <h5>Tomato, Onion, Rice</h5><br></div> 
                        <button>PROFILE</button>
                    </li>
                </div>

              <div class="indexsupp-item">
                    <li>
                        <img src="img/farmer.jpg" alt="">
                        <h6>MIRA KHADKA</h6>
                        <div class="star">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                          </div>
                          <div><h4>PRODUCTS:</h4> <h5>Tomato, Onion, Rice</h5><br></div> 
                        <button>PROFILE</button>
                    </li>
                </div>
    
              </div>
              <div class="owl-theme">
                  <div class="owl-controls">
                      <div class="custom-nav owl-nav"></div>
                  </div>
              </div>

                  </div>
              </div>
</div>
            @include('frontend.footer')
    </body>
</html>