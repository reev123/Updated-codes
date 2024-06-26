

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Simple Website Design</title>
</head>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Karla', sans-serif;
}
body{
  color: #fff;
}
.container{
  width: 100%;
  height: 100vh;
  background-image: url(canva.png);
  background-position: center;
  background-size: cover;
  padding-top: 35px;
  padding-left: 8%;
  padding-right: 8%;
}
nav{
  padding: 10px 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.logo a{
  font-size: 40px;
  text-decoration: none;
}
span{
  color:rgb(0, 255, 149);
}
nav ul li{
  display: inline-block;
  list-style: none;
  margin: 10px 15px;
}
nav ul li a{
  text-decoration: none;
  transition: 0.5s;
}
nav ul li a:hover{
  color:rgb(0, 255, 149);
}
.login{
  text-decoration: none;
  margin-right: 15px;
  font-size: 18px;
}
.btn{
  background: #000;
  border-radius: 6px;
  padding: 9px 25px;
  text-decoration: none;
  transition: 0.5s;
  font-size: 18px;
}

.content{
  margin-top: 10%;
  max-width: 600px;
}
.content h2{
  font-size: 60px
}
.content p{
  margin-top: 10px;
  line-height: 25px;
}
a{
  color: #fff;
}
.link {
  margin-top: 30px;
}
.hire{
  color: #000;
  text-decoration: none;
  background: #fff;
  padding: 9px 25px;
  font-weight: bold;
  border-radius: 6px;
  transition: 0.5s;
}
.link .hire:hover{
  background: transparent;
  border: 1px solid #fff;
  color: #fff;
}

.dropdown {
            position: relative;
            display: inline-block;
            margin-right: 20px;
            /* Adjust spacing as needed */
        }

        .dropdown a {
            color: #fff;
            /* Dropdown text color */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown a:hover,
        .dropdown.show .dropdown-content a:hover {
            background-color: #555;
            /* Hover background color */
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background: transparent;
            /* Dropdown background color */
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }

        .dropdown-content a {
            color: #fff;
            /* Dropdown item text color */
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        .dropdown.show .dropdown-content {
            display: block;
        }
        .getStartedBtn {
  background-color: transparent;
  color: white;
  border: 2px solid white; /* Add border for visibility */
  padding: 12px 28px; /* Adjust padding as needed */
  font-size: 18px; /* Adjust font size as needed */
  cursor: pointer; /* Add cursor pointer on hover */
  transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Add transition for smooth hover effect */
}

.getStartedBtn:hover {
  background-color: #000;
  color: #fff;
  border-color: #000; /* Change border color on hover */
}

</style>
<body>
  <div class="container">
    <nav>
      <div class="logo">
        <a href="homepage.html">OES<span>.com</span></a>
      </div>
      <ul>
        <li><a href="homepage.html">Home</a></li>
        <li><a href="aboutus.html">About</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="result.html">Result</a></li>
      </ul>
      <div class="dropdown" id="loginDropdown">
        <a href="#" id="loginSignup">Login / Register</a>
        <div class="dropdown-content">
            <a href="login.html">Student Login</a>
            <a href="instructorlogin.html">Instructor Login</a>
        </div>
    </div>  
    </nav>
    <div class="content">
      <h2>Hello,<br>Welcome to OES</h2>
      <p> <h3>Take secure, easy online exams with us.</h3><br>
    </div>
    <div class="link">
      <button class="getStartedBtn" id="getStartedBtn">Get Started</button>
    </div>
  </div>
  <script>
    document.getElementById('loginSignup').addEventListener('click', function (event) {
        event.preventDefault();
        var dropdownContent = document.querySelector('.dropdown-content');
        dropdownContent.style.display = (dropdownContent.style.display === "none" || dropdownContent.style.display === "") ? "block" : "none";
        event.stopPropagation();
    });

    document.body.addEventListener('click', function (event) {
        var dropdownContent = document.querySelector('.dropdown-content');
        if (!event.target.closest('.dropdown') && dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
            // Function to check if the user is logged in
            function isLoggedIn() {
                return "<?php echo isset($_SESSION['username']) ? 'true' : 'false'; ?>";
            }

            // Function to handle click event on "Get Started" button
            function handleGetStartedClick() {
                if (isLoggedIn() === 'true') {
                    // User is logged in, redirect to getstarted.html
                    window.location.href = 'getstarted.html';
                } else {
                    // User is not logged in, show alert message
                    alert('Please login or register to get started');
                }
            }

            // Add click event listener to "Get Started" button
            document.getElementById('getStartedBtn').addEventListener('click', handleGetStartedClick);
        });

  </script>
</body>
</html>
