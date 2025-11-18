<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vanilla Card</title>
    <style>
        /* Basic styles to center the card for the demo */
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto,
                Helvetica, Arial, sans-serif;
            
            /* === REPLACED background-color WITH THIS === */
            /* Use a placeholder URL, replace this with your own image path/URL */
            background-image: url('https://images.unsplash.com/photo-1557683316-973673baf926');
            
            /* Ensures the image covers the entire screen */
            background-size: cover; 
            
            /* Prevents the image from repeating */
            background-repeat: no-repeat; 
            
            /* Centers the image on the page */
            background-position: center; 
            
            /* Fixes the background so it doesn't scroll with the content */
            background-attachment: fixed; 
            /* =========================================== */

            /* These styles center the card */
            display: grid;
            place-items: center;
            min-height: 100vh;
            margin: 0;
        }

        /* The card container */
        .card {
            width: 320px;
            background-color: #ffffff;
            border-radius: 12px;
            /* A subtle shadow for a "lifting" effect */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            overflow: hidden; /* Ensures the image respects the rounded corners */
            transition: all 0.3s ease;
        }

        /* A simple hover effect to lift the card */
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        /* Card image */
        .card-image {
            width: 100%;
            height: 180px;
            /* Ensures the image covers the area without stretching */
            object-fit: cover;
            display: block;
        }

        /* The content area with padding */
        .card-content {
            padding: 1.5rem;
        }

        /* Card title */
        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1a1a1a;
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        /* Card description text */
        .card-description {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.5;
            margin-bottom: 1.25rem;
        }

        /* The "call to action" button */
        .card-button {
            display: inline-block;
            background-color: #007aff;
            color: #ffffff;
            padding: 0.6rem 1.2rem;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: background-color 0.2s ease;
        }

        .card-button:hover {
            background-color: #005ecb;
            cursor: not-allowed;
        }
    </style>
</head>
<body>

    <div class="card">
        <img 
            class="card-image" 
            src="camaro.jpg" 
            alt="A placeholder image"
        >
        <div class="card-content">
            <h2 class="card-title">Chevrolet Camaro</h2>
            <p class="card-description">
                V8 GO BRRRRRRRRRRR!!!!
            </p>
            <a href="/" class="card-button">Back To Welcome Page</a>
        </div>
    </div>

</body>
</html>