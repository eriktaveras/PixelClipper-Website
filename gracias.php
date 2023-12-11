<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - PixelClipper</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: 'Montserrat', sans-serif;
        }
        .counter {
            font-size: 2rem;
            color: #333;
        }
        .fade-in {
            animation: fadeIn 2s;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen">
    <div class="text-center fade-in">
        <h1 class="text-4xl font-bold mb-4">Thank You for Your Message!</h1>
        <p class="mb-4">We have received your inquiry and will respond to you soon.</p>
        <p>You will be redirected to the homepage in <span id="counter" class="counter">10</span> seconds.</p>
        <div class="mt-8">
            <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Return Now</a>
        </div>
    </div>

    <script>
        let timeLeft = 10;
        const countdownElement = document.getElementById('counter');

        const countdown = () => {
            if (timeLeft == 0) {
                clearTimeout(timer);
                window.location.href = 'index.php';
            } else {
                countdownElement.innerHTML = timeLeft;
                timeLeft--;
            }
        }

        let timer = setInterval(countdown, 1000);
    </script>
</body>
</html>
