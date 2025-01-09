<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SIPSA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax//student/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="/student/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- /student/Libraries Stylesheet -->
    <link href="/student/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="/student/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="/student/css/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="/simple-datatables/style.css">


    <style>

                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

                * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
                }
              
                .chatbot__button {
                position: fixed;
                bottom: 35px;
                right: 70px;
                width: 50px;
                height: 50px;
                display: flex;
                justify-content: center;
                align-items: center;
                background: #227ebb;
                color: #f3f7f8;
                border: none;
                border-radius: 50%;
                outline: none;
                cursor: pointer;
                z-index: 9999; 
                }
                .chatbot__button span {
                position: absolute;
                }
                .show-chatbot .chatbot__button span:first-child,
                .chatbot__button span:last-child {
                opacity: 0;
                }
                .show-chatbot .chatbot__button span:last-child {
                opacity: 1;
                }
                .chatbot {
                position: fixed;
                bottom: 100px;
                right: 40px;
                width: 420px;
                background-color: #f3f7f8;
                border-radius: 15px;
                box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1) 0 32px 64px -48px rgba(0, 0, 0, 0.5);
                transform: scale(0.5);
                transition: transform 0.3s ease;
                overflow: hidden;
                opacity: 0;
                pointer-events: none;
                z-index: 9999; 
                }
                .show-chatbot .chatbot {
                opacity: 1;
                pointer-events: auto;
                transform: scale(1);
                }
                .chatbot__header {
                position: relative;
                background-color: #227ebb;
                text-align: center;
                padding: 16px 0;
                }
                .chatbot__header span {
                display: none;
                position: absolute;
                top: 50%;
                right: 20px;
                color: #202020;
                transform: translateY(-50%);
                cursor: pointer;
                }
                .chatbox__title {
                font-size: 1.4rem;
                color: #f3f7f8;
                }
                .chatbot__box {
                height: 510px;
                overflow-y: auto;
                padding: 30px 20px 100px;
                }
                .chatbot__chat {
                display: flex;
                }
                .chatbot__chat p {
                max-width: 75%;
                font-size: 0.95rem;
                white-space: pre-wrap;
                color: #202020;
                background-color: #019ef9;
                border-radius: 10px 10px 0 10px;
                padding: 12px 16px;
                }
                .chatbot__chat p.error {
                color: #721c24;
                background: #f8d7da;
                }
                .incoming p {
                color: #202020;
                background: #bdc3c7;
                border-radius: 10px 10px 10px 0;
                }
                .incoming span {
                width: 32px;
                height: 32px;
                line-height: 32px;
                color: #f3f7f8;
                background-color: #227ebb;
                border-radius: 4px;
                text-align: center;
                align-self: flex-end;
                margin: 0 10px 7px 0;
                }
                .outgoing {
                justify-content: flex-end;
                margin: 20px 0;
                }
                .incoming {
                margin: 20px 0;
                }
                .chatbot__input-box {
                position: absolute;
                bottom: 0;
                width: 100%;
                display: flex;
                gap: 5px;
                align-items: center;
                border-top: 1px solid #227ebb;
                background: #f3f7f8;
                padding: 5px 20px;
                }
                .chatbot__textarea {
                width: 100%;
                min-height: 55px;
                max-height: 180px;
                font-size: 0.95rem;
                padding: 16px 15px 16px 0;
                color: #202020;
                border: none;
                outline: none;
                resize: none;
                background: transparent;
                }
                .chatbot__textarea::placeholder {
                font-family: 'Poppins', sans-serif;
                }
                .chatbot__input-box span {
                font-size: 1.75rem;
                color: #202020;
                cursor: pointer;
                visibility: hidden;
                }
                .chatbot__textarea:valid ~ span {
                visibility: visible;
                }

                @media (max-width: 490px) {
                .chatbot {
                    right: 0;
                    bottom: 0;
                    width: 100%;
                    height: 100%;
                    border-radius: 0;
                }
                .chatbot__box {
                    height: 90%;
                }
                .chatbot__header span {
                    display: inline;
                }
                }


    </style>
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="/" class="navbar-brand font-weight-bold text-secondary" style="font-size: 50px;">
                <i class="flaticon-043-teddy-bear"></i>
                <span class="text-primary">SIPSA</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="/" class="nav-item nav-link active">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Classes</a>
                        <div class="dropdown-menu rounded-0 m-0">
                        @foreach($SubjectList as $dataSubjectList)
                            <a href="/class/{{$dataSubjectList->subj_stream}}" class="dropdown-item">{{$dataSubjectList->subj_stream}}</a>
                        @endforeach    
                        </div>
                    </div>
          
                    <a href="/team" class="nav-item nav-link">Teachers</a>


                    <a href="/contact.html" class="nav-item nav-link">Contact</a>
                    @if(!Auth::guard('student')->check())  
                    <a href="/teacher/TobeTeacher" class="nav-item nav-link">To be Teacher</a>
                    @endif

                    <a href="#" class="nav-item nav-link">About</a>

                    <a href="/selfEvaluation" class="nav-item nav-link">Self-Evaluation</a>

                    @if(Auth::guard('student')->check())  
                     <a href="/myClasses" class="nav-item nav-link">My Classes</a>
                    @else
                    <a href="#" onclick="needLogin()" class="nav-item nav-link">My Classes</a>
                    @endif
                </div>

                @if(Auth::guard('student')->check())  
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger px-4">Logout</a>
                   
                    <form id="logout-form" action="/logout/student" method="POST" style="display: none;">
                                            @csrf
                    </form>

                @else
                    <a href="/login" class="btn btn-primary px-4">Login</a>
                    <a href="/register" class="btn btn-primary px-4">Sign Up</a>
                @endif
            </div>
        </nav>
    </div>
    <!-- Navbar End -->





