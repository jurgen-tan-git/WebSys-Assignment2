function getBotResponse(input) {
    //rock paper scissors
    if (input == "what can you do") {
        return "I am a SIT chatbot, here to answer your question.";
    } else if (input == "where is bank of SIT" || input == "where is bank of sit") {
        return "Bank of SIT is located at NYP";
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