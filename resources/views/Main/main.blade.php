<!DOCTYPE hmtl>

<html>
  <head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" ></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="Base/Slideshow.js"></script>
    <link rel="stylesheet" href="Base/Trans.css">
    <link rel="stylesheet" href="Base/Assets.css">
    <link rel="shortcut icon" href="Base/layered.png">
    <title>Layered</title>
    <body>
      <header>
        <div class="PageHeader">
          <div class="Header1">
            <li>
              <div class="Menu">
                <button type="button" class="MenuButton">
                <a href="#" class="MenuHover"><ion-icon name="menu-outline" class="MenuButtonIcon"></ion-icon>  </a>
                </button>
              </div>
              <div class="dropdown">
                <div class="ListContainer">
                  <div class="MenuTitle"><a>List Of Menu</a></div>
                  <div class="MenuList"><a href="{{url ('/cake')}}" style="color:black;">Cakes</a></div>
                  <div class="MenuList"><a href="{{url ('/cupcakes')}}" style="color:black;">CupCakes</a></div>
              
                  <div class="MenuList"><a href="{{url ('/customize')}}" style="color:black;">Suggest Design</a></div>
                  </div>
              </div>
            </li>

            <!-- <div class="Home">
              <button type="button" class="HomeButton">
                <a href="TryHTML.html"><ion-icon name="home-outline" class="HomeButtonIcon"></ion-icon></a>
              </button>
            </div> -->
            
          </div>
          <div class="Header2">
            
            <div class="PageBanner">
              <div class="Banner">
                <img src="Base/layered.jpeg" class="Layered">
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
          <div class="Slider">
            <div class="Images">
              <input type="radio" name="slide" id="img1">
              <input type="radio" name="slide" id="img2">
              <input type="radio" name="slide" id="img3">
              <div class="Image first">

                <img src="Base/cookies.jpg" class="i1" alt="img1" >
              </div class="Image">
              <div class="Image">
                <img src="Base/Cupcakes.jpg" class="i2" alt="img2">
              </div>
              <div class="Image">
                <img src="Base/cakes.jpg"  class="i3" alt="img3">
              </div>

              <div class="auto">
                <div class="autobtn1"></div>
                <div class="autobtn2"></div> 
                <div class="autobtn3"></div>

              </div>
            
            </div>
            <div class="dotscontainer">
              <div class="dots">
                <label for="img1" class="manualbtn"></label>
                <label for="img2" class="manualbtn"></label>
                <label for="img3" class="manualbtn"></label>
              </div>
            </div>


          </div>

          <div class="maincontent">
            <div class="maindivider">
              <div class="subcontent">
                <div class="subcontainer">
                  <div class="contentcontainer">
                    <div class="imgcontent">
                      <img src="Base/contentcake.png">
                    </div>
                    <div class="textcontent">
                      <h1>Cake</h1>
                      <p>Cakes made by Ingrid is one of the most delicious and well dedicated home made cake seen around Apalit.<br><a style="font-weight: bold;">Swipe to the right</a><ion-icon name="chevron-forward-outline" class="next"></ion-icon></p>
                      <div class="shopbutton">
                        <button type="button" class="shopnow"><a href="{{url ('/cake')}}">shop now</a></button>
                      </div>
                    </div>
                    

                  </div>
                  <div class="shopbutton1">
                    <button type="button" class="shopnow"><a href="{{url ('/cake')}}">shop now</a></button>
                  </div> 
                </div>
                <div class="subcontainer">
                  <div class="contentcontainer">
                    <div class="imgcontent">
                      <img src="Base/cupcake.png">
                    </div>
                    <div class="textcontent">
                      <h1>Cupcake</h1>
                      <p>Cupcakes made by Ingrid is one of the most delicious, cute, attractive and well dedicated home made cupcake seen around Apalit.</p>
                      <div class="shopbutton">
                        <button type="button" class="shopnow" ><a href ="{{url ('/cupcakes')}}">shop now</a></button>
                      </div>
                    </div>
                  </div>
                  <div class="shopbutton2">
                    <button type="button" class="shopnow"><a href ="{{url ('/cupcakes')}}">shop now</a></button>
                  </div>  
                </div>
              </div>
              <div class="subcontent2">
                <div class="subcontainer">
                  <div class="contentcontainer">
                    <div class="imgcontent">
                      <img src="Base/CustomizeCake.png">
                    </div>
                    <div class="textcontent">
                      <h1>Customize A Cake</h1>
                      <p>Have some designs in mind? Layered by Ingrid can make it for you. Send now your design and book for it.</p>
                      <div class="shopbutton">
                        <button type="button" class="shopnow"><a href="{{url ('/customize')}}">customize now</a></button>
                      </div>
                    </div>

                  </div>
                  <div class="shopbutton3">
                    <button type="button" class="shopnow"><a href="{{url ('/customize')}}">customize now</a></button>
                  </div> 
                </div>
              </div>
            </div>
            <div class="subcontent3">
              <div class="subcontainer">
                <div class="contentcontainer">
                  <div class="imgcontent">
                    <img src="Base/feedbacks.png">
                  </div>
                  <div class="textcontent">
                    <h1>Feedback</h1>
                    <p>Are you satisfied with our cake products. Send us a little feedback on your experience with us.</p>
                    <div class="shopbutton">
                      <button type="button" class="shopnow"><a href="/feedback">send now</a></button>
                    </div>
                  </div>
                </div>
                <div class="shopbutton4">
                  <button type="button" class="shopnow"><a href="/feedback">send now</a></button>
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
  </head>
</html>
