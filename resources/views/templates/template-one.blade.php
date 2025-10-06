
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HealthCare+ Medical Clinic</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white">
    {{-- Header --}}
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <i class="fas fa-heartbeat text-4xl text-blue-600"></i>
                    <span class="ml-2 text-2xl font-bold text-gray-900">HealthCare+</span>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#services" class="text-gray-700 hover:text-blue-600 transition">Services</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 transition">About</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 transition">Contact</a>
                </nav>
                <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                    Book Now
                </button>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-blue-50 to-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-5xl font-bold text-gray-900 mb-6">
                        Your Health is Our Priority
                    </h1>
                    <p class="text-xl text-gray-600 mb-8">
                        Providing exceptional healthcare services with compassion and expertise. Experience world-class medical care from our team of dedicated professionals.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#contact" class="bg-blue-600 text-white px-8 py-4 rounded-lg hover:bg-blue-700 transition text-center font-semibold">
                            Schedule Appointment
                        </a>
                        <a href="#services" class="border-2 border-blue-600 text-blue-600 px-8 py-4 rounded-lg hover:bg-blue-50 transition text-center font-semibold">
                            Our Services
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=600&h=600&fit=crop" 
                         alt="Medical Team" 
                         class="rounded-2xl shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    {{-- Features Bar --}}
    <section class="bg-blue-600 py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-white">
                <div class="flex items-center justify-center space-x-4">
                    <i class="fas fa-clock text-3xl"></i>
                    <div>
                        <div class="font-bold text-lg">24/7 Available</div>
                        <div class="text-blue-100">Emergency Care</div>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <i class="fas fa-user-md text-3xl"></i>
                    <div>
                        <div class="font-bold text-lg">Expert Doctors</div>
                        <div class="text-blue-100">Certified Professionals</div>
                    </div>
                </div>
                <div class="flex items-center justify-center space-x-4">
                    <i class="fas fa-award text-3xl"></i>
                    <div>
                        <div class="font-bold text-lg">15+ Years</div>
                        <div class="text-blue-100">Of Excellence</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section id="services" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Medical Services</h2>
                <p class="text-xl text-gray-600">Comprehensive healthcare solutions for you and your family</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                @php
                $services = [
                    ['icon' => 'fa-heartbeat', 'title' => 'General Medicine', 'desc' => 'Comprehensive healthcare for your entire family with experienced physicians.'],
                    ['icon' => 'fa-shield-alt', 'title' => 'Preventive Care', 'desc' => 'Regular check-ups and screenings to keep you healthy and prevent diseases.'],
                    ['icon' => 'fa-users', 'title' => 'Specialist Care', 'desc' => 'Access to specialized medical experts for complex health conditions.'],
                    ['icon' => 'fa-ambulance', 'title' => 'Emergency Services', 'desc' => '24/7 urgent care services for immediate medical attention.']
                ];
                @endphp

                @foreach($services as $service)
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <div class="bg-blue-100 w-16 h-16 rounded-full flex items-center justify-center mb-6">
                        <i class="fas {{ $service['icon'] }} text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">{{ $service['title'] }}</h3>
                    <p class="text-gray-600">{{ $service['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=600&h=400&fit=crop" 
                         alt="Modern Clinic" 
                         class="rounded-2xl shadow-xl">
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Why Choose Us?</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        With over 15 years of experience, we provide patient-centered care using the latest medical technology and treatments.
                    </p>
                    <ul class="space-y-4">
                        @php
                        $features = [
                            'State-of-the-art medical facilities',
                            'Highly qualified and experienced doctors',
                            'Personalized treatment plans',
                            'Affordable healthcare packages',
                            'Easy appointment scheduling'
                        ];
                        @endphp
                        @foreach($features as $feature)
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-green-500 text-xl mt-1 mr-3"></i>
                            <span class="text-gray-700">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact Section --}}
    <section id="contact" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Book an Appointment</h2>
                <p class="text-xl text-gray-600">Get in touch with us today</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12">
                {{-- Contact Form --}}
                <div class="bg-white p-8 rounded-xl shadow-lg">
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                            <input type="text" name="name" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                            <input type="email" name="email" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                            <input type="tel" name="phone" required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-semibold mb-2">Service Required</label>
                            <select name="service" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">Select a service</option>
                                <option value="general">General Medicine</option>
                                <option value="preventive">Preventive Care</option>
                                <option value="specialist">Specialist Care</option>
                                <option value="emergency">Emergency Services</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-4 rounded-lg hover:bg-blue-700 transition font-semibold">
                            Book Appointment
                        </button>
                    </form>
                </div>

                {{-- Contact Info --}}
                <div class="space-y-8">
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Visit Us</h3>
                            <p class="text-gray-600">123 Medical Center Drive<br>Healthcare City, HC 12345</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <i class="fas fa-phone text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Call Us</h3>
                            <p class="text-gray-600">+1 (555) 123-4567<br>Mon-Fri: 8AM - 8PM</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-4 rounded-lg">
                            <i class="fas fa-envelope text-2xl text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg text-gray-900 mb-2">Email Us</h3>
                            <p class="text-gray-600">info@healthcareplus.com<br>support@healthcareplus.com</p>
                        </div>
                    </div>

                    <div class="bg-blue-600 text-white p-8 rounded-xl">
                        <h3 class="text-2xl font-bold mb-4">Emergency?</h3>
                        <p class="mb-4">Call our 24/7 emergency hotline</p>
                        <a href="tel:911" class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition">
                            <i class="fas fa-phone-alt mr-2"></i>Call Emergency
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-heartbeat text-3xl text-blue-400"></i>
                        <span class="ml-2 text-xl font-bold">HealthCare+</span>
                    </div>
                    <p class="text-gray-400">Providing quality healthcare services with compassion and excellence.</p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400">General Medicine</li>
                        <li class="text-gray-400">Preventive Care</li>
                        <li class="text-gray-400">Specialist Care</li>
                        <li class="text-gray-400">Emergency Services</li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-gray-400">
                <p>&copy; 2025 HealthCare+. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>