<!-- Icon  -->
<link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
    />
<!-- Code :) -->
   <button class="chatbot__button">
      <span class="material-symbols-outlined">mode_comment</span>
      <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
      <div class="chatbot__header">
        <h3 class="chatbox__title">FAQ</h3>
        <span class="material-symbols-outlined">close</span>
      </div>
      <ul class="chatbot__box">
        <li class="chatbot__chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there. How can I help you today? Please login</p>
        </li>
        <!-- <li class="chatbot__chat outgoing">
          <p>...</p>
        </li> -->
      </ul>
      <div class="chatbot__input-box">
        <textarea id="chat-input"
          class="chatbot__textarea"
          placeholder="Enter a message..."
          required
        ></textarea>
        <span id="send-btn" class="material-symbols-outlined">send</span>
      </div>
    </div>

 @if(Auth::guard('student')->check())  

<script>
        const chatBox = document.querySelector('.chatbot__box');
    // Fetch messages
    const loadMessages = async () => {
        const response = await fetch('/chat/messages');
        const messages = await response.json();

       
        chatBox.innerHTML = '';

        if (!messages || messages.length === 0) {
        // Show default message if no messages are present
        const li = document.createElement('li');
        li.classList.add('chatbot__chat', 'incoming');

        const span = document.createElement('span');
        span.classList.add('material-symbols-outlined');
        span.textContent = 'smart_toy'; // Icon for the chatbot

        const p = document.createElement('p');
        p.textContent = 'Hi there. How can I help you today?';

        li.appendChild(span);
        li.appendChild(p);
        chatBox.appendChild(li);
        } else {
            // Populate messages if they exist
            messages.forEach((msg) => {
                const li = document.createElement('li');
                li.classList.add('chatbot__chat', msg.type === 1 ? 'outgoing' : 'incoming');

                const span = document.createElement('span');
                span.classList.add('material-symbols-outlined');
                span.textContent = msg.type === 1 ? '' : 'smart_toy'; // Add icon only for incoming messages

                const p = document.createElement('p');
                p.textContent = msg.message;

                li.appendChild(span);
                li.appendChild(p);
                chatBox.appendChild(li);
            });
        }


        chatBox.scrollTop = chatBox.scrollHeight;
    };

    // Send a message
    const sendMessage = async () => {
        const input = document.getElementById('chat-input');
        const message = input.value;

        if (!message) return;

        await fetch('/chat/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
            },
            body: JSON.stringify({ message}),
        });

        input.value = '';
        loadMessages();
    };

    document.getElementById('send-btn').addEventListener('click', sendMessage);

    // Load messages on page load
    loadMessages();
    setInterval(loadMessages, 3000); // Poll every 3 seconds
