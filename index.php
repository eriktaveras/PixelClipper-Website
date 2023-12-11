<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $mensaje = $_POST['message'];

    $destinatario = "tuemail@example.com"; // Cambia esto por tu dirección de correo
    $asunto = "Nuevo mensaje de $nombre";

    $cuerpo = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje";

    // Para enviar un correo HTML, el encabezado Content-type debe establecerse
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/plain; charset=utf-8' . "\r\n";
    $cabeceras .= "De: $email";

    mail($destinatario, $asunto, $cuerpo, $cabeceras);

    // Redireccionar después de enviar el correo
    header('Location: gracias.php'); // Cambia esto por tu página de agradecimiento
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PixelClipper - Leading the way in professional photo editing with cutting-edge Clipping Path services. Discover our portfolio and start your free trial today.">

    <title>PixelClipper - Professional Photo Editing</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link 
  rel="stylesheet" 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- TwentyTwenty CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/css/twentytwenty.min.css" />

<!-- TwentyTwenty JS and its dependency, Event Move JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.event.move/2.0.0/jquery.event.move.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.twentytwenty.min.js"></script>
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>




</head>
<style>
    html {
        scroll-behavior: smooth;
    }
    #parallaxBackground {
        background-attachment: fixed;
    }

    /* Estilos para el menú móvil */
    #mobile-menu {
        transition: transform 0.3s ease-in-out;
        transform: translateY(-100%); /* Inicia oculto, fuera de la pantalla */
        display: flex; /* Asegúrate de que sea flex para alinear los ítems */
        flex-direction: column; /* Ítems en columna para el menú móvil */
        justify-content: center; /* Centra los ítems verticalmente */
        align-items: center; /* Centra los ítems horizontalmente */
        background-color: rgba(17, 24, 39, 0.95); /* Fondo semi-transparente */
        width: 100%; /* Ocupa todo el ancho */
        height: 100vh; /* Ocupa toda la altura de la pantalla */
        position: fixed; /* Posición fija para sobreponerse al contenido */
        top: 0; /* Arriba del todo */
        left: 0; /* Izquierda del todo */
        z-index: 50; /* Asegúrate de que esté por encima de otros elementos */
    }
    #mobile-menu:not(.hidden) {
        transform: translateY(0); /* Se muestra cuando no tiene la clase 'hidden' */
    }

    /* Ocultar el menú en pantallas grandes */
    @media (min-width: 768px) {
        #mobile-menu {
            display: none !important; /* Importante para sobrescribir cualquier otra regla */
        }
    }

    .compare-container {
    position: relative;
    width: 100%;
    overflow: hidden;
}

.compare-container img {
    display: block;
    width: 100%;
}

.img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 50%;
    overflow: hidden;
}

.slider {
    position: absolute;
    z-index: 9;
    cursor: ew-resize;
    width: 10px;
    height: 100%;
    background-color: #2196F3;
    left: 50%;
}

</style>

<body class="bg-gray-800 text-white font-montserrat">

<!-- Navbar/Header -->
<nav class="bg-gray-900 p-4 sticky top-0 z-50 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <a href="#" class="flex items-center">
            <img src="https://pixelclipper.s3.amazonaws.com/img/logo.png" alt="PixelClipper Logo" class="h-8 mr-3">
            <span class="text-xl font-semibold text-white"></span>
        </a>

        <!-- Navigation Links -->
        <div class="hidden md:flex items-center space-x-4">
            <a href="#services" class="text-white hover:text-gray-300 transition duration-300">Services</a>
            <a href="#pricing" class="text-white hover:text-gray-300 transition duration-300">Pricing</a>
            <a href="#portfolio" class="text-white hover:text-gray-300 transition duration-300">Portfolio</a>
            <a href="#faq" class="text-white hover:text-gray-300 transition duration-300">FAQ</a>
            <a href="#contact" class="text-white hover:text-gray-300 transition duration-300">Contact</a>

        </div>

<!-- Botón del Menú Móvil -->
<button id="mobile-menu-button" class="md:hidden text-white focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
</button>

<!-- Menú Móvil (Oculto por defecto) -->
<div id="mobile-menu" class="fixed inset-0 bg-gray-900 bg-opacity-95 hidden flex flex-col justify-center items-center">
    <a href="#services" class="text-white text-lg py-2">Services</a>
    <a href="#pricing" class="text-white text-lg py-2">Pricing</a>
    <a href="#portfolio" class="text-white text-lg py-2">Portfolio</a>
    <a href="#faq" class="text-white text-lg py-2">FAQ</a>
    <a href="#contact" class="text-white text-lg py-2">Contact</a>
    <!-- Botón para cerrar el menú móvil -->
    <button id="close-mobile-menu" class="absolute top-0 right-0 mt-4 mr-4">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
    </button>
