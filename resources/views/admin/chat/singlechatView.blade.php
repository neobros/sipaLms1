@extends('admin.head')

@section('content')

<meta name="csrf-token" content="{{ csrf_token() }}">


<section class="pcoded-main-container">
    <div class="pcoded-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">New Teachers List</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/admin/dashboard"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard Home</a></li>
                            <li class="breadcrumb-item"><a href="3">Classes List</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    

        <div class="row">
            <div class="col-sm-12">
                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <strong>{{ \Session::get('success') }}</strong>
                    </div>
                    @endif
                    @if (\Session::has('delete'))
                    <div class="alert alert-danger">
                        <strong>{{ \Session::get('delete') }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5>Chat View</h5>
                    </div>
                    <div class="card-body">
                        <div id="chatWindow" class="chat-window" style="height: 400px; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
                            <!-- Messages will be dynamically added here -->
                        </div>
                        <!-- Message Input and Send Button -->
                        <form id="chatForm" style="margin-top: 10px;">
                            <div class="input-group">
                                <input type="text" id="messageInput" class="form-control" placeholder="Type your message here..." required>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                                    </div>

            <!-- Add some styling to improve layout -->
            <style>
                .chat-window {
                    display: flex;
                    flex-direction: column;
                }
                .message {
                    margin-bottom: 15px;
                }
                .message.sender .bubble {
                    align-self: flex-start;
                }
                .message.receiver .bubble {
                    align-self: flex-end;
                }
            </style>



<script>
    const chatWindow = document.getElementById('chatWindow');
    const messageInput = document.getElementById('messageInput');
    const chatForm = document.getElementById('chatForm');
    const apiUrl = '/admin/chat/messages/{{$user->stu_ID}}'; // Update this with your backend API URL for fetching messages
    const sendUrl = '/admin/chat/send/{{$user->stu_ID}}';    // Update this with your backend API URL for sending messages

    // Fetch and display chat messages
    async function fetchMessages() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            // Clear chat window
            chatWindow.innerHTML = '';

            // Loop through messages and render them
            data.forEach(msg => {
                const isSender = msg.type !== 1; // If type is not 1, it's a sender message
                const messageHTML = `
                    <div class="message ${isSender ? 'sender' : 'receiver'}" style="text-align: ${isSender ? 'left' : 'right'};">
                        <div class="bubble" style="background-color: ${isSender ? '#007bff' : '#f1f1f1'}; color: ${isSender ? 'white' : 'black'}; padding: 10px; border-radius: 10px; margin-bottom: 10px; width: fit-content; max-width: 70%; text-align: left;">
                            ${msg.message}
                        </div>
                        <span style="font-size: 12px; color: gray;">${new Date(msg.created_at).toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' })}</span>
                    </div>
                `;
                chatWindow.innerHTML += messageHTML;
            });

            // Scroll to the bottom of the chat window
            chatWindow.scrollTop = chatWindow.scrollHeight;
        } catch (error) {
            console.error('Error fetching messages:', error);
        }
    }

        // Send a message
        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (message === '') return;

            try {
                // Get CSRF token from meta tag
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const response = await fetch(sendUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken, // Include CSRF token in the headers
                    },
                    body: JSON.stringify({
                        message: message,
                    }),
                });

                const result = await response.json();

                if (result.success) {
                    messageInput.value = '';
                    fetchMessages(); // Refresh messages
                } else {
                    alert('Failed to send message.');
                }
            } catch (error) {
                console.error('Error sending message:', error);
            }
        });

        setInterval(fetchMessages, 3000);

        // Load messages on page load
        document.addEventListener('DOMContentLoaded', fetchMessages);
    </script>

            <!-- JavaScript to handle dummy send functionality -->
            <!-- <script>
                document.getElementById('chatForm').addEventListener('submit', function (e) {
                    e.preventDefault();
                    const messageInput = document.getElementById('messageInput');
                    const messageText = messageInput.value;

                    if (messageText.trim() !== '') {
                        // Add the new message to the chat window
                        const chatWindow = document.querySelector('.chat-window');
                        const messageHTML = `
                            <div class="message receiver" style="text-align: right;">
                                <div class="bubble" style="background-color: #f1f1f1; color: black; padding: 10px; border-radius: 10px; margin-bottom: 10px; width: fit-content; max-width: 70%; text-align: left;">
                                    ${messageText}
                                </div>
                                <span style="font-size: 12px; color: gray;">Now</span>
                            </div>
                        `;
                        chatWindow.innerHTML += messageHTML;

                        // Clear the input field
                        messageInput.value = '';

                        // Scroll to the bottom of the chat window
                        chatWindow.scrollTop = chatWindow.scrollHeight;
                    }
                });
            </script> -->

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endsection