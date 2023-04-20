<?php
use Illuminate\Support\Facades\Redis;
?>
@extends('ui.layout.main_ui')
@section('content')
<div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title">
                        <h2>Export product</h2>
                    </div>
                </div>
                <div class="col-sm-6">
                    <nav aria-label="breadcrumb" class="theme-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Export product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
     <section>
        <div class="collection-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1 col-sm-2 col-xs-12">
                        <div class="row">
                            <div class="col-12 p-0">
                                <div class="slider-right-nav">
                                    <?php // dd($product);  ?>
                                    @if($producst!=null)
                                            @foreach($product as $value1)
                                          <?php   //dd($value1)  ?>
                                            <div ><img src="{{asset($value1->images)}}" alt=""
                                                    class="img-fluid  lazyload"></div>
                                         @endforeach  
                                 @else
                                 
                                 <div ><img src="{{asset($product_detail->image)}}" alt=""
                                            class="img-fluid  lazyload"></div>
                                 @endif
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-10 col-xs-12 order-up">
                        <div class="product-right-slick">
                             @if($producst!=null)
                                     @foreach($product as $value1)
                                    <div><img src="{{asset($value1->images)}}" alt=""
                                                    class="img-fluid   lazyload  example1 block__pic"></div>
                                    @endforeach  
                            
                            @else
                            <div ><img src="{{asset($product_detail->image)}}" alt=""
                                            class="img-fluid  lazyload"></div>
                            
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 rtl-text">
                        <div class="product-right">
                            <h2>{{$product_detail->name}}</h2>
                            <?php 
                               $offer_price=0;
                                $mrp=0;
                                $rate3=0;
                               if($product_detail!=null)
                               {
                                  if($product_detail->offer_price!=null)
                                  {
                                      $offer_price=$product_detail->offer_price;
                                  }  
                                  
                                  else{
                                      $offer_price=0;
                                  }
                            
                                 if($product_detail->price!=null){
                                      $mrp=$product_detail->price;
                                  }  
                                  
                                  else{
                                      $mrp=0;
                                  }
                              
                               $decress=$mrp-$offer_price;
                                  $decressper=$decress/$mrp*100;
                                  $rate3= round($decressper, 2);
                               }
                            ?>
                            <h4><del>₹ @if($product_detail!=null) {{$product_detail->price}} @endif</del><span>{{$rate3}}% off</span></h4>
                            <h3>₹ @if($product_detail!=null){{$product_detail->offer_price}} @endif</h3>
                            <?php 
                                 // dd($value1->id);
                                $product_color=DB::table('product_color')->where('product_id',$product_detail->id)->get();
                                // dd($product_images);
                                ?>
                                <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <ul class="color-variant">
                                @if($product_color!=null)
                                 @foreach($product_color as $valcolor)
                                     
                                   <a href="{{url('product-detail/'.$product_detail->id.'/'.$valcolor->id)}}"><li class="bg-light1" style="background-color:{{$valcolor->color_name}}; background:{{$valcolor->color_name}};"></li></a> 
                                @endforeach
                                @endif
                            </ul>
                           
                            <div class="product-description border-product">
                                 <div class="row">
                            <div class="col-md-6"> 
                            <h6 class="product-title"> Available Size</h6>
                                
                                <form action="{{url('product-detail-by-size')}}" method="get">
                                    @csrf
                                            <input type="hidden" value="{{$product_detail->id}}" name="id">
                                            
                                          <select name="size" class="btn btn-link shadow" onchange="this.form.submit()" style="margin-top:0px;border-top-right-radius: 60px 60px;border-bottom-right-radius: 60px 60px;border-top-left-radius: 60px 60px;border-bottom-left-radius: 60px 60px;">
                                               <?php  
                                               $product_size1=DB::table('product_size')->where('product_id',$product_detail->id)->get();
                                               //dd($product->products_id);
                                             ?>
                                            
                                          <option selected>Select</option>
                                          @foreach($product_size1 as $r1)
                                          <option value="{{$r1->id}}" >{{$r1->size}}</option>
                                          @endforeach
                                          
                                        </select>
                                    </form>       </div>
                            <div class="col-md-6">
                                <h6 class="product-title">quantity</h6>
                                <div class="qty-box">
                                    <div class="input-group"><span class="input-group-prepend"><button type="button"
                                                class="btn quantity-left-minus" data-type="minus" data-field="">-</button> </span>
                                         <input type="text" name="quantity" class="form-control input-number" value="1">
                                        <span class="input-group-prepend"><button type="button"
                                                class="btn quantity-right-plus" data-type="plus" data-field="">+</button></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        
                                            
                                 
                               
                            <div class="product-buttons">
        @if(Auth::check())
                            
                            <!-- <a href="#" style="color:white;"  onclick="addcartsize({{$product_detail->id}})"  data-toggle="modal" data-target="#addtocart" class="btn btn-solid">add to cart</a>  -->
                            <a href="" data-toggle="modal" data-target="#exampleModal" class="btn btn-solid">buy now</a>
                            <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">

                                          @foreach($product as $key=>$value1)
                                           @if($key==0)
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="{{asset($value1->images)}}" alt="">
                                        </a>
                                        @endif
                                        @endforeach
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="{{url('cart-detail')}}" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="{{url('checkout-form')}}" class="checkout btn btn-solid">Check out</a>
                                                <a href="{{url('/')}}" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="{{asset('assets/images/payment_cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                    <?php  
                                    
                                    $user_cart  = DB::table('export_products')->join('carts','export_products.id','=','carts.product_id')->where('carts.user_id',Auth::user()->id)->orderBy('carts.id','desc')->select('export_products.*','carts.quantity','carts.id as cart_id','carts.size','carts.color_id','carts.price')->get();
                                        
                                           ?>
                                           
                                           
                                        <?php $productst=DB::table('export_product_image')->where('product_id',$product_detail->id)->first(); ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productst!=null) {{asset($productst->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$product_detail->name}}</span></a></h6>
                                                        <h4><span>₹ @if($product_detail!=null){{$product_detail->offer_price}}@endif</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $counte=0;?>
                                            @foreach($user_cart as $key=>$valu22)
                                             @if($counte>=1)
                                            
                                              <?php 
                                              
                                              
                                               if (!empty(Redis::get('productsr:product_id:' . $valu22->id))) {
                                                    $productsr = json_decode(Redis::get('productsr:product_id:' . $valu22->id),0);
                                                } else {
                                                    $productsr=DB::table('export_product_image')->where('product_id',$valu22->id)->first();
                                                    Redis::set('productsr:product_id:' . $valu22->id , json_encode($productsr), 'EX', 60*60*12);
                                                }
                                              ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productsr!=null) {{asset($productsr->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$valu22->name}}</span></a></h6>
                                                        <h4><span>₹{{$valu22->price*$valu22->quantity}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                       <?php $counte++; ?>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('bulkorder')}}" method="get">
          @csrf
      <div class="modal-body row">
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label class="text-left">Product Name</label>
            <input type="text" name="product_name" value="{{$product_detail->name}}" readonly class="form-control">
          </div>
           <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User WhatsApp Number</label>
            <input type="text" name="phone" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Address</label>
			  <textarea   name="address" class="form-control"></textarea>
          </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
			   <div class="form-group ">
           		 <label  class="text-left">Order Quantity</label>
			   
					<div class="col-lg-4 col-md-4 col-sm-6 col">
						 <input type="number" name="quantity" Placeholder="Quantity in number" class="form-control">
					</div>
					  <div class="col-lg-8 col-md-8  col-sm-6 col mt-2">
							<input   name="quantity_type" class="form-control" Placeholder="Quantity Type">

					</div>
			   </div>
           
			 
           
         
          </div>
           
         
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Country </label>
            <select type="text" name="country" id="inputState" class="form-control">
                <option value="">Select Your Choice</option>
                 <option value="ALASKA">Alaska</option>
                 <option value="Albania">Albania</option>
                 <option value="Algeria">Algeria</option>
               <option value="Angola">Angola</option>
                <option value="Antigua">Antigua</option>
                <option value="Argentina">Argentina</option>
                <option value="Aruba">Aruba</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                 <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                 <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                  <option value="Bonaire">Bonaire</option>
               
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                 
                
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>    
          </div>
           <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Port Name</label>
            <select type="text" name="port_name" id="inputDistrict" class="form-control">
                 <option value="">Select Your Choice</option>
            </select>
        </div>  
        <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Eco Term</label>
            <select type="text" name="eco_term" class="form-control">
                 <option value="Ex Works">Ex Works</option>
                 <option value="Free Carrier">Free Carrier</option>
                 <option value="Free Alongside Ship">Free Alongside Ship</option>
                 <option value="Free On Board">Free On Board</option>
                 <option value="Cost & Freight">Cost & Freight</option>
                 <option value="Cost, Insurance & Freight">Cost, Insurance & Freight</option>
                 <option value="Cost Paid To">Cost Paid To</option>
                 <option value="Carrier & Insurance Paid To">Carrier & Insurance Paid To</option>
                 <option value="Delivered At Place Unloaded">Delivered At Place Unloaded</option>
                 <option value="Delivered At Place">Delivered At Place</option>
                 <option value="Delivered Duty Paid">Delivered Duty Paid</option>
                 
            </select>
        </div>  
         <div class="form-group col-lg-12 col-md-12 col-12">
            Payment Terms
            <br> <input type="checkbox" name="shipping_option[]" id="account-option" value="Irrevocable LC" > 1. Irrevocable LC. 
 <input type="checkbox" name="shipping_option[]" id="account-option1" value="Revocable LC" style="margin-left:82px;" > 2. Revocable LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option2" value="Stand-by LC"> 3. Stand-by LC. 

 <input type="checkbox" name="shipping_option[]" id="account-option3"style="margin-left:97px;" value="Confirmed LC"> 4. Confirmed LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option4" value="Unconfirmed LC"> 5. Unconfirmed LC. 

 <input type="checkbox" name="shipping_option[]" id="account-option5" style="margin-left:73px;" value="Transferable LC"> 6. Transferable LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option6" value="Back-to-Back LC"> 7. Back-to-Back LC. 
 <input type="checkbox" name="shipping_option[]" id="account-option7"style="margin-left:70px;" value="Payment at Sight LC" > 8. Payment at Sight LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option8" value="Deferred Payment LC" > 9. Deferred Payment LC.  
 <input type="checkbox" name="shipping_option[]" id="account-option9" style="margin-left:40px;" value="Red Clause LC"> 10. Red Clause LC.<br>
			 <input type="checkbox" name="shipping_option[]" id="account-option10" style=" " value="Telegraphic transfer(TT)">11 Telegraphic transfer(TT)  
			 <input type="checkbox" name="shipping_option[]" id="account-option11" style="margin-left:27px;" value="Advance "> 12. Advance <br>

			 <input type="checkbox" name="shipping_option[]" id="account-option12" style=" " value="Document against payment.(DP/DAP)"> 13. Document against payment.(DP/DAP)

            
          </div>
         <div class="form-group col-lg-7 col-md-7 col-7">
            
              <button type="submit" class="btn btn-primary" style="
    text-align: center;
    float:right;
