
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CloudFlow - Modern SaaS Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    {{-- Header --}}
    <header class="bg-white border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="bg-gradient-to-r from-purple-600 to-blue-600 w-10 h-10 rounded-lg flex items-center justify-center">
                        <i class="fas fa-cloud text-white text-xl"></i>
                    </div>
                    <span class="text-2xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent">CloudFlow</span>
                </div>
                <nav class="hidden md:flex space-x-8">
                    <a href="#features" class="text-gray-600 hover:text-gray-900 transition">Features</a>
                    <a href="#pricing" class="text-gray-600 hover:text-gray-900 transition">Pricing</a>
                    <a href="#testimonials" class="text-gray-600 hover:text-gray-900 transition">Testimonials</a>
                    <a href="#contact" class="text-gray-600 hover:text-gray-900 transition">Contact</a>
                </nav>
                <div class="flex items-center space-x-4">
                    <a href="#" class="text-gray-600 hover:text-gray-900 font-medium">Sign In</a>
                    <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-6 py-2 rounded-lg hover:shadow-lg transition">
                        Start Free Trial
                    </button>
                </div>
            </div>
        </div>
    </header>

    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-purple-50 via-white to-blue-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-4xl mx-auto">
                <div class="inline-block bg-purple-100 text-purple-700 px-4 py-2 rounded-full text-sm font-semibold mb-6">
                    <i class="fas fa-rocket mr-2"></i>New: AI-Powered Analytics
                </div>
                <h1 class="text-6xl font-bold text-gray-900 mb-6 leading-tight">
                    Streamline Your Workflow with
                    <span class="bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent"> CloudFlow</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                    The all-in-one platform that helps teams collaborate, automate, and scale faster than ever. Join 10,000+ companies already growing with CloudFlow.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center mb-12">
                    <button class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-8 py-4 rounded-lg hover:shadow-2xl transition-all text-lg font-semibold">
                        Start Free 14-Day Trial
                    </button>
                    <button class="border-2 border-gray-300 text-gray-700 px-8 py-4 rounded-lg hover:border-gray-400 transition text-lg font-semibold">
                        <i class="fas fa-play-circle mr-2"></i>Watch Demo
                    </button>
                </div>
                <div class="flex items-center justify-center space-x-8 text-sm text-gray-500">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        No credit card required
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Cancel anytime
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-2"></i>
                        Free forever plan
                    </div>
                </div>
            </div>

            {{-- Hero Image/Dashboard Preview --}}
            <div class="mt-16 relative">
                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent z-10"></div>
                <div class="bg-gradient-to-br from-purple-100 to-blue-100 rounded-2xl p-8 shadow-2xl">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                        <div class="bg-gray-100 px-4 py-3 flex items-center space-x-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                            <div class="w-3 h-3 rounded-full bg-green-500"></div>
                        </div>
                        <div class="p-8">
                            <div class="grid grid-cols-3 gap-4 mb-6">
                                <div class="h-32 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg"></div>
                                <div class="h-32 bg-gradient-to-br from-blue-400 to-blue-600 rounded-lg"></div>
                                <div class="h-32 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg"></div>
                            </div>
                            <div class="space-y-3">
                                <div class="h-4 bg-gray-200 rounded w-3/4"></div>
                                <div class="h-4 bg-gray-200 rounded w-1/2"></div>
                                <div class="h-4 bg-gray-200 rounded w-2/3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Stats Section --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-4 gap-8 text-center">
                @php
                $stats = [
                    ['number' => '10,000+', 'label' => 'Active Users'],
                    ['number' => '99.9%', 'label' => 'Uptime'],
                    ['number' => '50M+', 'label' => 'Tasks Completed'],
                    ['number' => '150+', 'label' => 'Countries']
                ];
                @endphp
                @foreach($stats as $stat)
                <div>
                    <div class="text-4xl font-bold bg-gradient-to-r from-purple-600 to-blue-600 bg-clip-text text-transparent mb-2">
                        {{ $stat['number'] }}
                    </div>
                    <div class="text-gray-600 font-medium">{{ $stat['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Everything You Need to Succeed</h2>
                <p class="text-xl text-gray-600">Powerful features designed for modern teams</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $features = [
                    ['icon' => 'fa-bolt', 'title' => 'Lightning Fast', 'desc' => 'Optimized performance that keeps your team moving at speed.', 'color' => 'yellow'],
                    ['icon' => 'fa-lock', 'title' => 'Enterprise Security', 'desc' => 'Bank-level encryption and compliance with SOC 2 Type II.', 'color' => 'green'],
                    ['icon' => 'fa-users', 'title' => 'Team Collaboration', 'desc' => 'Real-time collaboration tools that bring teams together.', 'color' => 'blue'],
                    ['icon' => 'fa-chart-line', 'title' => 'Advanced Analytics', 'desc' => 'Deep insights and reporting to track your progress.', 'color' => 'purple'],
                    ['icon' => 'fa-plug', 'title' => 'Integrations', 'desc' => 'Connect with 100+ tools you already use every day.', 'color' => 'indigo'],
                    ['icon' => 'fa-mobile-alt', 'title' => 'Mobile Apps', 'desc' => 'Native iOS and Android apps for work on the go.', 'color' => 'pink']
                ];
                @endphp

                @foreach($features as $feature)
                <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 group hover:-translate-y-2">
                    <div class="bg-{{ $feature['color'] }}-100 w-14 h-14 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <i class="fas {{ $feature['icon'] }} text-2xl text-{{ $feature['color'] }}-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $feature['title'] }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $feature['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Pricing Section --}}
    <section id="pricing" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-gray-600">Choose the plan that's right for your team</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $plans = [
                    [
                        'name' => 'Starter',
                        'price' => '0',
                        'period' => 'Forever Free',
                        'features' => ['Up to 5 users', '10 GB storage', 'Basic features', 'Email support'],
                        'cta' => 'Get Started',
                        'popular' => false
                    ],
                    [
                        'name' => 'Professional',
                        'price' => '29',
                        'period' => 'per user/month',
                        'features' => ['Unlimited users', '100 GB storage', 'Advanced features', 'Priority support', 'Integrations'],
                        'cta' => 'Start Free Trial',
                        'popular' => true
                    ],
                    [
                        'name' => 'Enterprise',
                        'price' => 'Custom',
                        'period' => 'Contact Sales',
                        'features' => ['Unlimited everything', 'Dedicated support', 'Custom integrations', 'SLA guarantee', 'Training included'],
                        'cta' => 'Contact Sales',
                        'popular' => false
                    ]
                ];
                @endphp

                @foreach($plans as $plan)
                <div class="bg-white rounded-2xl shadow-lg {{ $plan['popular'] ? 'ring-4 ring-purple-600 transform scale-105' : '' }} p-8 relative">
                    @if($plan['popular'])
                    <div class="absolute top-0 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                        <span class="bg-gradient-to-r from-purple-600 to-blue-600 text-white px-4 py-1 rounded-full text-sm font-semibold">
                            Most Popular
                        </span>
                    </div>
                    @endif

                    <h3 class="text-2xl font-bold text-gray-900 mb-4">{{ $plan['name'] }}</h3>
                    <div class="mb-6">
                        @if($plan['price'] === 'Custom')
                        <div class="text-4xl font-bold text-gray-900">{{ $plan['price'] }}</div>
                        @else
                        <div class="text-5xl font-bold text-gray-900">${{ $plan['price'] }}</div>
                        @endif
                        <div class="text-gray-600 mt-2">{{ $plan['period'] }}</div>
                    </div>

                    <ul class="space-y-4 mb-8">
                        @foreach($plan['features'] as $feature)
                        <li class="flex items-start">
                            <i class="fas fa-check text-green-500 mt-1 mr-3"></i>
                            <span class="text-gray-600">{{ $feature }}</span>
                        </li>
                        @endforeach
                    </ul>

                    <button class="{{ $plan['popular'] ? 'bg-gradient-to-r from-purple-600 to-blue-600 text-white' : 'border-2 border-gray-300 text-gray-700' }} w-full py-4 rounded-lg hover:shadow-lg transition font-semibold">
                        {{ $plan['cta'] }}
                    </button>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Testimonials Section --}}
    <section id="testimonials" class="py-20 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Loved by Teams Worldwide</h2>
                <p class="text-xl text-gray-600">See what our customers have to say</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @php
                $testimonials = [
                    ['name' => 'Sarah Johnson', 'role' => 'CEO at TechCorp', 'text' => 'CloudFlow transformed how our team works. We\'ve seen a 40% increase in productivity since switching.'],
                    ['name' => 'Michael Chen', 'role' => 'Product Manager', 'text' => 'The best investment we\'ve made. The ROI was clear within the first month.'],
                    ['name' => 'Emily Rodriguez', 'role' => 'Marketing Director', 'text' => 'Intuitive, powerful, and reliable. Everything we needed in one platform.']
                ];
                @endphp

                @foreach($testimonials as $testimonial)
                <div class="bg-white p-8 rounded-2xl shadow-lg">
                    <div class="flex items-center mb-4">
                        @for($i = 0; $i < 5; $i++)
                        <i class="fas fa-star text-yellow-400"></i>
                        @endfor
                    </div>
                    <p class="text-gray-700 mb-6 italic">"{{ $testimonial['text'] }}"</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-blue-400 rounded-full mr-4"></div>
                        <div>
                            <div class="font-bold text-gray-900">{{ $testimonial['name'] }}</div>
                            <div class="text-sm text-gray-600">{{ $testimonial['role'] }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-gradient-to-r from-purple-600 to-blue-600">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-white">
            <h2 class="text-4xl font-bold mb-6">Ready to Transform Your Workflow?</h2>
            <p class="text-xl mb-10 text-purple-100">Join thousands of teams already using CloudFlow to work smarter, not harder.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="bg-white text-purple-600 px-8 py-4 rounded-lg hover:bg-gray-100 transition text-lg font-semibold">
                    Start Your Free Trial
                </button>
                <button class="border-2 border-white text-white px-8 py-4 rounded-lg hover:bg-white hover:bg-opacity-10 transition text-lg font-semibold">
                    Schedule a Demo
                </button>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-5 gap-8 mb-8">
                <div class="md:col-span-2">
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="bg-gradient-to-r from-purple-600 to-blue-600 w-10 h-10 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cloud text-white"></i>
                        </div>
                        <span class="text-xl font-bold">CloudFlow</span>
                    </div>
                    <p class="text-gray-400 mb-4">Empowering teams to work better together.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white text-xl"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Product</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Features</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Pricing</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Security</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Roadmap</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Company</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Careers</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Resources</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Documentation</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">API</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Status</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2025 CloudFlow. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Cookie Policy</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>