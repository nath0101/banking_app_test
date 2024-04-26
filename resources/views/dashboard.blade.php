@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <ul class="nav flex-column nav-pills nav-justified bg-light rounded-pill">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link active" aria-current="page">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('deposit') }}" class="nav-link">
                            <i class="fas fa-money-bill-wave"></i> Deposit
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('withdraw') }}" class="nav-link">
                            <i class="fas fa-hand-holding-usd"></i> Withdraw
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('transaction_history') }}" class="nav-link">
                            <i class="fas fa-history"></i> Transaction History
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h2>Welcome, {{ Auth::user()->name }}</h2>
                    <p>Your current balance: ${{ Auth::user()->balance }}</p>
                </div>
            </div>
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="m-0">Transaction History</h3>
                    <a href="{{ route('transaction_history') }}" class="btn btn-warning">
                        <i class="fas fa-list"></i> View All Transactions
                    </a>
                </div>
                <div class="card-body">
                    @if(count($transactions) > 0)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Type</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr>
                                            <td>{{ $transaction->type }}</td>
                                            <td>${{ $transaction->amount }}</td>
                                            <td>{{ $transaction->created_at->format('d/m/Y H:i') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>No transactions found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style scoped>
    .nav-pills .nav-link {
        padding: 15px 25px; /* Adjust padding as needed */
        color: #333;
        font-weight: bold; /* Optional: bolder text for navigation */
        text-align: center; /* Center text within nav links */
        transition: background-color 0.3s ease; /* Smooth transition on hover */
    }

    .nav-pills .nav-link:hover {
        background-color: #e9ecef; /* Light gray background on hover */
    }

    .nav-pills .nav-link.active {
        background-color: #007bff; /* Blue background for active link */
        color: #fff; /* White text for active link */
    }

    .card {
        border-radius: 5px; /* Add rounded corners to cards */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08); /* Add subtle shadow */
    }

    .card-body {
        padding: 20px; /* Adjust padding as needed */
    }
</style>
@endsection

@section('scripts')
    <script src="{{ mix('js/app.js') }}" defer></script>
@endsection