" onclick="alert('Thank You')">Save</button>
    
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>

    
                            
                            
                             @else
                             <!-- <a style="color: white;"  onclick="addcartsize({{$product_detail->id}})" data-toggle="modal" data-target="#addtocart" class="btn btn-solid">add to cart</a> -->
                              <a href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-solid">buy now</a>
                          <div class="modal fade bd-example-modal-lg theme-modal cart-modal" id="addtocart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body modal1">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-12">
                                <div class="modal-bg addtocart">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <div class="media">

                                          @foreach($product as $key=>$value1)
                                           @if($key==0)
                                        <a href="#">
                                            <img class="img-fluid blur-up lazyload pro-img"
                                                src="{{asset($value1->images)}}" alt="">
                                        </a>
                                        @endif
                                        @endforeach
                                        <div class="media-body align-self-center text-center">
                                            <a href="#">
                                                <h6>
                                                    <i class="fa fa-check"></i>Item
                                                    <span>men full sleeves</span>
                                                    <span> successfully added to your Cart</span>
                                                </h6>
                                            </a>
                                            <div class="buttons">
                                                <a href="{{url('cart-detail')}}" class="view-cart btn btn-solid">Your cart</a>
                                                <a href="{{url('checkout-form')}}" class="checkout btn btn-solid">Check out</a>
                                                <a href="{{url('/')}}" class="continue btn btn-solid">Continue shopping</a>
                                            </div>

                                            <div class="upsell_payment">
                                                <img src="{{asset('assets/images/payment_cart.png')}}"
                                                    class="img-fluid blur-up lazyload" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-section">
                                        <div class="col-12 product-upsell text-center">
                                            <h4>Customers who bought this item also.</h4>
                                        </div>
                                        <div class="row" id="upsell_product">
                                    <?php  $user_cart  = DB::table('export_products')->join('carts_temp','export_products.id','=','carts_temp.product_id')->where('carts_temp.user_id',Session::getId())->orderBy('carts_temp.id','desc')->select('export_products.*','carts_temp.quantity','carts_temp.id as cart_id','carts_temp.size','carts_temp.color_id','carts_temp.price')->get();
                                        
                                           ?>
                                           
                                           
                                        <?php $productst=DB::table('export_product_image')->where('product_id',$product_detail->id)->first(); ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productst!=null) {{asset($productst->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$product_detail->name}}</span></a></h6>
                                                        <h4><span>₹ @if($product_detail!=null){{$product_detail->offer_price}}@endif</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $counte=0;?>
                                            @foreach($user_cart as $key=>$valu22)
                                             @if($counte>=1)
                                            
                                              <?php 
                                              
                                           
                                              if (!empty(Redis::get('productsr1:product_id:' . $valu22->id))) {
                                                    $productsr = 1(Redis::get('productsr1:product_id:' . $valu22->id),0);
                                                } else {
                                                    $productsr=DB::table('export_product_image')->where('product_id',$valu22->id)->first();
                                                    Redis::set('productsr1:product_id:' . $valu22->id , json_encode($productsr), 'EX', 60*60*12);
                                                }
                                              ?>
                                            <div class="product-box col-sm-3 col-6">
                                                <div class="img-wrapper">
                                                    <div class="front">
                                                        <a href="#">
                                                            <img src="@if($productsr!=null) {{asset($productsr->images)}} @endif"
                                                                class="img-fluid blur-up lazyload mb-1"
                                                                alt="cotton top">
                                                        </a>
                                                    </div>
                                                    <div class="product-detail">
                                                        <h6><a href="#"><span>{{$valu22->name}}</span></a></h6>
                                                        <h4><span>₹{{$valu22->price*$valu22->quantity}}</span></h4>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endif
                                       <?php $counte++; ?>
                                            @endforeach
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                            
                            
                            
                      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bulk Order </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('bulkorder')}}" method="post">
          @csrf
      <div class="modal-body row">
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Product Name</label>
            <input type="text" name="product_name" value="{{$product_detail->name}}" readonly class="form-control">
          </div>
           <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Name</label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Email</label>
            <input type="text" name="email" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User WhatsApp Number</label>
            <input type="text" name="phone" class="form-control">
          </div>
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">User Address</label>
			    <textarea   name="address" class="form-control"></textarea>
           
          </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-6">
			   <div class="form-group ">
           		 <label  class="text-left">Order Quantity</label>
			   
					<div class="col-lg-12 col-md-12 col-sm-6 col">
						 <input type="number" name="quantity" Placeholder="Quantity in number" class="form-control">
					</div>
					  <div class="col-lg-12 col-md-12  col-sm-6 col mt-2">
							<input   name="quantity_type" class="form-control" Placeholder="Quantity Type">

					</div>
			   </div>
           
			 
           
         
          </div>
           
             
          <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Country </label>
            <select type="text" name="country" id="inputState" class="form-control">
                <option value="">Select Your Choice</option>
                 <option value="ALASKA">Alaska</option>
                 <option value="Albania">Albania</option>
                 <option value="Algeria">Algeria</option>
               <option value="Angola">Angola</option>
                <option value="Antigua">Antigua</option>
                <option value="Argentina">Argentina</option>
                <option value="Aruba">Aruba</option>
                <option value="Afganistan">Afghanistan</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Bahamas">Bahamas</option>
                 <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                 <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                  <option value="Bonaire">Bonaire</option>
               
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                 
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Canary Islands">Canary Islands</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Channel Islands">Channel Islands</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos Island">Cocos Island</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote DIvoire">Cote DIvoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Curaco">Curacao</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="East Timor">East Timor</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands">Falkland Islands</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Ter">French Southern Ter</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Great Britain">Great Britain</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Hawaii">Hawaii</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="Indonesia">Indonesia</option>
                <option value="India">India</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea North">Korea North</option>
                <option value="Korea Sout">Korea South</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macau">Macau</option>
                <option value="Macedonia">Macedonia</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Malawi">Malawi</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Midway Islands">Midway Islands</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Nambia">Nambia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherland Antilles">Netherland Antilles</option>
                <option value="Netherlands">Netherlands (Holland, Europe)</option>
                <option value="Nevis">Nevis</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau Island">Palau Island</option>
                <option value="Palestine">Palestine</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Phillipines">Philippines</option>
                <option value="Pitcairn Island">Pitcairn Island</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Republic of Montenegro">Republic of Montenegro</option>
                <option value="Republic of Serbia">Republic of Serbia</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="St Barthelemy">St Barthelemy</option>
                <option value="St Eustatius">St Eustatius</option>
                <option value="St Helena">St Helena</option>
                <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                <option value="St Lucia">St Lucia</option>
                <option value="St Maarten">St Maarten</option>
                <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                <option value="Saipan">Saipan</option>
                <option value="Samoa">Samoa</option>
                <option value="Samoa American">Samoa American</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tahiti">Tahiti</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Erimates">United Arab Emirates</option>
                <option value="United States of America">United States of America</option>
                <option value="Uraguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Vatican City State">Vatican City State</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                <option value="Wake Island">Wake Island</option>
                <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                <option value="Yemen">Yemen</option>
                <option value="Zaire">Zaire</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>    
          </div>
           <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Port Name</label>
            <select type="text" name="port_name" id="inputDistrict" class="form-control">
                 <option value="">Select Your Choice</option>
            </select>
        </div>  
        <div class="form-group col-lg-6 col-md-6 col-6">
            <label  class="text-left">Eco Term</label>
            <select type="text" name="eco_term" class="form-control">
                 <option value="Ex Works">Ex Works</option>
                 <option value="Free Carrier">Free Carrier</option>
                 <option value="Free Alongside Ship">Free Alongside Ship</option>
                 <option value="Free On Board">Free On Board</option>
                 <option value="Cost & Freight">Cost & Freight</option>
                 <option value="Cost, Insurance & Freight">Cost, Insurance & Freight</option>
                 <option value="Cost Paid To">Cost Paid To</option>
                 <option value="Carrier & Insurance Paid To">Carrier & Insurance Paid To</option>
                 <option value="Delivered At Place Unloaded">Delivered At Place Unloaded</option>
                 <option value="Delivered At Place">Delivered At Place</option>
                 <option value="Delivered Duty Paid">Delivered Duty Paid</option>
                 
            </select>
        </div>  
        <div class="form-group col-lg-12 col-md-12 col-12">
            Payment Terms
            <br> <input type="checkbox" name="shipping_option[]" id="account-option" value="Irrevocable LC" > 1. Irrevocable LC. 
 <input type="checkbox" name="shipping_option[]" id="account-option1" value="Revocable LC" style="margin-left:82px;" > 2. Revocable LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option2" value="Stand-by LC"> 3. Stand-by LC. 

 <input type="checkbox" name="shipping_option[]" id="account-option3"style="margin-left:97px;" value="Confirmed LC"> 4. Confirmed LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option4" value="Unconfirmed LC"> 5. Unconfirmed LC. 

 <input type="checkbox" name="shipping_option[]" id="account-option5" style="margin-left:73px;" value="Transferable LC"> 6. Transferable LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option6" value="Back-to-Back LC"> 7. Back-to-Back LC. 
 <input type="checkbox" name="shipping_option[]" id="account-option7"style="margin-left:70px;" value="Payment at Sight LC" > 8. Payment at Sight LC.<br>
 <input type="checkbox" name="shipping_option[]" id="account-option8" value="Deferred Payment LC" > 9. Deferred Payment LC.  
 <input type="checkbox" name="shipping_option[]" id="account-option9" style="margin-left:40px;" value="Red Clause LC"> 10. Red Clause LC. <br>
