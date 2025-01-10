<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }

    .login {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: radial-gradient(#653d84, #332042);
      padding: 15px;
    }

    .login_box {
      width: 100%;
      max-width: 1050px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 1px 4px 22px -8px #0004;
      display: flex;
      flex-wrap: wrap;
      overflow: hidden;
    }

    .left,
    .right {
      width: 100%;
      max-width: 500px;
    }

    .left {
      background: linear-gradient(-45deg, #dcd7e0, #fff);
      padding: 25px;
      flex: 1;
    }

    .left h3 {
      text-align: center;
      margin-bottom: 40px;
    }

    .left input,
    .left select {
      width: 100%;
      margin: 10px 0px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .submit {
      width: 100%;
      padding: 15px;
      border: none;
      background: #583672;
      color: #fff;
      font-weight: bold;
      text-align: center;
      border-radius: 8px;
      margin-top: 20px;
    }

    .right {
      background: linear-gradient(212.38deg, rgba(242, 57, 127, 0.7) 0%, rgba(175, 70, 189, 0.71) 100%),
        url('/main_themes/images/uploads/slider-bg2.jpg') no-repeat center center/cover;
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      flex: 1;
      padding: 25px;
    }

    .right h2 {
      font-size: 36px;
      font-weight: bold;
    }

    video,
    img {
      width: 100%;
      height: auto;
      border-radius: 5px;
      margin-top: 10px;
    }

    .text-center button {
      display: block;
      margin: 10px auto;
    }

    @media (max-width: 768px) {
      .login_box {
        flex-direction: column;
      }

      .left,
      .right {
        max-width: 100%;
      }

      .right {
        padding: 20px;
      }

      .right h2 {
        font-size: 28px;
      }
    }
  </style>
</head>

<body>
  <section class="login">
    <div class="login_box">
      <div class="left">
        <form method="POST" action="/register" enctype="multipart/form-data">
          @csrf
          <h3>SIGN UP</h3>

          <input id="Stu_name" type="text" placeholder="Student Name" name="Stu_name" value="{{ old('Stu_name') }}"
            class="form-control @error('Stu_name') is-invalid @enderror" required>
          @error('Stu_name')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <input id="username" type="text" placeholder="Student Username" name="username" value="{{ old('username') }}"
            class="form-control @error('username') is-invalid @enderror" required>
          @error('username')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <input id="Stu_contactnumber" type="number" placeholder="Contact Number" name="Stu_contactnumber"
            value="{{ old('Stu_contactnumber') }}" class="form-control @error('Stu_contactnumber') is-invalid @enderror"
            required>
          @error('Stu_contactnumber')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <select name="Subj_stream" id="Subj_stream" class="form-select" required>
            <option value="physical">Physical Science</option>
            <option value="science">Science</option>
            <option value="commerce">Commerce</option>
            <option value="arts">Arts</option>
            <option value="technology">Technology</option>
          </select>
          @error('Subj_stream')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <!-- <input id="Stu_image" type="file" name="Stu_image" class="form-control @error('Stu_image') is-invalid @enderror">
          @error('Stu_image')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror -->

          
          <input id="parent_email" type="email" placeholder="Parent Email" name="parent_email" value="{{ old('parent_email') }}"
            class="form-control @error('parent_email') is-invalid @enderror" required>
          @error('parent_email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <div class="text-center mt-4">
            <button type="button" id="start-webcam-btn" class="btn btn-secondary mb-2">Start Webcam</button>
            <video id="webcam" autoplay playsinline class="d-none"></video>
            <canvas id="canvas" class="d-none"></canvas>
            <button type="button" id="capture-btn" class="btn btn-primary mt-2 d-none">Capture Photo</button>
            <img id="captured-photo" class="d-none mt-2">
            <input required type="hidden" name="captured_image" id="captured_image">
          </div>

          <input id="email" type="email" placeholder="Email Address" name="Stu_email" value="{{ old('Stu_email') }}"
            class="form-control @error('Stu_email') is-invalid @enderror" required>
          @error('Stu_email')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <input id="password" type="password" placeholder="Password" name="password"
            class="form-control @error('password') is-invalid @enderror" required>
          @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror

          <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation"
            class="form-control" required>

          <button type="submit" class="submit">SIGN UP</button>
        </form>
      </div>
      <div class="right">
        <div>
          <h2>Welcome to SIPSA</h2>
        </div>
      </div>
    </div>
  </section>

  <script>
    const startWebcamBtn = document.getElementById('start-webcam-btn');
    const webcam = document.getElementById('webcam');
    const canvas = document.getElementById('canvas');
    const captureBtn = document.getElementById('capture-btn');
    const capturedPhoto = document.getElementById('captured-photo');
    const capturedImageInput = document.getElementById('captured_image');

    // Function to start webcam
    startWebcamBtn.addEventListener('click', () => {
      navigator.mediaDevices.getUserMedia({ video: true })
        .then(stream => {
          webcam.srcObject = stream;
          webcam.classList.remove('d-none');
          captureBtn.classList.remove('d-none');
        })
        .catch(error => {
          console.error("Webcam error:", error);
          alert("Unable to access webcam. Please check your browser settings.");
        });
    });

    // Function to capture photo
    captureBtn.addEventListener('click', () => {
      const context = canvas.getContext('2d');
      canvas.width = webcam.videoWidth;
      canvas.height = webcam.videoHeight;
      context.drawImage(webcam, 0, 0, canvas.width, canvas.height);

      const imageDataUrl = canvas.toDataURL('image/png');
      capturedPhoto.src = imageDataUrl;
      capturedPhoto.classList.remove('d-none');
      capturedImageInput.value = imageDataUrl;
    });
  </script>
</body>

</html>
