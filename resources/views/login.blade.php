<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/4dad1e0fea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{url('css/login.css')}}" />
    <title>MB-TABLE</title>
</head>
<body>
    <div class="container">
        <div class="forms-container">
          <div class="signin-signup">

            <form action="/signIn" method="POST" enctype="multipart/form-data" class="sign-in-form">
                {{ csrf_field() }}
              <h2 class="title">Sign in</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" required id="username" name="username"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" required id="password" name="password"/>
              </div>
              <div class="check">
                <input class="checkbox_input" type="checkbox" id="rememberme" name="rememberme">
                <label class="checkbox" for="myCheckboxId">Remember Me</label>
                </div>
              <input type="submit" value="Login" class="btn solid" />
              <p class="social-text">Or Sign in with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div>
              <br>
                @if ($errors->any())
                    <div style="color:red">{{ $errors->first() }}</div>
                @endif
            </form>

            <form action="/signUp" method="POST" enctype="multipart/form-data" class="sign-up-form">
                {{ csrf_field() }}
              <h2 class="title">Sign up</h2>
              <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" required id="usernameRegist" name="usernameRegist"/>
              </div>
              <div class="input-field">
                <i class="fas fa-envelope"></i>
                <input type="email" placeholder="Email" required id="email" name="email"/>
              </div>
              <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" id="txtPassword" placeholder="Password" required name="txtPassword"/>
              </div>
              <div class="input-field">
                <i class="fa-solid fa-unlock-keyhole"></i>
                <input type="password" id="txtConfirmPassword" placeholder="Confirm Password" required name="txtConfirmPassword"/>
              </div>
              <div class="check">
                <input class="checkbox_input" type="checkbox" id="myCheckboxId" name="myCheckboxId" required>
                <label class="checkbox" for="myCheckboxId">I Agree to the <label class="show-btn">Terms and Conditions</label></label>
              </div>
              <input type="submit" class="btn" value="Sign up" />
              <p class="social-text">Or Sign up with social platforms</p>
              <div class="social-media">
                <a href="#" class="social-icon">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="social-icon">
                  <i class="fab fa-google"></i>
                </a>
              </div>
            </form>
          </div>
        </div>

        <div class="panels-container">
          <div class="panel left-panel">
            <div class="content">
              <h3>New here ?</h3>
              <p>
                Hello There! If you don't have an account, click the register button to register
              </p>
              <button class="btn transparent" id="sign-up-btn">Sign up</button>
              <button class="btn transparent" id="sign-up-btn" style="margin-left:20px;"><a href="/" style="text-decoration:none; color:white;">Back</a></button>
            </div>
          </div>
          <div class="panel right-panel">
            <div class="content">
              <h3>One of us ?</h3>
              <p>
                Welcome Back! If you already have an account, click the sign in button to login
              </p>
              <button class="btn transparent" id="sign-in-btn">Sign in</button>
              <button class="btn transparent" id="sign-up-btn" style="margin-left:20px;"><a href="/" style="text-decoration:none; color:white;">Back</a></button>
            </div>
          </div>
        </div>

        <div class="containerBg">
            <div class="containerShow">
                <label class="close-btn fas fa-times" id="closeTerms"></label>
                <div class="text">Terms and Condition</div>
                <div class="content">
                <h1>General requirements</h1>
                <ol>
                    <li>This website is an online platform created with the intent and purpose of ordering billiard tables from several billiard venues in the Jabodetabek area, our service will enable users to order billiard tables easily and quickly.</li>
                    <li>Users can log in and create an account for the sake of ordering or checking details about ordering billiard tables.</li>
                    <li>Users must be at least 17 years old to be able to book with their own account, if users are not yet 17 years old please find a trusted adult as a companion and assist in ordering.</li>
                    <li>Users are responsible for maintaining the security of their respective log-in information and are not permitted to provide any information to third parties.</li>
                    <li>This website will provide several e-wallet payment methods, please only follow the website instructions when making a transaction.</li>
                    <li>If the payment has been received, it cannot be canceled or in other words there will be no refund.</li>
                    <li>This website is made with full awareness and responsibility, any party is not permitted to imitate or distribute content on this website.</li>
                </ol>

                <h1>Privacy Policy</h1>
                <ol>
                    <li>We collect user personal information for verification and order confirmation purposes.</li>
                    <li>User's personal information will not be distributed or provided to third parties without the user's consent.</li>
                </ol>

                <h1>Limitation of Liability</h1>
                <ol>
                    <li>We are not responsible for any loss or damage arising from the use of our website services.</li>
                    <li>Users are responsible for any damage or loss caused by their own actions.</li>
                </ol>

                <h1>Service Changes and Closures</h1>
                <ol>
                    <li>We reserve the right to make changes to our service at any time without prior notification.</li>
                    <li>We also reserve the right to close our website when necessary.</li>
                </ol>

                <h1>Contact</h1>
                <ol>
                    <li>If you have questions or complaints, please contact us via email (mb_table@gmail.com) or the telephone number (+6285861821216).</li>
                </ol>
            </div>
        </div>

      </div>

      <script src="{{url('js/login.js')}}"></script>
</body>
</html>
