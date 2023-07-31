<!DOCTYPE html>
<html>
<head>
    <title>Customer Feedback</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form-signin">
            <h2 class="form-heading">Please Provide Your Feedback</h2>
            <input type="text" class="form-control" placeholder="Your Name" required autofocus>
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
            <textarea class="form-control" rows="3" placeholder="Your feedback" required></textarea>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
