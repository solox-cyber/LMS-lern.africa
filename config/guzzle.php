<?php

// config/guzzle.php
return [
    'base_uri' => env('API_BASE_URL', 'https://api.example.com'), // Replace with your API base URL
    'timeout' => 10, // Timeout in seconds for each request
    'verify' => storage_path('cacert.pem'), // Path to the SSL certificate bundle
    // Add any other custom Guzzle configuration options here as needed
];
