<!DOCTYPE hmtl>

<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="cupcakesAssets/popupLogin.js"></script>
    <link rel="stylesheet" href="cakeAssets/Assets.css">

    <link rel="shortcut icon" href="cakeAssets/layered.png">
    <link rel="stylesheet" href="cakeAssets/popupLogin.css">
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
            <div class ="LogoIcon"> <a href="{{ url('/main')}}" style="text-decoration: none; cursor: pointer;"><img src="cakeAssets/layered.png"></a></div>

            <div class="Home">
              <button type="button" class="HomeButton">
                <a href="{{ url('/main')}}"><ion-icon name="home-outline" class="HomeButtonIcon" ></ion-icon></a>
              </button>
            </div>
            
          </div>
          <div class="Header2">
            <div class="cupcakes">
              <h3 >Cakes</h3>
            </div>
            
            <div class="PageBanner">
              <div class="Banner">
                <img src="cakeAssets/layered.jpeg" class="Layered">
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
            <h3 >Cakes</h3>
            </div>
            <div class="productscontainer">
              <div class="products" data-name="p-1">
                <div class="prodimg">
                  <img src="cakeAssets/products/1.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Gold Flower Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Gold Flower Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest
                    </form>
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-2">
                <div class="prodimg">
                  <img src="cakeAssets/products/2.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Blue Baby Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Blue Baby Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-3">
                <div class="prodimg">
                  <img src="cakeAssets/products/3.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Money Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Money Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>

              </div>
    
              <div class="products" data-name="p-4">
                <div class="prodimg">
                  <img src="cakeAssets/products/4.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Frosty Design Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Frosty Design Cake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest
                  </form>
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-5">
                <div class="prodimg">  
                  <img src="cakeAssets/products/5.png" alt="">
                </div>
                <div class="prodtext">

                  <h1>Green Flower Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                   <input type="hidden" name="product" value="Green Flower Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-6">
                <div class="prodimg">
                  <img src="cakeAssets/products/6.png" alt="">
                </div>
                <div class="prodtext">

                  <h1>White Wedding Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="White Wedding Cake">
                    <input type="hidden" name="amount" value="500">
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
    
              <div class="products" data-name="p-7">
                <div class="prodimg">
                  <img src="cakeAssets/products/7.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Beer Design Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Beer Design Cake">
                    <input type="hidden" name="amount" value="500">
                  
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-8">
                <div class="prodimg">
                  <img src="cakeAssets/products/8.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Blue Wedding Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Blue Wedding Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-9">
                <div class="prodimg">
                  <img src="cakeAssets/products/9.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Pink Frosty Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Pink Frosty Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-10">
                <div class="prodimg">
                  <img src="cakeAssets/products/10.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Blue Dedication Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Blue Dedication Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-11">
                <div class="prodimg">
                  <img src="cakeAssets/products/11.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Pony Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Pony Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>                  
                    </div>
                </div>
              </div>
              <div class="products" data-name="p-12">
                <div class="prodimg">
                  <img src="cakeAssets/products/12.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Animated Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Animated Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-13">
                <div class="prodimg">
                  <img src="cakeAssets/products/13.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Love Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Love Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-14">
                <div class="prodimg">
                  <img src="cakeAssets/products/14.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Purple Dedication Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Purple Dedication Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-15">
                <div class="prodimg">
                  <img src="cakeAssets/products/15.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Ferarri Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Ferarri Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-16">
                <div class="prodimg">
                  <img src="cakeAssets/products/16.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Yellow Flower Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Yellow Flower Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-17">
                <div class="prodimg">
                  <img src="cakeAssets/products/17.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Jordan Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Jordan Cake">
                    <input type="hidden" name="amount" value="500">
                  
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-18">
                <div class="prodimg">
                  <img src="cakeAssets/products/18.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Jurrasic Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Jurrasic Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-19">
                <div class="prodimg">
                  <img src="cakeAssets/products/19.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Sky Blue Dedication Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Sky Blue Dedication Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest  
                  </form>
                  </div>
                </div>
              </div>
              <div class="products" data-name="p-20">
                <div class="prodimg">
                  <img src="cakeAssets/products/20.png" alt="">
                </div>
                <div class="prodtext">
                  <h1>Eligant Dedication Cake</h1>
                  <div class="price">Php 500</div>
                  <div class="button">
                  <form action="/checkout" method="POST">
                    @csrf
                    @guest 
                    <button type="button"  style="font-size:1.7rem;" onclick="showLoginModal()">Buy Now</button>
                    @else
                    <input type="hidden" name="product" value="Eligant Dedication Cake">
                    <input type="hidden" name="amount" value="500">
                    
                    <button type="submit" style="font-size:1.7rem;">Buy Now</button>
                    @endguest
                    </form>
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