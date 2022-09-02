 <!DOCTYPE html>
<html>
<head>
	<title>Developer Freelance Platform</title>
	<link href="{{asset('style.css')}}" rel="stylesheet"; type="text/css">
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
	<!---navigator bar---->
     <section id="nav-bar">
     	<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#"> <img src="{{asset('assets/indeximages/logo.svg')}}"> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item  ">
        <a class="nav-link" href="#top">HOME </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/aboutus">ABOUT US</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#services">SERVICES</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="#contact">CONTACT</a>
      </li>
    </ul>
  </div>
  <div class="nav-bar-right">
        <a href="/userRegister" class="btn btn-primary">JOIN US</a>
      </div>

</nav>
     </section>
     <!-----Slider----->
     <div id="slider">
     	<div id="headerSlider" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#headerSlider" data-slide-to="0" class="active"></li>
    <li data-target="#headerSlider" data-slide-to="1"></li>
    <li data-target="#headerSlider" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block img-fluid"  src =  "{{asset('assets/indeximages/slide1.jpg')}}" >
      <div class="carousel-caption">
    	<h5> Developers Freelance Platform</h5>
      <h4>Forget the old rules. You can have the best people.
        Right now... Right here.</h4>
      <div class="button">
  <a href="F:\FinalYearProject\DFP\UserRegistration\UserRegistrationForm.html" class="btn btn-primary">Hire Talent</a>
  <a href="F:\FinalYearProject\DFP\UserRegistration\UserRegistrationForm.html" class="btn btn-primary">Find Work  </a>

</div>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="{{asset('assets/indeximages/slide2.png')}}">
      <div class="carousel-caption">
    	<h5>Work in a Team to Invent an Innovative Project</h5>
      <a href="F:\FinalYearProject\DFP\UserRegistration\UserRegistrationForm.html" class="btn btn-primary">Sign Up Now</a>
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="{{asset('assets/indeximages/slide3.png')}}">
      <div class="carousel-caption">
    	<h5>Boost you skills with best experts</h5>
      <a href="F:\FinalYearProject\DFP\UserRegistration\UserRegistrationForm.html" class="btn btn-primary">Get The Oppurtunity</a>
    </div>
    </div>

  </div>
  <a class="carousel-control-prev" href="#headerSlider" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#headerSlider" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
     </div>
     <!----About us---->
     <section id= "about">
     	<div class="container">
     		<div class="row">
     		<div class="col-md-6">
      <h2>About Us</h2>
     <div class="about-content">
       This Platform makes easy for Developers to connect with each other and work on projects together through our collaboration feature
       This would be a Fantastic way to level up and this is also an easy for begnniers to get work.
       <a href="F:\FinalYearProject\DFP\AboutUs\index.html" class="btn btn-primary">Read More>></a>
      </div>
     		</div>
     		</div>
     	</div>
     </section>
          	<!----Services---->
     <section id="services">
     	<div class="container">
     		<h1>Our Services</h1>
     		<div class="row services">
     	      <div class="col-md-3 text-center">
     	      <div class="icon">
     	      <i class="fa fa-desktop" ></i>
     		 </div>
             <h3>Find Talent</h3>
              <p>We can make you  the website exactly the way you want. We Design and build your own high-quality websites. </p>
     			</div>
     			<div class="col-md-3 text-center">
     	      <div class="icon">
     	      <i class="fa fa-tablet" ></i>
     		 </div>
             <h3>Job Posting</h3>
              <p>Browse jobs posted on this Platform, or jump right in and create a free profile to find the work that you love to do. </p>
     			</div>
              <div class="col-md-3 text-center">
     	      <div class="icon">
     	      <i class="fa fa-line-chart" ></i>
     		 </div>
             <h3>Collaboration</h3>
              <p>We can make you  the website exactly the way you want. We Design and build your own high-quality websites. </p>
     			</div>
              <div class="col-md-3 text-center">
     	      <div class="icon">
     	      <i class="fa fa-paint-brush" ></i>
     		 </div>
             <h3>Work</h3>
              <p>We can make you  the website exactly the way you want. We Design and build your own high-quality websites. </p>
    </div>
    </div>
 		 </div>
  </section>

<!-------Get in Touch---->
 <section id="contact">
 	<div class="container">
 <h1>Get In Touch</h1>
 <div class="row">
  <div class="col-md-6">
  	<form class="contact-form">
  <div class="form-group">
 <input type="text" class="form-control" placeholder="Your Name">
 </div>
 <div class="form-group">
 <input type="number" class="form-control" placeholder="Phone No.">
 </div>
 <div class="form-group">
 <input type="email" class="form-control" placeholder="Email Adress ">
 </div>
 <div class="form-group">
 <textarea class="form-control"  row="4" placeholder="Your Message "></textarea>
 </div>
 <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
  </form>
 </div>
  <div class="col-md-6 contact-info">
 <div class="follow"><b>Address:</b> <i class="fa fa-map-marker"></i>XYZ Road,Lahore,IN</div>
 <div class="follow"><b>Phone:</b> <i class="fa fa-phone"></i>+92 1234567</div>
 <div class="follow"><b>Email:</b> <i class="fa fa-envelope-o "></i>example@gmail.com</div>
 <div class="follow"><label></label><b>Get Social:</b>
  <a href="#"><i class="fa fa-facebook"></i></a>
  <a href="#"><i class="fa fa-youtube-play"></i></a>
  <a href="#"><i class="fa fa-twitter"></i></a>
  <a href="#"><i class="fa fa-google-plus"></i></a>
  </div>
   </div>
 </div>
 	</div>
 </section>
 <!-----Footer----->
 <section id="footer">
   <div class="container text-center" >
     <p>Made with <i class="fa fa-heart-o"></i>by Zoya & Maneeha </p>
   </div>
 </section>
 <script src="smooth-scroll.js"></script>
 <script>
  var scroll = new SmoothScroll('a[href*="#"]');
</script>
</body>
</html>
