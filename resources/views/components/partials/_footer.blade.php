<!-- resources/views/components/partials/_footer.blade.php -->
<footer class="bg-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5>{{ config('app.name') }}</h5>
                <p class="text-muted">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Quick Links</h5>
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none" href="{{ url('/') }}">Home</a></li>
                    <li><a class="text-decoration-none" href="{{ route('login') }}">Login</a></li>
                    <li><a class="text-decoration-none" href="{{ route('register') }}">Register</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3">
                <h5>Contact Us</h5>
                <ul class="list-unstyled">
                    <li><a class="text-decoration-none" href="mailto:info@example.com">info@example.com</a></li>
                    <li><a class="text-decoration-none" href="tel:+123456789">+1 234 567 89</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