</div>

</nav>



<header class="min-h-screen flex items-center justify-center relative overflow-hidden text-white bg-gray-900">
    <!-- Fondo con efecto de partículas mejorado (asumiendo JavaScript para animaciones) -->
    <div id="particles-js" class="absolute inset-0"></div>

    <div class="container mx-auto text-center relative z-10">
        <!-- Título Mejorado para Mayor Impacto Visual -->
        <h1 class="text-6xl md:text-8xl font-extrabold mb-6 leading-tight tracking-tighter" data-aos="fade-down">
            Simple, <span class="text-blue-500">Transparent</span>, <span class="text-blue-700">Professional</span>
        </h1>

        <!-- Subtítulo Mejorado para Mayor Claridad y Enganche -->
        <p class="text-xl md:text-3xl text-gray-300 mb-8" data-aos="fade-up" data-aos-delay="300">
            Redefining the art of photo editing. <br class="hidden md:inline">Efficient, precise, and tailored to your needs.
        </p>

        <!-- Botón de Llamada a la Acción (CTA) Más Atractivo y Visible -->
        <a href="#trial" class="inline-block bg-blue-600 hover:bg-blue-800 text-white font-semibold px-10 py-5 rounded-lg shadow-xl transform hover:-translate-y-2 transition duration-300 ease-in-out" data-aos="zoom-in" data-aos-delay="500">
            Start Your Free Trial
        </a>
    </div>
</header>



<section id="services" class="min-h-screen flex items-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">
    <div class="container mx-auto px-6 py-12 text-white">
        <h2 class="text-6xl font-extrabold mb-8 text-center" data-aos="zoom-in">Our Cutting-Edge Services</h2>
        <p class="text-2xl text-center mb-10" data-aos="zoom-in" data-aos-delay="100">Elevate your visuals with our advanced photo editing solutions.</p>
    
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">

<!-- Service 1 - Clipping Path -->
<div class="bg-white rounded-xl shadow-2xl p-8 text-gray-800 transform hover:scale-105 transition duration-500" data-aos="fade-up" data-aos-delay="200">
    <div class="flex items-center justify-center h-24 w-24 mb-4 mx-auto rounded-full bg-indigo-500 text-white">
        <i class="fas fa-vector-square fa-4x"></i>
    </div>
    <h3 class="text-2xl font-semibold mb-4">Clipping Path</h3>
    <p>Our precision editing service enhances your images by capturing every detail, perfect for e-commerce and product showcases.</p>
    <!-- Imagen ilustrativa del servicio -->
    <div class="mt-4">
        <img src="https://pixelclipper.s3.amazonaws.com/images/after_None_20231101190923.jpg" alt="Clipping Path Example" class="rounded-lg shadow-md">
    </div>
</div>


<!-- Service 2 - Image Masking -->
<div class="bg-white rounded-xl shadow-2xl p-8 text-gray-800 transform hover:scale-105 transition duration-500" data-aos="fade-up" data-aos-delay="300">
    <div class="flex items-center justify-center h-24 w-24 mb-4 mx-auto rounded-full bg-purple-500 text-white">
        <i class="fas fa-mask fa-4x"></i>
    </div>
    <h3 class="text-2xl font-semibold mb-4">Image Masking</h3>
    <p>Perfect for complex edits, our Image Masking service ensures every detail is handled with precision, making intricate designs appear effortless and professionally finished.</p>
    <!-- Imagen ilustrativa del servicio de Image Masking -->
    <div class="mt-4">
        <img src="https://pixelclipper.s3.amazonaws.com/images/after_None_20231101190923.jpg" alt="Image Masking Example" class="rounded-lg shadow-md">
    </div>
</div>


<!-- Service 3 - Photo Retouching -->
<div class="bg-white rounded-xl shadow-2xl p-8 text-gray-800 transform hover:scale-105 transition duration-500" data-aos="fade-up" data-aos-delay="400">
    <div class="flex items-center justify-center h-24 w-24 mb-4 mx-auto rounded-full bg-pink-500 text-white">
        <i class="fas fa-paint-brush fa-4x"></i>
    </div>
    <h3 class="text-2xl font-semibold mb-4">Photo Retouching</h3>
    <p>Revitalize your images with our advanced photo retouching service. We enhance the beauty and essence of your photographs, delivering impeccable and vibrant results that speak for themselves.</p>
    <!-- Imagen ilustrativa del servicio de Photo Retouching -->
    <div class="mt-4">
        <img src="https://pixelclipper.s3.amazonaws.com/images/after_None_20231101190923.jpg" alt="Photo Retouching Example" class="rounded-lg shadow-md">
    </div>
