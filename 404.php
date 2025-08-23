<?php
$page_title = 'Page Not Found | 404 Error';
$page_description = 'The page you are looking for could not be found.';
$page_robots = 'noindex, nofollow';
include 'header.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom CSS that complements Tailwind */
        .bg-404 {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .ghost {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        /* Ensure content takes full height between header/footer */
        .error-content {
            min-height: calc(100vh - [header_height] - [footer_height]);
            /* Replace [header_height] and [footer_height] with actual values */
        }
    </style>

    <div class="error-content bg-404 flex items-center justify-center p-4">
        <div class="max-w-md w-full text-center">
            <!-- Animated ghost SVG -->
            <div class="ghost mb-8 mx-auto w-40 h-40">
                <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#FFFFFF" d="M50.1,-49.8C62.9,-36.1,70.4,-18,69.4,-0.7C68.4,16.6,58.9,33.2,46.1,45.6C33.2,58,17.1,66.2,-1.6,67.8C-20.3,69.4,-40.6,64.4,-52.1,52C-63.6,39.6,-66.3,19.8,-64.3,1.3C-62.3,-17.2,-55.6,-34.4,-44.1,-48.1C-32.6,-61.8,-16.3,-72.1,1.3,-73.4C18.9,-74.7,37.7,-67.1,50.1,-49.8Z" transform="translate(100 100)" />
                    <circle cx="80" cy="80" r="10" fill="#3B82F6"/>
                    <circle cx="120" cy="80" r="10" fill="#3B82F6"/>
                    <path d="M80 130 Q100 150 120 130" stroke="#3B82F6" stroke-width="5" fill="transparent" />
                </svg>
            </div>
            
            <h1 class="text-5xl font-bold text-gray-800 mb-4">404</h1>
            <h2 class="text-2xl font-semibold text-gray-700 mb-6">Oops! Page not found</h2>
            <p class="text-gray-600 mb-8">The page you're looking for doesn't exist or has been moved.</p>
            
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="/" class="px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition duration-300 font-medium">
                    Go Home
                </a>
                <button onclick="history.back()" class="px-6 py-3 bg-gray-200 text-gray-800 rounded-lg shadow hover:bg-gray-300 transition duration-300 font-medium">
                    Go Back
                </button>
            </div>
        </div>
    </div>

    <script>
        // Optional JavaScript for additional functionality
        document.addEventListener('DOMContentLoaded', function() {
            // You can add more interactive elements here
            console.log('404 page loaded');
            
            // Example: Randomize ghost color on click
            document.querySelector('.ghost').addEventListener('click', function() {
                const colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6'];
                const randomColor = colors[Math.floor(Math.random() * colors.length)];
                document.querySelectorAll('circle, path').forEach(el => {
                    if (el.getAttribute('fill') !== 'transparent') {
                        el.setAttribute('fill', randomColor);
                    }
                    if (el.getAttribute('stroke')) {
                        el.setAttribute('stroke', randomColor);
                    }
                });
            });
        });
    </script>

<?php include 'footer.php'; ?>
</html>