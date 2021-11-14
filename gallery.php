<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Document</title>

</head>
<body>
    <?php include('menu.php'); ?>
    <h1>your courses</h1>

			<div class="top-slider">
<div class="slider">
      <div class="slide">
        <img src="https://img.traveltriangle.com/blog/wp-content/uploads/2018/10/Bali-FAQ.jpg"> 
    
</div>
<div class="slide-button left">
  <!-- <i class="fas fa-arrow-left"></i> -->
  <
</div>
<div class="slide-button right">
  <!-- <i class="fas fa-arrow-right"></i> -->
  >
</div>

</div>

<script>
		var slider = document.getElementsByClassName('slider')[0];
		var slides = document.getElementsByClassName('slide');
		let currentSlide = 0;
function slideElement() {
	currentSlide++;
	if(currentSlide >= slides.length)
		currentSlide = 0;
	slider.style.left = -currentSlide*100 + "%";
}
	setInterval(slideElement, 3000);
	</script>
</body>
</html>