</div>


        </div>
    </div>
</section>

<!-- Pricing Section - Enhanced Design with Modern Colors -->
<section id="pricing" class="flex items-center justify-center min-h-screen text-gray-900" style="background: linear-gradient(to right, #8EC5FC 0%, #E0C3FC 100%);">
    <div class="container mx-auto text-center" data-aos="fade-up">
        <h2 class="text-6xl font-extrabold mb-10" style="font-family: 'Poppins', sans-serif; color: #333;">Exclusive Photo Editing Pricing</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 px-4 py-6">

            <div class="bg-white rounded-xl shadow-2xl p-8" data-aos="fade-right" data-aos-delay="100">
                <i class="fas fa-cut text-5xl mb-4 text-indigo-600"></i>
                <h3 class="text-4xl font-semibold mb-4" style="font-family: 'Poppins', sans-serif;">Clipping Path</h3>
                <p class="mb-4 text-lg">Precision cutting for every image.</p>
                <ul class="list-inside">
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-circle text-indigo-300"></i>
                        <span class="text-lg font-semibold">Simple:</span>
                        <span class="text-xl">$0.29/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-adjust text-indigo-400"></i>
                        <span class="text-lg font-semibold">Medium:</span>
                        <span class="text-xl">$1.49/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-star text-indigo-600"></i>
                        <span class="text-lg font-semibold">Complex:</span>
                        <span class="text-xl">$7/photo</span>
                    </li>
                </ul>
            </div>
            
            
            <div class="bg-white rounded-xl shadow-2xl p-8" data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-brush text-5xl mb-4 text-green-600"></i>
                <h3 class="text-4xl font-semibold mb-4" style="font-family: 'Poppins', sans-serif;">Photo Retouching</h3>
                <p class="mb-4 text-lg">Enhancing your photos to perfection.</p>
                <ul class="list-inside">
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-circle text-green-300"></i>
                        <span class="text-lg font-semibold">Basic:</span>
                        <span class="text-xl">$0.60/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">  
                        <i class="fas fa-adjust text-green-400"></i>
                        <span class="text-lg font-semibold">Advanced:</span>
                        <span class="text-xl">$1.99/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-star text-green-600"></i>
                        <span class="text-lg font-semibold">Premium:</span>
                        <span class="text-xl">$3.99/photo</span>
                    </li>
                </ul>
            </div>
            

            <div class="bg-white rounded-xl shadow-2xl p-8" data-aos="fade-left" data-aos-delay="300">
                <i class="fas fa-palette text-5xl mb-4 text-pink-600"></i>
                <h3 class="text-4xl font-semibold mb-4" style="font-family: 'Poppins', sans-serif;">Color Correction</h3>
                <p class="mb-4 text-lg">Vivid colors for impactful images.</p>
                <ul class="list-inside">
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-circle text-pink-300"></i>
                        <span class="text-lg font-semibold">Basic:</span>
                        <span class="text-xl">$0.99/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-adjust text-pink-400"></i>
                        <span class="text-lg font-semibold">Advanced:</span>
                        <span class="text-xl">$1.99/photo</span>
                    </li>
                    <li class="mb-2 hover:scale-105 transition-transform">
                        <i class="fas fa-star text-pink-600"></i>
                        <span class="text-lg font-semibold">Premium:</span>
                        <span class="text-xl">$2.50/photo</span>
                    </li>
                </ul>
            </div>
            

        </div>
        <div class="text-center mt-10">
            <a href="#contact" class="inline-block bg-gradient-to-r from-purple-600 to-blue-500 text-white font-bold py-3 px-8 rounded-full text-lg hover:from-purple-700 hover:to-blue-600 transition duration-300 shadow-lg">
                Start Your Free Trial
            </a>
            <p class="text-gray-500 mt-4">Not sure yet? Try our services free for 30 days and see the difference!</p>
        </div>
        
    </div>
</section>

