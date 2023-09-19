

<?php
use App\Models\Products;
use App\Models\Category;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;


//get products 

$categories=Category::latest()->get();

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Cairo:wght@700&family=REM:wght@300&display=swap" rel="stylesheet">
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Home</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style.css') }}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('home/images/fevicon.png') }}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
      <!-- font awesome -->
      <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <!--  -->
      <!-- owl stylesheets -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
      <link rel="stylesoeet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- banner bg main start -->
      <div class="banner_bg_main">
         <!-- header top section start -->
         <div class="container">
            <div class="header_section_top">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="custom_menu">
                        <ul>
                           <li><a href="{{route('Home')}}">Home</a></li>
                           <li><a href="#">Best Sellers</a></li>
                           <li><a href="">Gift Ideas</a></li>
                           <li><a href="{{route('logout')}}">LogOut</a></li>
                         
                       </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- header top section start -->
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <center>
                        <div>
                          <br>
                          <p style="font-size: 40px; margin-bottom: 10px; color: white; font-style: italic; text-shadow: 2px 2px 4px #000000;">
                            Welcome {{ auth()->user()->name }}
                          </p>
                          <br>
                        </div>
                      </center>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section">
            <div class="container">
               <div class="containt_main">
                  <div id="mySidenav" class="sidenav">
                     <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                     <a href="{{route('Home')}}">Home</a>
                      @foreach ($categories as $category )
                     <a href="{{route('category',[$category->id,$category->slug])}}">{{$category->Category_name}}</a>
                     @endforeach
                    
                  </div>
                  <span class="toggle_icon" onclick="openNav()"><img src="{{ asset('home/images/toggle-icon.png')}}"></span>
                  <div class="dropdown">
                     <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category 
                     </button>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                     
                     {{-- show a products in dropdownMenu from a data base (categroy)->client Controller as(CategoryPage)  --}}
                        @foreach($categories as $category)
                        <a class="dropdown-item" href="{{route('category',[$category->id,$category->slug])}}">{{$category->Category_name}}</a>
                        @endforeach
                    
                     </div>
                  </div>
               
                  <div class="main">
                     <!-- Another variation with a button -->
                     <form action="{{ route('Search') }}" method="GET">
                        <div class="input-group">
                           <input type="text" class="form-control" name="search" id="search" placeholder="Search this blog">
                           <div class="input-group-append">
                              <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color: #f26522">
                                 <i class="fa fa-search"></i>
                              </button>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="header_box">
                    
                     <div class="login_menu">
                        <ul>
                           <li><a href="#">
                              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                           <li><a href="#">
                              <i class="fa fa-user" aria-hidden="true"></i>
                              <span class="padding_10">Cart</span></a>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>        
      </div>
      
      <div class="container py-5" style="margin-top: 200px">
         @yield('main-content')
      </div>

      <div class="footer_section layout_padding">
         <div class="container">
            <center><h3 style="color: white"  >{{auth()->user()->name}}</h3></center>
            <div class="input_bt">
               <input type="text" class="mail_bt" value="{{auth()->user()->email}}" name="Your Email">
               <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
               <ul>
                  <li><a href="#">Best Sellers</a></li>
                  <li><a href="">Gift Ideas</a></li>
               </ul>
            </div>
            <div class="location_main">Help Line  Number : <a href="#">01068389295</a></div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
  
    
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="{{ asset('home/js/jquery.min.js') }}"></script>
      <script src="{{ asset('home/js/popper.min.js') }}"></script>
      <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
      <script src="{{ asset('home/js/jquery-3.0.0.min.js') }}"></script>
      <script src="{{ asset('home/js/plugin.js') }}"></script>
      <!-- sidebar -->
      <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
      <script src="{{ asset('home/js/custom.js') }}"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
         }

      </script>
   </body>
</html>
