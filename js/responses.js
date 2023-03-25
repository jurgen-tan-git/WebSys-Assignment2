function getBotResponse(input) {
    if (input == "I am not sure what you can do") {
        return "These are a few things you can ask:\n\
                <br> what can you do (1)\n\
                <br> where is bank of SIT (2)\n\
                <br> Customer service (3)";
    }
        
    if (input == "what can you do"  || input == "1") {
        return "I am a SIT chatbot, here to answer your question.";
    } else if (input == "where is bank of SIT" || input == "where is bank of sit" || input == "2") {
        return "Bank of SIT is located at NYP";
    } else if (input == "Customer service" || input == "3"){
        return "Please send in your enquiry via the contact us form\n\
                <br> or call this number.";
    }

    // Simple responses
    if (input == "hello" || input == "hi") {
        return "Hello there! Welcome to Bank of SIT";
    } else if (input == "goodbye" || input == "bye") {
        return "Talk to you later!";
    } else {
        return "Try asking something else!";
    }
}