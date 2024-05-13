function sendMessage() {
    const input = document.getElementById('messageInput');
    const message = input.value.trim();
    if (message) {
        const chatDisplay = document.getElementById('chatDisplay');
        const messageElement = document.createElement('p');
        messageElement.textContent = message;
        messageElement.className = 'message'; // Assign a class for styling
        chatDisplay.appendChild(messageElement);
        input.value = ''; // Clear input after sending
        chatDisplay.scrollTop = chatDisplay.scrollHeight; // Auto-scroll to latest message
    }
}

// Function to handle Enter key press in the message input
function handleEnterPress(event) {
    if (event.key === 'Enter') {
        sendMessage();
        event.preventDefault(); // Prevent the default action to avoid form submission
    }
}
