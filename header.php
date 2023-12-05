<header>
        <nav>
            <img src="http://desireinteriors.in/wp-content/uploads/2020/02/desire-interior-logo.png" alt="logo" class="logo">
            <!-- <ul>
                <li><a href="">Link1</a></li>
                <li><a href="">Link1</a></li>
                <li><a href="">Link1</a></li>
            </ul> -->
        </nav>
    </header>
    <section class="hero">
        <div class="slideshow-container">
          
            <div class="mySlides fade">
              <img class="hero-image" src="http://desireinteriors.in/wp-content/uploads/2022/03/7J8A4139-HDR-768x512.jpg">
              <!-- <div class="text">Caption Text</div> -->
            </div>
            
            <div class="mySlides fade">
              <img class="hero-image" src="http://desireinteriors.in/wp-content/uploads/2022/03/7J8A7821-HDR-copy-2-768x512.jpg">
              <!-- <div class="text">Caption Two</div> -->
            </div>
            
            <div class="mySlides fade">
              <img class="hero-image" src="http://desireinteriors.in/wp-content/uploads/2022/03/7J8A9174-HDR-1-1-768x512.jpg">
              <!-- <div class="text">Caption Three</div> -->
            </div>
            
        </div>
            <br>           
            <div style="text-align:center">
              <span class="dot"></span> 
              <span class="dot"></span> 
              <span class="dot"></span> 
            </div>
            <div class="mtitle"><h1>Get Your Smart<span style="color: #a2c322;"> <br>Quotation</span><br>Here 👇</h1></div>
            <script>
            let slideIndex = 0;
            showSlides();
            function showSlides() {
              let i;
              let slides = document.getElementsByClassName("mySlides");
              let dots = document.getElementsByClassName("dot");
              for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
              }
              slideIndex++;
              if (slideIndex > slides.length) {slideIndex = 1}    
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
              }
              slides[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " active";
              setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
            </script>
           
    </section>