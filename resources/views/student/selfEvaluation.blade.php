@extends('student.head')
@section('content')


<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }

    /* Secondary Chatbot Button */
    .chatbot__button1 {
        position: fixed;
        bottom: 35px;
        right: 150px;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        background: #4caf50; /* Green color for the secondary chatbot button */
        color: #f3f7f8;
        border: none;
        border-radius: 50%;
        outline: none;
        cursor: pointer;
        z-index: 9999;
    }

    .chatbot__button1 span {
        position: absolute;
    }

    .show-chatbot2 .chatbot__button1 span:first-child,
    .chatbot__button1 span:last-child {
        opacity: 0;
    }

    .show-chatbot2 .chatbot__button1 span:last-child {
        opacity: 1;
    }

    /* Secondary Chatbot Styles */
    .chatbot2 {
        position: fixed;
        bottom: 100px;
        right: 120px;
        width: 400px;
        background-color: #e8f5e9; /* Light green background */
        border-radius: 15px;
        box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
            0 32px 64px -48px rgba(0, 0, 0, 0.5);
        transform: scale(0.5);
        transition: transform 0.3s ease;
        overflow: hidden;
        opacity: 0;
        pointer-events: none;
        z-index: 9999;
    }

    .show-chatbot2 .chatbot2 {
        opacity: 1;
        pointer-events: auto;
        transform: scale(1);
    }

    .chatbot2 .chatbot__header {
        position: relative;
        background-color: #4caf50; /* Green header */
        text-align: center;
        padding: 16px 0;
    }

    .chatbot2 .chatbox__title {
        font-size: 1.4rem;
        color: #ffffff;
    }

    .chatbot2 .chatbot__header span {
        display: none;
        position: absolute;
        top: 50%;
        right: 20px;
        color: #202020;
        transform: translateY(-50%);
        cursor: pointer;
    }

    .chatbot2 .chatbot__box {
        height: 500px;
        overflow-y: auto;
        padding: 25px 15px 90px;
        background: #ffffff; /* White background for messages */
    }

    .chatbot2 .chatbot__chat {
        display: flex;
    }

    .chatbot2 .chatbot__chat p {
        max-width: 75%;
        font-size: 0.95rem;
        white-space: pre-wrap;
        color: #202020;
        background-color: #a5d6a7; /* Green bubble color */
        border-radius: 10px 10px 0 10px;
        padding: 12px 16px;
    }

    .chatbot2 .incoming p {
        background: #c8e6c9; /* Light green background for incoming */
        border-radius: 10px 10px 10px 0;
    }

    .chatbot2 .incoming span {
        width: 32px;
        height: 32px;
        line-height: 32px;
        color: #f3f7f8;
        background-color: #4caf50; /* Icon color */
        border-radius: 4px;
        text-align: center;
        align-self: flex-end;
        margin: 0 10px 7px 0;
    }

    .chatbot2 .outgoing {
        justify-content: flex-end;
        margin: 20px 0;
    }

    .chatbot2 .chatbot__input-box {
        position: absolute;
        bottom: 0;
        width: 100%;
        display: flex;
        gap: 5px;
        align-items: center;
        border-top: 1px solid #4caf50;
        background: #ffffff;
        padding: 5px 20px;
    }

    .chatbot2 .chatbot__textarea {
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

    .chatbot2 .chatbot__textarea::placeholder {
        font-family: 'Poppins', sans-serif;
    }

    .chatbot2 .chatbot__input-box span {
        font-size: 1.75rem;
        color: #202020;
        cursor: pointer;
        visibility: hidden;
    }

    .chatbot2 .chatbot__textarea:valid ~ span {
        visibility: visible;
    }

    @media (max-width: 490px) {
        .chatbot2 {
            right: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
        }

        .chatbot2 .chatbot__box {
            height: 90%;
        }

        .chatbot2 .chatbot__header span {
            display: inline;
        }
    }
</style>



    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">Our Teachers</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">Our Teachers</p>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <div class="container">
        <h2 class="mt-5">Eligible Quizzes</h2>
        <div class="row">
            @forelse ($Quizzes as $quiz)
                <div class="col-md-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $quiz->title }}</h5>
                            <p class="card-text">{{ $quiz->subject_name }} By {{ $quiz->teacher_name }}</p>
                            <a href="{{ route('student.takeQuiz', $quiz->id) }}" class="btn btn-primary">Take Quiz</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No eligible quizzes available.</p>
            @endforelse
        </div>
        <!-- Parent Report Button -->
    <div class="mt-5 text-center">
        <a href="{{ route('parent.parentReport') }}" class="btn btn-success btn-lg">
            View Parent Report
        </a>
    </div>
    </div>
    
   <!-- Second Chatbot -->
   <div class="chatbot-wrapper" id="chatbot-secondary-wrapper">
    <button class="chatbot__button1" id="chatbot-secondary-toggle">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot2" id="chatbot-secondary">
        <div class="chatbot__header">
            <h3 class="chatbox__title">Student Chat</h3>
            <span class="material-symbols-outlined" id="chatbot-secondary-close">close</span>
        </div>
        <ul class="chatbot__box" id="chatbox-secondary">
            <li class="chatbot__chat incoming">
                <!-- <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there. This is the secondary chatbot. How can I help you today?</p> -->
            </li>
        </ul>
        <div class="chatbot__input-box">
            <textarea id="chat-input-secondary" class="chatbot__textarea" placeholder="Enter a message..." required></textarea>
            <span id="send-btn-secondary" class="material-symbols-outlined">send</span>
        </div>
    </div>
</div>



    
    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
          

               
            </div>
        </div>
    </div>
    <!-- Team End -->



    <script>

            const chatbotSecondaryToggle = document.getElementById('chatbot-secondary-toggle');
            const chatbotSecondaryClose = document.getElementById('chatbot-secondary-close');
            const chatboxSecondary = document.getElementById('chatbox-secondary');
            const sendBtnSecondary = document.getElementById('send-btn-secondary');
            const chatInputSecondary = document.getElementById('chat-input-secondary');

            // Load Messages for Chatbot Secondary
            const loadMessagesSecondary = async () => {
                const response = await fetch('/studentChat/messages');
                const messages = await response.json();

                chatboxSecondary.innerHTML = '';

                if (!messages || messages.length === 0) {
                    const li = document.createElement('li');
                    li.classList.add('chatbot__chat', 'incoming');

                    const span = document.createElement('span');
                    span.classList.add('material-symbols-outlined');
                    span.textContent = 'smart_toy';

                    // const p = document.createElement('p');
                    // p.textContent = 'Hi there. This is the secondary chatbot. How can I help you today?';

                    li.appendChild(span);
                    li.appendChild(p);
                    chatboxSecondary.appendChild(li);
                } else {
                    messages.forEach((msg) => {
                            const li = document.createElement('li');
                            li.classList.add('chatbot__chat', msg.type === 1 ? 'outgoing' : 'incoming');

                            if (msg.type !== 1) {
                                const img = document.createElement('img');
                                img.src = '/uploads/' + msg.Stu_image; 
                                img.alt = 'User Avatar';
                                img.style.width = '40px';
                                img.style.height = '40px';
                                img.style.borderRadius = '50%';
                                img.style.marginRight = '10px';

                                li.appendChild(img);
                            }

                            const p = document.createElement('p');
                            p.textContent = msg.message;

                            li.appendChild(p);
                            chatboxSecondary.appendChild(li);
                        });
                }

                chatboxSecondary.scrollTop = chatboxSecondary.scrollHeight;
            };

            // Send Message for Chatbot Secondary
            const sendMessageSecondary = async () => {
                const message = chatInputSecondary.value;
                if (!message) return;

                await fetch('/studentChat/send', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ message }),
                });

                chatInputSecondary.value = '';
                loadMessagesSecondary();
            };

            // Event Listeners for Chatbot Secondary
            chatbotSecondaryToggle.addEventListener('click', () => {
                document.body.classList.toggle('show-chatbot2');
                console.log('Body classes:', document.body.className); // Check the body class list
            });
            chatbotSecondaryClose.addEventListener('click', () => {
                console.log('Close button clicked!');
                document.body.classList.remove('show-chatbot2');
            });
            sendBtnSecondary.addEventListener('click', sendMessageSecondary);

            // Load messages for Chatbot Secondary on page load and poll every 3 seconds
            loadMessagesSecondary();
            setInterval(loadMessagesSecondary, 3000);


    </script>

@endsection