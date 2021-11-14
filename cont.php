<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>Responsive Contact Us Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
<section class="contact">
<div class="content">
<h2>Contact Us</h2>
<p>LMS</p>
</div>
<div class="container">
<div class="contactInfo">
<div class="box">
<div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i>
</div>
<div class="text">
<h3>Address</h3>
<p>Cairo,Egypt</p>
</div>
</div>
<div class="box">
<div class="icon"><i class="fa fa-phone" aria-hidden="true"></i>
</div>
<div class="text">
<h3>phone</h3>
<p>01111111</p>
</div>
</div>
<div class="box">
<div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i>
</div>
<div class="text">
<h3>Email</h3>
<p>LMs@gmail.com</p>
</div>
</div>
</div>
<div class="contactForm">
<form action="index.php" method="post">
<h2>Send Message</h2>
<div class="inputBox">
<input type="text" name="Fullname" required="required">
<span>Full Name</span>
</div>
<div class="inputBox">
<input type="text" name="email" required="required">
<span>Email</span>
</div>
<div class="inputBox">
<textarea name="message" required="required"></textarea>
<span>Type your message.....</span>
</div>
<div class="inputBox">
<input type="submit" name="send"   value="Send">

</div>
</form>
</div>
</div>
</section>
</body>
</html>