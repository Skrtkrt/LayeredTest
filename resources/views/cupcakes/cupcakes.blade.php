<!DOCTYPE hmtl>

<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="cupcakesAssets/Slideshow.js"></script>
    <script src="cupcakesAssets/popupLogin.js"></script>
    <link rel="stylesheet" href="cupcakesAssets/Trans.css">
    <link rel="stylesheet" href="cupcakesAssets/Assets.css">
    <link rel="stylesheet" href="cupcakesAssets/popup.css">
    <link rel="stylesheet" href="cupcakesAssets/popupLogin.css">
    <link rel="shortcut icon" href="cupcakesAssets/layered.png">
    <title>Layered</title>
</head>    
    <body>
      <header>
        <div class="PageHeader">
          <div class="Header1">
            <!-- <li>
              <div class="Menu">
                <button type="button" class="MenuButton">
                <a href="#" class="MenuHover"><ion-icon name="menu-outline" class="MenuButtonIcon"></ion-icon>  </a>
                </button>
              </div>
              <div class="dropdown">
                <div class="ListContainer">
                  <div class="MenuTitle"><a>List Of Menu</a></div>
                  <div class="MenuList"><a>Cakes</a></div>
                  <div class="MenuList"><a>CupCakes</a></div>
                  <div class="MenuList"><a>Cookies</a></div>
                  <div class="MenuList"><a>Suggest Design</a></div>
                  </div>
              </div>
            </li> -->
            <div class ="LogoIcon"> <a href="{{url ('/main')}}" style="text-decoration: none; cursor: pointer;"><img src="cupcakesAssets/layered.png"></a></div>

            <div class="Home">
              <button type="button" class="HomeButton">
                <a href=" {{url ('/main')}}"><ion-icon name="home-outline" class="HomeButtonIcon"></ion-icon></a>
              </button>
            </div>
            
          </div>
          <div class="Header2">
            <div class="cupcakes">
              <h3 >cupcakes</h3>
            </div>
            
            <div class="PageBanner">
              <div class="Banner">
                <img src="cupcakesAssets/layered.jpeg" class="Layered">
              </div>
            </div>
          </div>    
          <div class="Header3">
              <li>
                @guest
                <div class="Login">
                  <button type="button" class="LoginButton">
                    <ion-icon name="people-circle-outline" class="LoginButtonIcon"></ion-icon>
                  </button>
                </div>
                <div class="LoginDropDown">
                <a href="{{ route('login') }}">
                  <div class="LoginLink" >
                    Login
                  </div>
                </a>
                <a href="{{ route('register') }}">
                  <div class="SignupLink">
                    Signup
                  </div>
                </a>
                </div>
                @else
                <div class="Login">
                  <button type="button" class="LoginButton">
                    <ion-icon name="people-circle-outline" class="LoginButtonIcon"></ion-icon>
                  </button>
                </div>
                <div class="LoginDropDown">
                <a href="/account">
                  <div class="LoginLink">
                    {{ Auth::user()->name }}
                  </div>
                </a>
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <div class="SignupLink">
                    Logout
                  </div>
                  </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
                @endguest
              </li>
            </div>
        </div>

      

      </header>
      <main>
        
        <div class="TransitionContainer">
          <div class="cupcake">
            <h3 >cupcakes</h3>
            </div>
            <div class="productscontainer">
              <div class="products" data-name="p-1">
                <div class="prodimg">
                  <img src="cupcakesAssets/image1.jpg" alt="">
                </div>
                
                <div class="prodtext" id="">
                  <h1>Jordan Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <form action="/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="product" value="Jordan Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-2">
                <div class="prodimg">
                  <img src="cupcakesAssets/image2.jpg" alt="">
                </div>
                <div class="prodtext">
                  <h1>Balls Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Balls Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-3">
                <div class="prodimg">
                  <img src="cupcakesAssets/image3.jpg" alt="">
                </div>
                <div class="prodtext">
                  <h1>Mickey mouse Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Mickey mouse Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>

              </div>
    
              <div class="products" data-name="p-4">
                <div class="prodimg">
                  <img src="cupcakesAssets/image4.jpg" alt="">
                </div>
                <div class="prodtext">
                  <h1>Flower Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Flowers Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-5">
                <div class="prodimg">  
                  <img src="cupcakesAssets/image5.jpg" alt="">
                </div>
                <div class="prodtext">

                  <h1>Rainbow Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Rainbow Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-6">
                <div class="prodimg">
                  <img src="cupcakesAssets/image6.jpg" alt="">
                </div>
                <div class="prodtext">

                  <h1>Cocomelon Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Cocomelon Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-7">
                <div class="prodimg">
                  <img src="cupcakesAssets/image7.jpg" alt="">
                </div>
                <div class="prodtext">
                  <h1>Basketball Cupcake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Basketball Cupcake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    </form>
                    @endguest
                  </div>
                </div>
              </div>
            

  
         
              
      
      
           </div>
       
        </div>
      </main>
      <footer>
        <div class="PageFooter">
          <!-- Load Icon-->
          <div class="Footer1">
            <div class="Empty"> </div>
            <div class="AboutUs">
              <button type="button" class="AboutUsButton">
                <a href="/about"><ion-icon name="people-outline" class="AboutUsIcon"></ion-icon></a><a class="AboutUStext" href="/about">About Us</a>  
              </button>
            </div>
            
            <div class="Contact">  
              <button type="button" class="ContactButton">
              <a href="/contact"><ion-icon name="call-outline" class="ContactIcon"></ion-icon></a><a class="ContactText" href="/contact">Contact Us</a>

              </button>
            </div>
          </div>
          
                    
          <div class="footer2">
            <div class="Signage">
              <a class="Note">Follow and Like Us</a>
            </div>
            <div class="Facebook">
              <button type="button" class="FacebookButton">
                <a href="https://www.facebook.com/theIngridibles" style="color:black;"><ion-icon name="logo-facebook" class="FacebookIcon"></ion-icon></a><a class="FacebookText" href="https://www.facebook.com/theIngridibles">Facebook</a>

              </button>
            </div>
            
            <div class="Instagram">
              <button type="button" class="InstagramButton">
                <a href="https://www.instagram.com/if_cato/"><ion-icon name="logo-instagram" class="InstagramIcon"></ion-icon></a><a class="InstagramText" href="https://www.instagram.com/if_cato/">Instagram</a>
              </button>
            </div>
          </div>
          
      </footer>

    
    </body>
</html>
