function getBotResponse(input) {
    //rock paper scissors
    if (input == "what can you do"  || input == "2") {
        return "I am a SIT chatbot, here to answer your question.";
    } else if (input == "where is bank of SIT" || input == "where is bank of sit" || input == "1") {
        return "Bank of SIT is located at NYP";
    } else if (input == "I am not sure what you can do") {
        return "These are a few things you can ask:\n\
                <br> what can you do (1)\n\
                <br> where is bank of SIT (2)";
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