<section id="portfolio" class="min-h-screen pt-[68px] bg-gradient-to-r from-gray-900 to-gray-800">
    <div class="container mx-auto px-6 py-12 text-center flex flex-col justify-center h-full">
        <h2 class="text-5xl font-bold text-white mb-8">Our Clipping Path Showcase</h2>
        <p class="text-gray-400 mb-12">Explore the transformation through our advanced Clipping Path technique.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Repite esta estructura para cada conjunto de imágenes -->
            <div class="group cursor-pointer">
                <div class="twentytwenty-container overflow-hidden">
                    <img src="https://pixelclipper.s3.amazonaws.com/images/before_None_20231101192302.jpg" alt="Before editing - Example of unedited image">
                    <img src="https://pixelclipper.s3.amazonaws.com/images/after_None_20231101192302.jpg" alt="After editing - Enhanced image with Clipping Path technique">
                                </div>
            </div>
            <!-- Más elementos... -->
        </div>
    </div>
</section>




<section id="faq" class="bg-gray-900 min-h-screen flex items-center">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-white mb-8 text-center">Frequently Asked Questions</h2>
        <div class="divide-y divide-gray-700">
            <!-- FAQ Item 1 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">Do you offer bulk discounts?</h3>
                <p class="text-gray-300">Special discounts are available for bulk orders. Contact us for details.</p>
            </div>

            <!-- FAQ Item 2 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">How secure is my data with PixelClipper?</h3>
                <p class="text-gray-300">Your data is secure on encrypted servers and accessed only by your project team.</p>
            </div>

            <!-- FAQ Item 3 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">What is the typical turnaround time?</h3>
                <p class="text-gray-300">Turnaround varies, but most projects are delivered within 24-48 hours. Rush service available.</p>
            </div>

            <!-- FAQ Item 4 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">Do you provide revisions?</h3>
                <p class="text-gray-300">Yes, we offer free revisions until you are completely satisfied.</p>
            </div>

            <!-- FAQ Item 5 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">Can I get a sample edit before making a larger order?</h3>
                <p class="text-gray-300">Certainly! Contact us to arrange for a sample edit.</p>
            </div>

            <!-- FAQ Item 6 -->
            <div class="py-4">
                <h3 class="text-xl text-white font-semibold mb-2">What types of file formats do you accept for image editing?</h3>
                <p class="text-gray-300">We accept JPG, PNG, TIFF, PSD, and more. Reach out for specific format requests.</p>
            </div>
        </div>
    </div>
</section>
<section id="contact" class="bg-gray-50 text-gray-800">
    <div class="container mx-auto flex flex-wrap items-center px-4 py-12">
        <!-- Left Column: Information and Offer -->
        <div class="w-full lg:w-1/2 px-4 mb-6">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6">Try Our Image Editing Services for Free</h2>
            <p class="text-lg mb-4">We're confident in the quality of our work. Try our services with up to 10 images, absolutely free.</p>
            <ul class="list-disc list-inside mb-6 text-base">
                <li>Fill out the form with your details.</li>
                <li>Select the 'Free Trial' option.</li>
                <li>Upload up to 10 images for editing.</li>
                <li>Our team will work on your images and send them back to you.</li>
            </ul>
            <p class="text-lg">No payment required for the trial, and you're under no obligation to continue after receiving your edited images.</p>
        </div>

        <!-- Right Column: Contact Form -->
        <div class="w-full lg:w-1/2 px-4">
            <form action="index.php" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow">
                <!-- Name Field -->
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-lg font-medium">Your Name:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" required class="w-full p-4 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                </div>

                <!-- Email Field -->
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-lg font-medium">Your Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" required class="w-full p-4 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition duration-300">
                </div>

                <!-- Message Field -->
                <div class="mb-6">
                    <label for="message" class="block mb-2 text-lg font-medium">Your Message or Project Details:</label>
                    <textarea id="message" name="message" placeholder="Details about your project" class="w-full p-4 rounded border border-gray-300 focus:ring-blue-500 focus:border-blue-500 transition duration-300" rows="4"></textarea>
                </div>

                <!-- Checkbox for Free Trial -->
                <div class="flex items-center mb-6">
                    <input type="checkbox" id="freeTrial" name="freeTrial" class="mr-2">
                    <label for="freeTrial" class="text-lg">I want a free trial of up to 10 images.</label>
                </div>

                <!-- File Upload Field -->
                <div class="mb-6">
                    <label for="imageUpload" class="block mb-2 text-lg font-medium">Upload Your Images (up to 10):</label>
                    <input type="file" id="imageUpload" name="imageUpload[]" multiple class="w-full p-2 rounded border border-gray-300">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded transition duration-300">Start Free Trial</button>
            </form>
        </div>
    </div>
</section>


