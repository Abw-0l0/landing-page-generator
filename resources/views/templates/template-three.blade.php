{{-- resources/views/landing/restaurant.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bella Cucina - Italian Restaurant</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-white">
    {{-- Header --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-3">
                    <i class="fas fa-utensils text-3xl text-amber-600"></i>
                    <div>
                        <div class="text-2xl font-bold text-gray-900">Bella Cucina</div>
                        <div class="text-xs text-gray-500 uppercase tracking-wider">Authentic Italian</div>
                    </div>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#menu" class="text-gray-700 hover:text-amber-600 font-medium transition">Menu</a>
                    <a href="#about" class="text-gray-700 hover:text-amber-600 font-medium transition">About</a>
                    <a href="#gallery" class="text-gray-700 hover:text-amber-600 font-medium transition">Gallery</a>
                    <a href="#contact" class="text-gray-700 hover:text-amber-600 font-medium transition">Contact</a>
                </nav>
                <button class="bg-amber-600 text-white px-6 py-2 rounded-full hover:bg-amber-700 transition font-semibold">
                    Reserve Table
                </button>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="relative h-screen bg-cover bg-center" style="background-image: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=1920&h=1080&fit=crop');">
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="text-center text-white max-w-4xl px-4">
                <h1 class="text-6xl md:text-7xl font-bold mb-6 tracking-tight">
                    Experience Authentic Italian Cuisine
                </h1>
                <p class="text-2xl mb-10 text-gray-200">
                    Fresh ingredients, traditional recipes, unforgettable moments
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="#menu" class="bg-amber-600 text-white px-10 py-4 rounded-full hover:bg-amber-700 transition text-lg font-semibold">
                        View Our Menu
                    </a>
                    <a href="#contact" class="border-2 border-white text-white px-10 py-4 rounded-full hover:bg-white hover:text-gray-900 transition text-lg font-semibold">
                        Book a Table
                    </a>
                </div>
            </div>
        </div>
        <div class="absolute bottom-10 left-0 right-0 flex justify-center">
            <a href="#menu" class="text-white animate-bounce">
                <i class="fas fa-chevron-down text-3xl"></i>
            </a>
        </div>
    </section>

    {{-- Features Bar --}}
    <section class="bg-gray-900 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                @php
                $features = [
                    ['icon' => 'fa-leaf', 'title' => 'Fresh Ingredients', 'desc' => 'Daily sourced organic produce'],
                    ['icon' => 'fa-chef-hat', 'title' => 'Master Chefs', 'desc' => 'Trained in Italy'],
                    ['icon' => 'fa-wine-glass', 'title' => 'Fine Wines', 'desc' => 'Curated Italian selection'],
                    ['icon' => 'fa-clock', 'title' => 'Open Daily', 'desc' => '11 AM - 11 PM']
                ];
                @endphp

                @foreach($features as $feature)
                <div class="text-center">
                    <i class="fas {{ $feature['icon'] }} text-3xl text-amber-500 mb-3"></i>
                    <h3 class="font-bold text-lg mb-1">{{ $feature['title'] }}</h3>
                    <p class="text-sm text-gray-400">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Menu Preview Section --}}
    <section id="menu" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">Our Signature Dishes</h2>
                <p class="text-xl text-gray-600">Handcrafted with love and tradition</p>
                <div class="w-24 h-1 bg-amber-600 mx-auto mt-6"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $dishes = [
                    [
                        'name' => 'Margherita Pizza',
                        'desc' => 'Classic Neapolitan pizza with fresh mozzarella, basil, and San Marzano tomatoes',
                        'price' => '$18',
                        'image' => 'https://images.unsplash.com/photo-1574071318508-1cdbab80d002?w=400&h=400&fit=crop'
                    ],
                    [
                        'name' => 'Fettuccine Alfredo',
                        'desc' => 'Creamy parmesan sauce with fresh pasta, made from our grandmother\'s recipe',
                        'price' => '$22',
                        'image' => 'https://images.unsplash.com/photo-1645112411341-6c4fd023714a?w=400&h=400&fit=crop'
                    ],
                    [
                        'name' => 'Osso Buco',
                        'desc' => 'Braised veal shanks with saffron risotto and gremolata',
                        'price' => '$32',
                        'image' => 'https://images.unsplash.com/photo-1544025162-d76694265947?w=400&h=400&fit=crop'
                    ],
                    [
                        'name' => 'Tiramisu',
                        'desc' => 'Traditional Italian dessert with espresso-soaked ladyfingers and mascarpone',
                        'price' => '$12',
                        'image' => 'https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=400&h=400&fit=crop'
                    ],
                    [
                        'name' => 'Ravioli di Ricotta',
                        'desc' => 'Handmade ricotta ravioli with sage brown butter and pine nuts',
                        'price' => '$24',
                        'image' => 'https://images.unsplash.com/photo-1587740908075-9ea5b3b2c4c7?w=400&h=400&fit=crop'
                    ],
                    [
                        'name' => 'Panna Cotta',
                        'desc' => 'Silky smooth vanilla cream with berry compote',
                        'price' => '$10',
                        'image' => 'https://images.unsplash.com/photo-1488477181946-6428a0291777?w=400&h=400&fit=crop'
                    ]
                ];
                @endphp

                @foreach($dishes as $dish)
                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
                    <div class="relative overflow-hidden h-64">
                        <img src="{{ $dish['image'] }}" 
                             alt="{{ $dish['name'] }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        <div class="absolute top-4 right-4 bg-amber-600 text-white px-4 py-2 rounded-full font-bold">
                            {{ $dish['price'] }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $dish['name'] }}</h3>
                        <p class="text-gray-600 leading-relaxed">{{ $dish['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="#" class="inline-block bg-amber-600 text-white px-10 py-4 rounded-full hover:bg-amber-700 transition text-lg font-semibold">
                    View Full Menu <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- About Section --}}
    <section id="about" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div>
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=700&h=700&fit=crop" 
                         alt="Restaurant Interior" 
                         class="rounded-2xl shadow-2xl">
                </div>
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Our Story</h2>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                        Since 1985, Bella Cucina has been bringing the authentic taste of Italy to our community. Our family recipes, passed down through generations, are prepared with the same love and care as they were in our grandmother's kitchen in Tuscany.
                    </p>
                    <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                        We believe in using only the finest ingredients, sourced locally when possible, and imported from Italy when necessary. Every dish is a celebration of Italian culinary tradition.
                    </p>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-white rounded-lg shadow">
                            <div class="text-3xl font-bold text-amber-600 mb-2">38+</div>
                            <div class="text-gray-600">Years Experience</div>
                        </div>
                        <div class="text-center p-4 bg-white rounded-lg shadow">
                            <div class="text-3xl font-bold text-amber-600 mb-2">50K+</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Gallery Section --}}
    <section id="gallery" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">Gallery</h2>
                <p class="text-xl text-gray-600">A glimpse into our world</p>
                <div class="w-24 h-1 bg-amber-600 mx-auto mt-6"></div>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                @php
                $gallery = [
                    'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1559339352-11d035aa65de?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1424847651672-bf20a4b0982b?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1460306855393-0410f61241c7?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1552566626-52f8b828add9?w=400&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1481833761820-0509d3217039?w=400&h=400&fit=crop'
                ];
                @endphp

                @foreach($gallery as $image)
                <div class="relative overflow-hidden rounded-lg group cursor-pointer">
                    <img src="{{ $image }}" 
                         alt="Gallery Image" 
                         class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
                        <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></i>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials --}}
    <section class="py-20 bg-amber-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-5xl font-bold text-gray-900 mb-4">What Our Guests Say</h2>
                <div class="w-24 h-1 bg-amber-600 mx-auto mt-6"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $reviews = [
                    ['name' => 'Maria Thompson', 'rating' => 5, 'text' => 'The most authentic Italian food outside of Italy! The pasta is always perfectly cooked and the atmosphere is wonderful.'],
                    ['name' => 'David Chen', 'rating' => 5, 'text' => 'Outstanding service and incredible food. The osso buco is to die for. This is our go-to spot for special occasions.'],
                    ['name' => 'Sophie Anderson', 'rating' => 5, 'text' => 'Bella Cucina never disappoints. From the warm bread to the tiramisu, everything is perfection. Highly recommended!']
                ];
                @endphp

                @foreach($reviews as $review)
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex mb-4">
                        @for($i = 0; $i < $review['rating']; $i++)
                        <i class="fas fa-star text-amber-500"></i>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic text-lg">"{{ $review['text'] }}"</p>
                    <div class="font-bold text-gray-900">{{ $review['name'] }}</div>
                    <div class="text-sm text-gray-500">Verified Customer</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Reservation Section --}}
    <section id="contact" class="py-20 bg-gray-900 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div>
                    <h2 class="text-4xl font-bold mb-6">Reserve Your Table</h2>
                    <p class="text-xl text-gray-300 mb-8">Experience authentic Italian dining. Book your table today.</p>

                    <form action="{{ route('reservations.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold mb-2">Name</label>
                                <input type="text" name="name" required
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent text-white">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold mb-2">Phone</label>
                                <input type="tel" name="phone" required
                                       class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent text-white">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold mb-2">Special Requests</label>
                            <textarea name="message" rows="3"
                                      class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:ring-2 focus:ring-amber-600 focus:border-transparent text-white"
                                      placeholder="Any dietary restrictions or special occasions?"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-amber-600 text-white py-4 rounded-full hover:bg-amber-700 transition text-lg font-semibold">
                            Confirm Reservation
                        </button>
                    </form>
                </div>

                <div class="space-y-8">
                    <div>
                        <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start space-x-4">
                                <div class="bg-amber-600 p-3 rounded-lg">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Location</h4>
                                    <p class="text-gray-300">123 Culinary Street<br>Gourmet District, GD 12345</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-amber-600 p-3 rounded-lg">
                                    <i class="fas fa-phone text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Phone</h4>
                                    <p class="text-gray-300">+1 (555) 987-6543</p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-amber-600 p-3 rounded-lg">
                                    <i class="fas fa-clock text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Hours</h4>
                                    <p class="text-gray-300">
                                        Monday - Thursday: 11 AM - 10 PM<br>
                                        Friday - Saturday: 11 AM - 11 PM<br>
                                        Sunday: 12 PM - 9 PM
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start space-x-4">
                                <div class="bg-amber-600 p-3 rounded-lg">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg mb-1">Email</h4>
                                    <p class="text-gray-300">reservations@bellacucina.com</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-800 p-6 rounded-xl">
                        <h4 class="font-bold text-xl mb-4">Private Events</h4>
                        <p class="text-gray-300 mb-4">Host your special celebration in our private dining room. Perfect for birthdays, anniversaries, and corporate events.</p>
                        <a href="#" class="inline-block text-amber-500 hover:text-amber-400 font-semibold">
                            Learn More <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-black text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center space-x-3 mb-4">
                        <i class="fas fa-utensils text-2xl text-amber-500"></i>
                        <div>
                            <div class="text-xl font-bold">Bella Cucina</div>
                            <div class="text-xs text-gray-400 uppercase">Authentic Italian</div>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm">Bringing the taste of Italy to your table since 1985.</p>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#menu" class="text-gray-400 hover:text-white text-sm">Menu</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white text-sm">About Us</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-white text-sm">Gallery</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white text-sm">Reservations</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-400 text-sm">Dine-In</li>
                        <li class="text-gray-400 text-sm">Takeout</li>
                        <li class="text-gray-400 text-sm">Catering</li>
                        <li class="text-gray-400 text-sm">Private Events</li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-lg mb-4">Follow Us</h4>
                    <div class="flex space-x-4 mb-6">
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-2xl"><i class="fab fa-tripadvisor"></i></a>
                    </div>
                    <div class="bg-gray-900 p-4 rounded-lg">
                        <p class="text-xs text-gray-400 mb-2">Subscribe to our newsletter</p>
                        <form class="flex">
                            <input type="email" placeholder="Your email" 
                                   class="flex-1 px-3 py-2 bg-gray-800 text-white text-sm rounded-l-lg focus:outline-none">
                            <button class="bg-amber-600 px-4 py-2 rounded-r-lg hover:bg-amber-700 transition">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2025 Bella Cucina. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms & Conditions</a>
                </div>
            </div>
        </div>
    </footer>

    {{-- Scroll to Top Button --}}
    <button id="scrollTop" class="fixed bottom-8 right-8 bg-amber-600 text-white w-12 h-12 rounded-full shadow-lg hover:bg-amber-700 transition opacity-0 pointer-events-none">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Scroll to top functionality
        const scrollTopBtn = document.getElementById('scrollTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>