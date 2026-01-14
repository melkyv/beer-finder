# Beer Finder

This is a Laravel application that helps users find beers. It includes an AI-powered chat that uses RAG (Retrieval-Augmented Generation) to recommend the best beers to the user based on their prompts.

## Technologies Used

*   **Backend:**
    *   PHP 8.4
    *   Laravel 12
*   **Frontend:**
    *   Livewire 3
    *   Volt 1
    *   Tailwind CSS 4
    *   Flux UI
*   **Database:**
    *   PostgreSQL (for vector search)
*   **Storage & Queue:**
    *   Amazon S3 (Used for storing and serving uploaded images (e.g., beer and stores images))
    *   Amazon SQS (Used for asynchronous job processing)
*   **Testing:**
    *   Pest
*   **AI:**
    *   Prism (with Gemini as the provider)
    *   RAG for beer recommendations
*   **Development Environment:**
    *   Laravel Boost (as MCP - Model-driven, Coded, and Prompted)
    *   Configured with Gemini CLI

## Features

*   **Beer and Store Management:** Users can save and manage information about beers and stores.
*   **AI Chat:** A chat interface that uses AI to provide beer recommendations. The AI uses a RAG model to retrieve relevant information about beers and generate personalized recommendations.
*   **Vector Search:** The application uses vector search with PostgreSQL to find the most relevant beers based on the user's input.
*   **Authentication:** The application uses Laravel Fortify for authentication.