</script>

@endif

    @yield('content')


    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                    <i class="flaticon-043-teddy-bear"></i>
                    <span class="text-white">SIPSA</span>
                </a>
                <p>Labore dolor amet ipsum ea, erat sit ipsum duo eos. Volup amet ea dolor et magna dolor, elitr rebum duo est sed diam elitr. Stet elitr stet diam duo eos rebum ipsum diam ipsum elitr.</p>
                <div class="d-flex justify-content-start mt-4">
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                        style="width: 38px; height: 38px;" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Get In Touch</h3>
                <div class="d-flex">
                    <h4 class="fa fa-map-marker-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Address</h5>
                        <p>123 Street, New York, USA</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-envelope text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Email</h5>
                        <p>info@example.com</p>
                    </div>
                </div>
                <div class="d-flex">
                    <h4 class="fa fa-phone-alt text-primary"></h4>
                    <div class="pl-3">
                        <h5 class="text-white">Phone</h5>
                        <p>+012 345 67890</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Quick Links</h3>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Classes</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Teachers</a>
                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>Our Blog</a>
                    <a class="text-white" href="#"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>

                    <a class="text-white mb-2" href="#"><i class="fa fa-angle-right mr-2"></i>To be Teacher</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h3 class="text-primary mb-4">Newsletter</h3>
                <form action="">
                    <div class="form-group">
                        <input type="text" class="form-control border-0 py-4" placeholder="Your Name" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control border-0 py-4" placeholder="Your Email"
                            required="required" />
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">Submit Now</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
            <p class="m-0 text-center text-white">
                &copy; <a class="text-primary font-weight-bold" href="#">Your Site Name</a>. All Rights Reserved. 
				
				<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
				Designed by <a class="text-primary font-weight-bold" href="https://htmlcodex.com">HTML Codex</a>
            </p>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


           @if (\Session::has('success'))
                    <script>
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            title: {!! json_encode(\Session::get('success')) !!},
                            showConfirmButton: false,
                            timer: 1500
                        });
                    </script>
            @endif
            @if (\Session::has('delete'))
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: {!! json_encode(\Session::get('delete')) !!},
                            footer: ''
                        });
                    </script>
            @endif
            @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                    <script>
                        Swal.fire({
                        icon: "error",
                        position: "top-end",
                        title: "",
                        text: {!! json_encode($error) !!},
                        footer: '',
                        timer: 4500,
                        showConfirmButton: false,
                        });
                    </script>
                @endforeach
            @endif



<script>
function needLogin() {
 
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: 'Must be logged in',
            footer: ''
        });

}
</script>


<script>

        const chatbotToggle = document.querySelector('.chatbot__button');

        const chatbotCloseBtn = document.querySelector('.chatbot__header span');

        chatbotToggle.addEventListener('click', () =>
        document.body.classList.toggle('show-chatbot')
        );
        chatbotCloseBtn.addEventListener('click', () =>
        document.body.classList.remove('show-chatbot')
        );
        sendChatBtn.addEventListener('click', handleChat);

</script>

<script src="/simple-datatables/simple-datatables.js"></script>
	<script>
			let table1 = document.querySelector('#table_filter');
			let dataTable = new simpleDatatables.DataTable(table1);	
	</script>
    <!-- JavaScript /student/Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/student/lib/easing/easing.min.js"></script>
    <script src="/student/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/student/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/student/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/student/mail/jqBootstrapValidation.min.js"></script>
    <script src="/student/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/student/js/main.js"></script>
</body>

</html>