<!-- Footer - Enhanced with Modern Web Design Trends -->
<footer class="bg-gradient-to-br from-gray-800 to-gray-900 py-8">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center space-y-6 md:space-y-0 text-white">
            <div>
                <img src="https://pixelclipper.s3.amazonaws.com/img/logo.png" alt="PixelClipper Logo" class="h-10">
            </div>
            <nav class="flex flex-wrap justify-center space-x-8">
                <a href="#services" class="hover:underline transition duration-300">Services</a>
                <a href="#pricing" class="hover:underline transition duration-300">Pricing</a>
                <a href="#portfolio" class="hover:underline transition duration-300">Portfolio</a>
                <a href="#contact" class="hover:underline transition duration-300">Contact</a>
            </nav>
            <div class="flex space-x-6">
                <a href="https://www.facebook.com/yourpage" aria-label="Facebook" class="transition duration-300"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/yourprofile" aria-label="Twitter" class="transition duration-300"><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/yourprofile" aria-label="Instagram" class="transition duration-300"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="mt-8">
            <p class="text-gray-400 text-center text-md">© 2023 PixelClipper. All Rights Reserved.</p>
        </div>
    </div>
</footer>


<script>
    function toggleFAQ(faqId) {
      var allFAQs = document.querySelectorAll('.faq-item');
      allFAQs.forEach(faq => {
        if(faq.id !== faqId) {
          faq.style.maxHeight = null;
        }
      });
  
      var element = document.getElementById(faqId);
      if (element.style.maxHeight){
        element.style.maxHeight = null;
      } else {
        element.style.maxHeight = element.scrollHeight + "px";
      } 
    }
  
    AOS.init();
  
    window.addEventListener('scroll', function() {
      const parallaxBackground = document.getElementById('parallaxBackground');
      let offset = window.pageYOffset;
      parallaxBackground.style.transform = 'translateY(' + offset * 0.5 + 'px)';
    });
  
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.remove('hidden');
    });
  
    document.getElementById('close-mobile-menu').addEventListener('click', function() {
      document.getElementById('mobile-menu').classList.add('hidden');
    });
  
    document.addEventListener("DOMContentLoaded", function() {
      const slider = document.querySelector('.slider');
      const imgOverlay = document.querySelector('.img-overlay');
  
      slider.addEventListener('mousedown', function() {
        this.classList.add('active');
  
        document.addEventListener('mousemove', slideMove);
        document.addEventListener('mouseup', function() {
          slider.classList.remove('active');
          document.removeEventListener('mousemove', slideMove);
        });
      });
  
      function slideMove(e) {
        let pos = e.clientX - slider.parentElement.offsetLeft;
        pos = Math.max(0, Math.min(pos, slider.parentElement.offsetWidth));
        slider.style.left = pos + "px";
        imgOverlay.style.width = pos + "px";
      }
    });
  
    $(window).on("load", function() {
      $(".twentytwenty-container").twentytwenty();
    });
  
    document.addEventListener("DOMContentLoaded", function() {
  particlesJS("particles-js", {
    particles: {
      number: {
        value: 100,
        density: {
          enable: true,
          value_area: 800
        }
      },
      color: {
        value: "#ffffff"
      },
      shape: {
        type: "circle",
        stroke: {
          width: 0,
          color: "#000000"
        },
        polygon: {
          nb_sides: 5
        },
        image: {
          src: "img/github.svg",
          width: 100,
          height: 100
        }
      },
      opacity: {
        value: 0.5,
        random: false,
        anim: {
          enable: false,
          speed: 1,
          opacity_min: 0.1,
          sync: false
        }
      },
      size: {
        value: 3,
        random: true,
        anim: {
          enable: false,
          speed: 40,
          size_min: 0.1,
          sync: false
        }
      },
      line_linked: {
        enable: true,
        distance: 150,
        color: "#ffffff",
        opacity: 0.4,
        width: 1
      },
      move: {
        enable: true,
        speed: 6,
        direction: "none",
        random: false,
        straight: false,
        out_mode: "out",
        bounce: false,
        attract: {
          enable: false,
          rotateX: 600,
          rotateY: 1200
        }
      }
    },
    interactivity: {
      detect_on: "canvas",
      events: {
        onhover: {
          enable: true,
          mode: "repulse"
        },
        onclick: {
          enable: true,
          mode: "push"
        },
        resize: true
      },
      modes: {
        grab: {
          distance: 140,
          line_linked: {
            opacity: 1
          }
        },
        bubble: {
          distance: 400,
          size: 40,
          duration: 2,
          opacity: 8,
          speed: 3
        },
        repulse: {
          distance: 200,
          duration: 0.4
        },
        push: {
          particles_nb: 4
        },
        remove: {
          particles_nb: 2
        }
      }
    },
    retina_detect: true
  });
});

  </script>
  

  
</body>
</html>
