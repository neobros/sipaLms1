<style>
  img {
    width: 100%;
  }



.input_container {
    border: 1px solid #e5e5e5;
  }

  input[type=file]::file-selector-button {
    background-color: #fff;
    color: #000;
    border: 0px;
    border-right: 1px solid #e5e5e5;
    padding: 10px 15px;
    margin-right: 20px;
    transition: .5s;
  }

  input[type=file]::file-selector-button:hover {
    background-color: #eee;
    border: 0px;
    border-right: 1px solid #e5e5e5;
  }

            
  .login {
    height: 1241px;
    width: 100%;
    background: radial-gradient(#653d84, #332042);
    position: relative;
  }

  .login_box {
    width: 1050px;
    height: 1085px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: #fff;
    border-radius: 10px;
    box-shadow: 1px 4px 22px -8px #0004;
    display: flex;
    overflow: hidden;
  }

  .login_box .left {
    width: 41%;
    height: 100%;
    padding: 25px 25px;

  }

  .login_box .right {
    width: 59%;
    height: 100%
  }

  .left .top_link a {
    color: #452A5A;
    font-weight: 400;
  }

  .left .top_link {
    height: 20px
  }

  .left .contact {
    display: flex;
    align-items: center;
    justify-content: center;
    align-self: center;
    height: 100%;
    width: 73%;
    margin: auto;
  }

  .left h3 {
    text-align: center;
    margin-bottom: 40px;
  }

  .left input {
    border: none;
    width: 80%;
    margin: 15px 0px;
    border-bottom: 1px solid #4f30677d;
    padding: 7px 9px;
    width: 100%;
    overflow: hidden;
    background: transparent;
    font-weight: 600;
    font-size: 14px;
  }

  .left {
    background: linear-gradient(-45deg, #dcd7e0, #fff);
  }

  .submit {
    border: none;
    padding: 15px 70px;
    border-radius: 8px;
    display: block;
    margin: auto;
    margin-top: 30px;
    background: #583672;
    color: #fff;
    font-weight: bold;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  }

  .submit1 {
    margin-left: 36px;
    border: none;
    padding: 15px 76px;
    border-radius: 8px;
    /* display: block; */
    /* margin: auto; */
    margin-top: 30px;
    background: #583672;
    color: #fff;
    font-weight: bold;
    -webkit-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    -moz-box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
    box-shadow: 0px 9px 15px -11px rgba(88, 54, 114, 1);
  }



  .right {
    background: linear-gradient(212.38deg, rgba(242, 57, 127, 0.7) 0%, rgba(175, 70, 189, 0.71) 100%), url(/main_themes/images/uploads/slider-bg2.jpg);
    color: #fff;
    position: relative;
  }

  .right .right-text {
    height: 100%;
    position: relative;
    transform: translate(0%, 45%);
  }

  .right-text h2 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 50px;
    font-weight: 500;
  }

  .right-text h5 {
    display: block;
    width: 100%;
    text-align: center;
    font-size: 19px;
    font-weight: 400;
  }

  .right .right-inductor {
    position: absolute;
    width: 70px;
    height: 7px;
    background: #fff0;
    left: 50%;
    bottom: 70px;
    transform: translate(-50%, 0%);
  }

  .top_link img {
    width: 28px;
    padding-right: 7px;
    margin-top: -3px;
  }
</style>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
  integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<body>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <section class="login">
    <div class="login_box">
      <div class="left">
        <div class="top_link"><a href="/"><img
              src="/student/left.png.svg" alt="">Return
            home</a></div>
        <div class="contact">
          <form method="POST" action="/teacher/register" enctype="multipart/form-data">
            @csrf
            <h3>Teacher SIGN UP</h3>
            <input id="Teach_name" type="text" placeholder="Teacher name" class="@error('Teach_name') is-invalid @enderror" name="Teach_name"
              value="{{ old('Teach_name') }}" required autocomplete="Teach_name" autofocus>
            @error('Teach_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror


            <select required  id="mainCategory" class="form-control">
                  <option selected value="">Select Main Stream</option>
                  <option value="physical">Physical Science stream</option>
                  <option value="science">Science stream</option>
                  <option value="commerce">Commerce stream</option>
                  <option value="arts">Arts stream</option>
                  <option value="technology">Technology stream</option>
            </select>
            
           <p></p>
            <select required   name="Teach_stream" id="subCategory" class="form-control">
                        
            </select>

            @error('Teach_stream')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="Teach_address" type="text" placeholder="Teacher Address" class="@error('Teach_address') is-invalid @enderror" name="Teach_address"
              value="{{ old('Teach_address') }}" required autocomplete="Teach_address" autofocus>
            @error('Teach_address')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror



            <input id="Teach_email" type="email" placeholder="Teacher Email Address" class=" @error('Teach_email') is-invalid @enderror"
              name="Teach_email" value="{{ old('Teach_email') }}" required autocomplete="Teach_email">
            @error('Teach_email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="Teach_nic" type="text" placeholder="Teacher NIC" class=" @error('Teach_nic') is-invalid @enderror"
              name="Teach_nic" value="{{ old('Teach_nic') }}" required autocomplete="Teach_nic">
            @error('Teach_nic')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="Teach_phone" type="number" placeholder="Teacher Phone" class=" @error('Teach_phone') is-invalid @enderror"
              name="Teach_phone" value="{{ old('Teach_phone') }}" required autocomplete="Teach_phone">
            @error('Teach_phone')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror



            <input id="username" type="text" placeholder="Teacher username" class="@error('username') is-invalid @enderror" name="username"
              value="{{ old('username') }}" required autocomplete="username" autofocus>
            @error('username')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

      
            <input id="password" type="password" placeholder="Password" class="@error('password') is-invalid @enderror"
              name="password" required autocomplete="new-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input id="password-confirm" placeholder="Confirm Password" type="password" name="password_confirmation"
              required autocomplete="new-password">


            <label for="Teacher_CV" class="">Upload your CV</label>
            <input id="Teacher_CV" type="file" placeholder="Teacher_CV" class="@error('Teacher_CV') is-invalid @enderror" name="Teacher_CV"
              required autocomplete="name" autofocus>
            @error('Teacher_CV')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

    
     
            <label for="Teach_image" class="">Upload your photo</label>
            <input id="Teach_image" type="file" placeholder="Teach_image" class="@error('Teach_image') is-invalid @enderror" name="Teach_image"
              required autocomplete="name" autofocus>
            @error('Teach_image')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror




            <button class="submit">SIGN UP</button>

          </form>
        </div>
      </div>
      <div class="right">
        <div class="right-text">
          <h2>SIPSA</h2>
         
        </div>
      
      </div>
    </div>
  </section>
</body>



<script>
  $(document).ready(function() {
      $('#mainCategory').change(function() {
          var mainCategory = $(this).val();

          // AJAX request to the backend
          $.ajax({
              url: '/teacher/getSubCategories',  // Your backend route
              type: 'GET',
              data: { category: mainCategory },
              success: function(response) {
                  // Clear the subcategory dropdown
                  $('#subCategory').empty();

                  // Add new options from the response data
                  // $('#subCategory').append('<option value="">Select Sub Category</option>');
                  $.each(response.subCategories, function(index, subCategory) {
                      $('#subCategory').append('<option value="'+subCategory.subj_ID+'">'+subCategory.subj_name+'</option>');
                  });
              },
              error: function(xhr, status, error) {
                  console.error("Error fetching subcategories: ", error);
              }
          });
      });
  });
</script>

</html>