<input type="checkbox" name="shipping_option[]" id="account-option10" style=" " value="Telegraphic transfer(TT)">11 Telegraphic transfer(TT)  
			 <input type="checkbox" name="shipping_option[]" id="account-option11" style="margin-left:27px;" value="Advance "> 12. Advance <br>

			 <input type="checkbox" name="shipping_option[]" id="account-option12" style=" " value="Document against payment.(DP/DAP)"> 13. Document against payment.(DP/DAP)

            
          </div>
           <div class="form-group col-lg-7 col-md-7 col-7">
            
              <button type="submit" class="btn btn-primary" style="
    text-align: center;
    float:right;
" onclick="alert('Thank You')">Save</button>
    
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--<button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
                             @endif
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">product details</h6>
                                <p>{!!$product_detail->main_details!!}</p>
                            </div>
                            <div class="border-product">
                                <h6 class="product-title">share it</h6>
                                <div class="product-icon">
                                    <ul class="product-social">
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                    </ul>
                                    <div class="d-inline-block">
                                         	@if(Auth::check())
                                        <a class="wishlist-btn"  @if($productsize!=null) href="{{url('add-to-wishlist/'.$productsize->id)}}" @endif ><i class="fa fa-heart ti-heart"></i><span
                                                class="title-font">Add To WishList</span></a>
                                          @else       
                                                 <a class="wishlist-btn"  data-toggle="modal" data-target=".bd-example-modal-lg" ><i class="fa fa-heart ti-heart"></i><span
                                                class="title-font">Add To WishList</span></a>
                                        @endif    
                                    </div>
                                </div>
                            </div>
                             @if($product_detail->today_deals==1)
                            <div class="border-product">
                                <h6 class="product-title">Time Reminder</h6>
                                <div class="timer">
                                    <p id="demo"><span>25 <span class="padding-l">:</span> <span
                                                class="timer-cal">Days</span> </span><span>22 <span
                                                class="padding-l">:</span> <span class="timer-cal">Hrs</span>
                                        </span><span>13 <span class="padding-l">:</span> <span
                                                class="timer-cal">Min</span> </span><span>57 <span
                                                class="timer-cal">Sec</span></span>
                                    </p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section ends -->


    <!-- related products -->
    <section class="section-b-space pt-0 ratio_asos">
        <div class="container">
            <div class="row">
                <div class="col-12 product-related">
                    
                    <h2>related products</h2>
                </div>
            </div>
            
            <div class="row search-product">
                  <?php 
                    $relproduct=DB::table('export_products')->where('cat_id','export')->get();
                     ?>

            @foreach($relproduct as $value4)
            <?php 
          //  dd($value4->id);
             
             if (!empty(Redis::get('productimage1:product_id:' . $value4->id))) {
                $productsr = 1(Redis::get('productimage1:product_id:' . $value4->id),0);
            } else {
                $productimage1=DB::table('export_product_image')->where('product_id',$value4->id)->first();
                Redis::set('productimage1:product_id:' . $value4->id , json_encode($productsr), 'EX', 60*60*12);
            }
                   //dd($productimage1);
            ?>
            
              
                <div class="col-xl-2 col-md-4 col-sm-6">
                    <div class="product-box">
                        <div class="img-wrapper">
                            <div class="front">
                                <a href="{{url('export-product-detail/'.$value4->id)}}"><img src="@if($value4!=null){{asset($value4->image)}} @endif"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                            <div class="back">
                                <a href="{{url('export-product-detail/'.$value4->id)}}"><img src="@if($value4!=null){{asset($value4->image)}} @endif"
                                        class="img-fluid blur-up lazyload bg-img" alt=""></a>
                            </div>
                             <div class="cart-info cart-wrap">
                               	@if(Auth::check())
                                    <!-- <button data-toggle="modal"  onclick="addcart({{$value4->id}})" data-target="#addtocart" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button> -->
                                    @else
                                    <!-- <button data-toggle="modal" data-target=".bd-example-modal-lg" title="Add to cart">
                                        <i class="ti-shopping-cart"></i>
                                    </button> -->
                                    @endif
                                        @if(Auth::check())
                                    <a href="javascript:void(0)"  onclick="wishlist({{$value4->id}})" title="Add to Wishlist">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                    @else
                                      <a href="#"  data-toggle="modal" data-target=".bd-example-modal-lg" title="Add to Wishlist">
                                        <i class="ti-heart" ></i>
                                    </a>
                                    @endif
                                    <!--<a href="#"-->
                                    <!--data-toggle="modal" data-target="#quick-view" title="Quick View"><i-->
                                    <!--    class="ti-search" aria-hidden="true"></i></a> <a href="compare.html"-->
                                    <!--title="Compare"><i class="ti-reload" aria-hidden="true"></i></a>-->
                                    </div>
                        </div>
                        <div class="product-detail">
                            <div class="rating"><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                            <a href="product-page(no-sidebar).html">
                                <h6>{{$value4->name}}</h6>
                            </a>
                            
                                 
                                            
                                          
                                        <h4>₹ {{$value4->offer_price}}</h4>
                                     
                            
                            <ul class="color-variant">
                               
                                     
                                    <li class="bg-light1" style="background-color:{{$value4->color}}; background:{{$value4->color}};"></li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                 @endforeach
            </div>
        </div>
    </section>
  <section class="section-b-space pt-0 ratio_asos  ">
         <div class="container">
            <div class="col-12 product-related">
                    <h2>product detail</h2>
            </div>
         <p style="font-size:18px;color:#000;">{!!$product_detail->description!!}</p>
          
         </div>
         
     </section>
       
@endsection