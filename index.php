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
  height: auto; /* Allow the card height to adjust dynamically */
}

.card img {
  object-fit: cover; /* Ensure images maintain aspect ratio */
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
  <a href="./student_application_form" target="_blank" class="bg-white text-[#1A2942] px-4 py-2 text-sm font-medium rounded-lg shadow-md hover:bg-gray-200 transition duration-300 fade-on-scroll mt-4 sm:mt-0">
    Write Application
  </a>
</header>


  <!-- Slider -->
  <section class="slider fade-on-scroll">
  <div class="main-carousel" data-flickity='{ "cellAlign": "center", "contain": true, "autoPlay": 3000, "pageDots": true }'>
    <div class="carousel-cell bg-cover bg-center h-96 sm:h-80 md:h-72 lg:h-96 xl:h-112" style="background-image: url('./images/slider1.jpg');"></div>
    <div class="carousel-cell bg-cover bg-center h-96 sm:h-80 md:h-72 lg:h-96 xl:h-112" style="background-image: url('./images/slider2.jpg');"></div>
    <div class="carousel-cell bg-cover bg-center h-96 sm:h-80 md:h-72 lg:h-96 xl:h-112" style="background-image: url('./images/slider3.jpg');"></div>
  </div>
</section>

 <!-- Card Section -->
<section class="card-container grid grid-cols-1 sm:grid-cols-2 gap-6 mt-10 px-6 py-6 fade-on-scroll">
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="w-full h-64">
      <img src="./images/workshop-calender.jpeg" class="w-full h-full object-cover rounded-md" alt="Workshop Schedule">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942] mt-4">Workshop Schedule</h3>
    <p class="text-gray-600 mt-2">Check out the upcoming workshops to enhance your skills.</p>
  </div>

  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="w-full h-64">
      <img src="./images/project-month.jpeg" class="w-full h-full object-cover rounded-md" alt="Project of the Month">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942] mt-4">Project of the Month</h3>
    <p class="text-gray-600 mt-2">Discover the most innovative project created this month.</p>
  </div>

  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="w-full h-64">
      <img src="./images/convocation.jpg" class="w-full h-full object-cover rounded-md" alt="Convocation">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942] mt-4">Convocation</h3>
    <p class="text-gray-600 mt-2">Convocation is a ceremonial event held by educational institutions to celebrate students' achievements.</p>
  </div>

  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-2xl transform hover:scale-105 transition duration-300">
    <div class="w-full h-64">
      <img src="./images/technology-camp.jpg" class="w-full h-full object-cover rounded-md" alt="Technology Camp">
    </div>
    <h3 class="text-xl font-semibold text-[#1A2942] mt-4">Technology Camp</h3>
    <p class="text-gray-600 mt-2">A technology camp provides hands-on learning in various fields of technology.</p>
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
<div class="bg-[#1A2942] text-white text-center py-12 px-6">
  <h2 class="text-3xl font-bold mb-6">Contact Us</h2>
  <p class="mb-3 text-gray-300 fade-in">
    📧 <a href="mailto:sfcprojectdepartment@gmail.com" class="text-blue-400 underline hover:text-blue-300 transition">
      sfcprojectdepartment@gmail.com
    </a>
  </p>
  <p class="mb-3 text-gray-300 fade-in">
    📍 30-A, Progressive Center, Suite # 202-203, Main Shahra-e-Faisal, Karachi
  </p>
  <p class="text-gray-300 fade-in">
    📞 <a href="tel:+923082709968" class="hover:text-gray-400 transition">+92 308 2709968</a>
  </p>
</div>

<!-- Footer -->
<footer class="bg-black text-white text-center py-5">
  <p class="text-sm fade-in">
    &copy; 2025 <span class="font-semibold">TND Dept.</span> | Designed by <span class="font-semibold">Asad Khan</span>
  </p>
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
