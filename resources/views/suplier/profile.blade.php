<html>
    @include('frontend.head');
    
    <body style="background-color: #F3F3F3">
      @include('frontend.nav');

                  <!-- headimage -->
                  <div class="headerimg2">
                      <div class="over"></div>
                        <h1>SUPPLIER</h1>
                        <img src="/img/leaf-white.png" alt="">
                  </div>



                  <div class="contents">
                  <div class="cattitle">
                        <h5><b>SUPPLIER</b>/MIRA KHADKA</h5>
                    </div>

                    
            <div class="productInfoWrapper">
            <div class="productInfo">
                <div class="supplierImage">
                <img src="/img/farmer.jpg" alt="">
            </div>
            <div class="supplierInfo">
                <h6>FARMER</h6>
                <h1>MIRA KHADKA</h1>
                <P>A farmer's main goal is to produce a good crop and/or healthy animals in other to make living and to feed the </p>
                <div class="star2">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                      </div>
                <h4>PRODUCTS:</h4> <h5>Tomato, Onion, Rice</h5><br>
                <h4>FIELDS:</h4> <h5>2 Acres.</h5><br>
                <h4>CONTACT NO:</h4> <h5>9812345678</h5><br>
                <button>CONTACT</button>
            </div>
        </div>
    </div>



    <div class="wrapper">
        <div class="productHeading">
            <h3>PRODUCTS</h3>
            <img src="/img/leaf-GREEN.png" alt="" class="leaf">
        </div>
            <div class="supplierDetail">
              <div>
                {{--  <ul class="suppDetailNav">
                    <li>
                        <button class="tablinks" onclick="openCity(event, 'additional')" id="defaultOpen">VEGETABLES</button>
                    </li>
                    <li>
                        <button class="tablinks" onclick="openCity(event, 'additional')" id="defaultOpen">FRUITS</button>
                        </li>
                        <li>
                            <button class="tablinks" onclick="openCity(event, 'additional')" id="defaultOpen">LIVESTOCK</button>
                            </li>
                            <li>
                                <button class="tablinks" onclick="openCity(event, 'additional')" id="defaultOpen">CEREALS</button>
                                </li>
                </ul>  --}}
                <hr>
              </div>
                <ul class="supplierProduct">
                        <div class="supplier-item">
                                <li>
                                        <img src="/img/kisspng-cherry-tomato-lecsxf3-cultivar-auglis-fruit-fresh-tomatoes-5a8fd985ef5338.7956302015193767739803.png" alt="">
                                        <h6>TOMATO</h6>
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
                   <div class="supplier-item">
                        <li>
                            <img src="/img/cauli.png" alt="">
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
                       <div class="supplier-item">
                            <li>
                                    <img src="/img/kisspng-cherry-tomato-lecsxf3-cultivar-auglis-fruit-fresh-tomatoes-5a8fd985ef5338.7956302015193767739803.png" alt="">
                                    <h6>TOMATO</h6>
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
                           <div class="supplier-item">
                                <li>
                                    <img src="/img/cauli.png" alt="">
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
                               <div class="supplier-item">
                                    <li>
                                            <img src="/img/kisspng-cherry-tomato-lecsxf3-cultivar-auglis-fruit-fresh-tomatoes-5a8fd985ef5338.7956302015193767739803.png" alt="">
                                            <h6>TOMATO</h6>
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
                                   <div class="supplier-item">
                                        <li>
                                            <img src="/img/cauli.png" alt="">
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
                                      <div class="supplier-item">
                                        <li>
                                            <img src="/img/cauli.png" alt="">
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
                                       <div class="supplier-item">
                                        <li>
                                            <img src="/img/cauli.png" alt="">
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
                    </ul> 
            </div>
        </div>
            </div>
 
           @include('frontend.footer');
    </body>
</html>