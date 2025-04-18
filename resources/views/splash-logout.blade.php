<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log out...</title>
    <link rel="icon" type="image/x-icon" href="ccs-logo.png" />
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-color: #122c5c;
        }

        .logo {
            width: 150px;
            height: 150px;
            background-image: url('ccs-logo.png');
            background-size: contain;
            background-repeat: no-repeat;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
        }   

        .loading-text {
            font-size: 20px;
            font-weight: bold;
            color: #ffffff;
            text-align: center;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="logo"></div>
    <div class="loading-text">Thank you...</div>

    <script>
        setTimeout(function() {
            window.location.href = '/'; // Redirect to the login page after splash screen
        }, 3000); // Adjust time (3 seconds) as needed
    </script>
</body>
</html>
