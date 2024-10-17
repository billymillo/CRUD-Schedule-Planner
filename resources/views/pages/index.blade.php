<!doctype html>
<html lang="en">
<head>
    <title>Schedule Planner</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
        }
        .hero {
            background: linear-gradient(135deg, #ff6f61, #de6f61);
            color: white;
            padding: 80px 0;
            text-align: center;
            border-bottom: 5px solid #de6f61;
        }
        .feature {
            background-color: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        .feature:hover {
            transform: translateY(-5px);
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Welcome to Schedule Planner</h1>
            <p>Your all-in-one solution for managing your time and finances.</p>
            <a href="{{route('planner.table')}}" class="btn btn-light btn-lg">Get Started</a>
        </div>

        <!-- Description Section -->
        <div class="row mt-5">
            <div class="col-md-6">
                <div class="feature">
                    <h2>Schedule Planner</h2>
                    <p>
                        Our Schedule Planner helps you organize your daily tasks efficiently.
                        With a user-friendly interface, you can easily add, edit, and delete your tasks,
                        ensuring that you never miss an important deadline.
                    </p>
                    <a href="{{route('planner.table')}}" class="btn btn-danger">Explore Schedule Planner</a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="feature">
                    <h2>Daily Money Spend</h2>
                    <p>
                        Track your daily expenses with our Money Spend feature.
                        Get insights into your spending habits, set budgets, and
                        make informed financial decisions to improve your financial health.
                    </p>
                    <a href="{{route('spend.money')}}" class="btn btn-danger">Explore Daily Spend</a>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <footer class="footer text-center mt-5">
            <p>&copy; 2023 Schedule Planner. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
