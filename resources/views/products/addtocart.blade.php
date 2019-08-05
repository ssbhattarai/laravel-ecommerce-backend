<html>
   @include('frontend.head');
    <body style="background-color: #F3F3F3">
      @include('frontend.nav');

                  <div class="headerimg">
                    <h1>PRODUCTS</h1>
                    <img src="/img/leaf-white.png" alt="">
              </div>

              <div class="cattitle">
                <h5>CATEGORY/VEGETABLES/TOMATO</h5>
            </div>
            


            <div class="productInfoWrapper">
            <div class="productInfo">
                <div class="productImage">
                <img src="/img/kisspng-romaine-lettuce-vegetable-fresh-vegetables-5aa9f4980bd168.3002024315210876400484.png" alt="">
            </div>
            <div class="productOrder">
                <h6>VEGETABLE</h6>
                <h1>LETTUCE</h1>
                <P>Tomatoes are juicy berry fruits of the nightshade family (Solanaceae). They came originally from Sindhuli</P>
                <h1><b>Rs. 200</b></h1>
                <h5>WEIGHT (KG)</h5> <input class="orderNumber" type="number" min="1" placeholder="1"> <button type="button" class="btn btn-success">ADD TO CART</button>
                <div class="star">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                  </div>
            </div>
        </div>
            <div class="productDetail">
              <div>
                {{--  <ul class="detailNav">
                    <li>
                       <button class="tablinks" onclick="openCity(event, 'additional')" id="defaultOpen">ADDITIONAL INFORMATION</button>
                    </li>
                    <li>
                      <button class="tablinks" onclick="openCity(event, 'review')">REVIEW</button>
                        </li>
                        <li>
                          <button class="tablinks" onclick="openCity(event, 'supplier')"><a href="suppliers"></a> SUPPLIER</button>
                            </li>
                            <li>
                              <button class="tablinks" onclick="openCity(event, 'tags')">TAGS</button>
                                </li>
                               
                </ul>  --}}
                <hr>
                
                
                <!-- Tab content -->
                <div>
                <div id="additional" class="tabcontent">
                  <p>People who eat fruit and vegetables as part of their daily diet have
                    a reduced risk of many chronic diseases. USDA's My-Plate encourages making
                    half your plate fruits and vegetables. <br>
                    Vegetables are important part of healthy eating and provide a source of many nutrients,
                    including potassium, fiber, folate(folic acid) and vitamins A, E and C. Options like
                    broccoli, spanich, tomatoes and garlic provide additional benefits, making them a superfood! <br>
                    Potassium may help to maintain healthy blood pressure. Dietary fiber from vegetables helps reduced
                    blood cholesterol levels and may lower risk of heart disease. <br>
                    Folate (folic acid) helps the body form healthy red blood cells. Women of childbearing age who may
                    become pregnant and those in the first trimester of pregnancy need adequate folate to reduce the risk of neural tube
                    defects and spina bifida durin fetal development.
                </p>
                </div>
                
                <div id="review" class="tabcontent">
                  <p>Human who eat fruit and vegetables as part of their daily diet have
                    a reduced risk of many chronic diseases. USDA's My-Plate encourages making
                    half your plate fruits and vegetables. <br>
                    Vegetables are important part of healthy eating and provide a source of many nutrients,
                    including potassium, fiber, folate(folic acid) and vitamins A, E and C. Options like
                    broccoli, spanich, tomatoes and garlic provide additional benefits, making them a superfood! <br>
                    Potassium may help to maintain healthy blood pressure. Dietary fiber from vegetables helps reduced
                    blood cholesterol levels and may lower risk of heart disease. <br>
                    Folate (folic acid) helps the body form healthy red blood cells. Women of childbearing age who may
                    become pregnant and those in the first trimester of pregnancy need adequate folate to reduce the risk of neural tube
                    defects and spina bifida durin fetal development.
                </p>
                </div>

                <div id="supplier" class="tabcontent">
                  <p>Homo Sapiens who eat fruit and vegetables as part of their daily diet have
                    a reduced risk of many chronic diseases. USDA's My-Plate encourages making
                    half your plate fruits and vegetables. <br>
                    Vegetables are important part of healthy eating and provide a source of many nutrients,
                    including potassium, fiber, folate(folic acid) and vitamins A, E and C. Options like
                    broccoli, spanich, tomatoes and garlic provide additional benefits, making them a superfood! <br>
                    Potassium may help to maintain healthy blood pressure. Dietary fiber from vegetables helps reduced
                    blood cholesterol levels and may lower risk of heart disease. <br>
                    Folate (folic acid) helps the body form healthy red blood cells. Women of childbearing age who may
                    become pregnant and those in the first trimester of pregnancy need adequate folate to reduce the risk of neural tube
                    defects and spina bifida durin fetal development.
                </p>
                </div>

                <div id="tags" class="tabcontent">
                  <p>Person who eat fruit and vegetables as part of their daily diet have
                    a reduced risk of many chronic diseases. USDA's My-Plate encourages making
                    half your plate fruits and vegetables. <br>
                    Vegetables are important part of healthy eating and provide a source of many nutrients,
                    including potassium, fiber, folate(folic acid) and vitamins A, E and C. Options like
                    broccoli, spanich, tomatoes and garlic provide additional benefits, making them a superfood! <br>
                    Potassium may help to maintain healthy blood pressure. Dietary fiber from vegetables helps reduced
                    blood cholesterol levels and may lower risk of heart disease. <br>
                    Folate (folic acid) helps the body form healthy red blood cells. Women of childbearing age who may
                    become pregnant and those in the first trimester of pregnancy need adequate folate to reduce the risk of neural tube
                    defects and spina bifida durin fetal development.
                </p>
                </div>
              </div>
              </div>
               
                
            </div>
            </div>

            <div class="relatedProduct">
              <h3>RELATED PRODUCTS</h3>
              <img src="/img/leaf-GREEN.png" alt="" class="leaf">

              


              <div class="carouselWrapper">
                  <div class="main-content">

       
                      <div class="owl-carousel owl-theme">
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
         
         @include('frontend.footer');
          
    </body>
</html>