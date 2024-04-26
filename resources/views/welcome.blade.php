@extends('layouts.app')

@section('content')
<div id="app">
    <div class="container welcome-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md-8">
                <div class="welcome-content">
                    <h1 class="welcome-title text-center">Welcome to Banking-App!</h1>
                    <p class="welcome-message">Manage your finances with ease and confidence. We offer a wide range of secure and convenient banking solutions to meet your everyday needs.</p>

                    <div class="welcome-cta">
                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary">New Customer? Register Here</a>
                    </div>

                    <div class="welcome-highlights">
                        <ul>
                            <li><i class="fas fa-check-circle"></i> Secure online deposit</li>
                            <li><i class="fas fa-mobile-alt"></i> Convenient website banking app</li>
                            <li><i class="fas fa-lock"></i> Industry-leading security measures</li>
                            <li><i class="fas fa-dollar-sign"></i> Save your deposit</li>
                            <li><i class="fas fa-handshake"></i> Exceptional customer support</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <img src="{{ asset('images/welcome-banner.png') }}" alt="Banking illustration" class="img-fluid welcome-banner">
            </div>
        </div>
    </div>
</div>
@endsection

<style scoped>
.welcome-container {
    padding-top: 100px; /* Adjust padding as needed */
}

.welcome-title {
    font-size: 2.5rem; /* Adjust font size as needed */
    margin-bottom: 2rem; /* Adjust margin as needed */
}

.welcome-message {
    font-size: 1.15rem; /* Adjust font size as needed */
    line-height: 1.6; /* Adjust line height as needed */
    margin-bottom: 2rem; /* Adjust margin as needed */
}

.welcome-cta {
    display: flex;
    justify-content: space-between;
    margin-bottom: 2rem; /* Adjust margin as needed */
}

.welcome-cta a {
    text-decoration: none;
    padding: 10px 20px; /* Adjust padding as needed */
}

.welcome-highlights {
    margin-bottom: 2rem; /* Adjust margin as needed */
}

.welcome-highlights li {
    list-style: none;
    margin-bottom: 1rem; /* Adjust margin as needed */
    display: flex;
    align-items: center;
}

.welcome-highlights li i {
    margin-right: 1rem; /* Adjust margin as needed */
    color: #007bff; /* Adjust highlight color as needed */
}

.welcome-banner {
    border-radius: 5px; /* Adjust border radius as needed */
}
</style>
