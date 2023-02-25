<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: "Trebuchet MS", "Lucida Sans Unicode", "Lucida Grande", "Lucida Sans", Arial, sans-serif;
            font-size: 14px;
            min-height: 100vh;
            line-height: 1.42857143;
            color: #333;
            /* background-color: #0F1F52; */
            background: linear-gradient(144deg, rgba(48,86,211,1) 0%, rgba(15,31,82,1) 100%, rgba(15,31,82,1) 100%);
            justify-items: center;
            align-items: center;
            display: grid;
        }

        .container {
            width: 70%;
            min-height: 70vh;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin: 0 auto;
        }

        .separator {
            width: 100%;
            height: 10px;
            background-color: #1f3272;
            margin: 10px 0;
        }

        .content {
            padding: 20px 50px;
        }

        .header {
            width: 100%;
            height: 200px;
            padding-top: 20px;
            border-radius: 10px 10px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .heading {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            color: #3056d3;

        }
        
    </style>
</head>

<body>
    <div class="container">

        <div class="header">
            <img src="{{ asset('images/logo/logo.png') }}" alt="Edu-Hunt" width="300px">
        </div>

        <div class="separator"></div>
        <div class="content">

            <p>
                <div class="heading">
                    <strong>Dear {{ $name }},</strong> <br>
                </div>

                Thank you for registering with Edu-Hunt, your one-stop destination for finding the best tutorial services in your area. We are confident that our platform will help you achieve your academic goals, and we are committed to making your learning experience enjoyable and rewarding! We're excited to have you join our community of learners. <br> <br>

                As a registered user, you now have access to a wide range of courses and tutorials in your area. You can search for courses, book your favorite ones, and attend the sessions from the comfort of your home. <br> <br>

                If you have any questions or concerns, feel free to reach out to our customer support team. We're here to help you every step of the way.<br> <br>


                Thank you for choosing Edu-Hunt. We look forward to serving you. <br> <br>

                Best regards, <br>
                Edu-Hunt Team <br>
            </p>
        </div>
    </div>





</body>

</html>