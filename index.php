<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TND Department - Aptech SFC</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="shortcut icon" href="./images/logo1.png" type="image/x-icon">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');
    * {
      font-family: 'Poppins', sans-serif;
    }

    .main-carousel {
    height: 50vh;
    width: 100%;
}

.main-carousel .carousel-cell {
    height: 50vh;
    /* Removed quotes */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
}
  </style>
</head>
<body class="bg-gray-100 text-gray-800">

  <!-- Header -->
  <header class="bg-[#1A2942] text-white py-4 px-6 flex justify-between items-center sticky top-0 z-50 shadow-md">
    <a href="">
        <span class="logo-lg md:flex items-center justify-center">
                    <span class="text-lg font-bold flex items-center justify-center tracking-wide text-[#EAF1F3] md:text-xl lg:text-xl xl:text-xl" style="font-family: 'Lexend Giga', serif;">
                        <img class="invert w-6 md:w-4 lg:w-4 xl:w-6" src="./images/logo1.png" alt=""> 
                        <span class="ml-2">TND</span>
                    </span>
                </span>
    </a>
    <a href="./student_application_form.php" class="bg-white text-[#1A2942] px-4 py-2 text-sm font-medium rounded-lg shadow-md hover:bg-gray-200 transition duration-300">
    Write Application
    </a>

  </header>

  <!-- Slider -->
  <section class="slider">
    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
      <div class="carousel-cell" style="background-image: url('./images/slider1.jpg')"></div>
      <div class="carousel-cell" style="background-image: url('./images/slider2.jpg')"></div>
      <div class="carousel-cell" style="background-image: url('./images/slider3.jpg')"></div>
    </div>
  </section>

  <!-- Card Section -->
  <section class="card-container grid grid-cols-1 md:grid-cols-2 gap-6 px-6 py-10">
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Workshop Schedule</h3>
    <p class="text-gray-600 mt-2">Check out the upcoming workshops to enhance your skills.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Project of the Month</h3>
    <p class="text-gray-600 mt-2">Discover the most innovative project created this month.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Presentation Date</h3>
    <p class="text-gray-600 mt-2">Don't miss the next presentation. Check the schedule here.</p>
  </div>
  <div class="card bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transform hover:scale-105 transition duration-300">
    <h3 class="text-xl font-semibold text-[#1A2942]">Rules for Presentation</h3>
    <p class="text-gray-600 mt-2">Learn about the guidelines to ace your presentation.</p>
  </div>
</section>


  <!-- Contact Section -->
  <div class="bg-[#1A2942] text-white text-center py-8 px-6">
    <h2 class="text-2xl font-bold mb-4">Contact Us</h2>
    <p class="mb-2 text-gray-300">
      Want to get in touch with us? You can reach us at <u class="text-blue-400 underline">sfcprojectdepartment@gmail.com</u>
    </p>
    <p class="mb-2 text-gray-300">📍: 30-A, Progressive Center, Suite # 202-203, Main Shahra-e-Faisal, near Lal Kothi (house), Karachi, 75400</p>
    <p class="text-gray-300">📞 +92 3082709968</p>
  </div>

  <!-- Footer -->
  <footer class="bg-black text-white text-center py-4">
    <p class="text-sm">&copy; 2025 TND Dept. Designed by Asad Khan</p>
  </footer>

  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>
</html>
