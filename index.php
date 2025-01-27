<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TND Department - Aptech SFC</title>
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="shortcut icon" href="./images/logo1.png" type="image/x-icon">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    * {
      font-family: 'Poppins', sans-serif;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .fade-in {
      animation: fadeIn 1s ease-in-out forwards;
    }

    .fade-on-scroll {
      opacity: 0; /* Initial state */
    }

    .main-carousel {
    height: 70vh;
    /* Removed quotes */
    width: 100%;
}

.main-carousel .carousel-cell {
    height: 70vh;
    /* Removed quotes */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
}

.card {
    height: 580px; /* Reduced height for cards */
  }

  .card img {
    object-fit: fill; /* Ensures the image stays at full height without distorting */
    height: 450px; /* Adjust height to keep the aspect ratio */
  }

  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-[#1A2942] text-white py-4 px-6 flex flex-col sm:flex-row justify-between items-center sticky top-0 z-50 shadow-md">
  <a href="" class="flex items-center mb-4 sm:mb-0">
    <img class="w-16 sm:w-20 fade-on-scroll" src="./images/aptech-logo.png" alt="Aptech Logo">
  </a>
  <span class="font-bold text-lg sm:text-xl text-center sm:text-left fade-on-scroll">
    Project Department - Aptech SFC
  </span>
  <a href="./student_application_form.php" class="bg-white text-[#1A2942] px-4 py-2 text-sm font-medium rounded-lg shadow-md hover:bg-gray-200 transition duration-300 fade-on-scroll mt-4 sm:mt-0">
    Write Application
  </a>
</header>


  <!-- Slider -->
  <section class="slider mt-6 fade-on-scroll">
  <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
                        <div class="carousel-cell" style="background-image: url('./images/slider1.jpg')"></div>
                        <div class="carousel-cell" style="background-image: url('./images/slider2.jpg')"></div>
                        <div class="carousel-cell" style="background-image: url('./images/slider3.jpg')"></div>
                    </div>
  </section>

  <!-- Card Section -->
<section class="card-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 mt-10 px-6 py-6 fade-on-scroll">
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="aspect-w-16 aspect-h-9">
      <img src="./images/workshop-calender.jpeg" class="w-full h-full object-cover rounded-md mb-4" alt="Workshop Schedule">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942]">Workshop Schedule</h3>
    <p class="text-gray-600 mt-2">Check out the upcoming workshops to enhance your skills.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="aspect-w-16 aspect-h-9">
      <img src="./images/project-month.jpeg" class="w-full h-full object-cover rounded-md mb-4" alt="Project of the Month">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942]">Project of the Month</h3>
    <p class="text-gray-600 mt-2">Discover the most innovative project created this month.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Presentation Date</h3>
    <p class="text-gray-600 mt-2">Don't miss the next presentation. Check the schedule here.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Rules for Presentation</h3>
    <p class="text-gray-600 mt-2">Learn about the guidelines to ace your presentation.</p>
  </div>
</section>




  <!-- About Section -->
  <section class="grid grid-cols-1 lg:grid-cols-2 items-center gap-8 px-20 py-10 fade-on-scroll">
    <div class="text-area">
      <h1 class="text-3xl md:text-4xl font-bold text-[#1A2942] mb-4">Aptech TND Department</h1>
      <p class="text-gray-600 text-base md:text-lg leading-relaxed">
      The Training and Development (TND) Department at Aptech plays a pivotal role in nurturing talent and fostering innovation. As the backbone of Aptech's educational success, the TND Department is committed to designing, developing, and delivering top-quality technical courses that align with global industry standards.
      </p>
    </div>
    <div class="img-area">
      <img src="./images/about.png" alt="About Aptech" class="w-full max-w-md mx-auto lg:max-w-full rounded-lg shadow-lg">
    </div>
  </section>

  <!-- Contact Section -->
  <div class="bg-[#1A2942] text-white text-center py-8 px-6">
    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
    <p class="mb-2 text-gray-300 fade-in">Reach us at <u class="text-blue-400 underline">sfcprojectdepartment@gmail.com</u></p>
    <p class="mb-2 text-gray-300 fade-in">📍: 30-A, Progressive Center, Suite # 202-203, Main Shahra-e-Faisal, Karachi</p>
    <p class="text-gray-300 fade-in">📞 +92 3082709968</p>
  </div>

  <!-- Footer -->
  <footer class="bg-black text-white text-center py-4">
    <p class="text-sm fade-in">&copy; 2025 TND Dept. Designed by Asad Khan</p>
  </footer>

  <!-- JavaScript -->
  <script src="https://unpkg.com/flickity@2/dist/flickity.min.js"></script> <!-- Add Flickity JS -->
  <script>
    // Intersection Observer for fade-in animations
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
        }
      });
    });

    // Select elements to observe
    document.querySelectorAll('.fade-on-scroll').forEach(el => observer.observe(el));
  </script>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

</body>
</html>
