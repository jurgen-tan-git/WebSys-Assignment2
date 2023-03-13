function getBotResponse(input) {
    //rock paper scissors
    if (input == "What can you do") {
        return "I am a SIT chatbot, here to answer your question.";
    } else if (input == "paper") {
        return "scissors";
    } else if (input == "scissors") {
        return "rock";
    }

    // Simple responses
    if (input == "hello") {
        return "Hello there!";
    } else if (input == "goodbye") {
        return "Talk to you later!";
    } else {
        return "Try asking something else!";
    }
}