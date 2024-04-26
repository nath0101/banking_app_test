@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <ul class="nav flex-column nav-pills nav-justified bg-light rounded-pill">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('deposit') }}" class="nav-link active" aria-current="page">
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
            <div class="card">
                <div class="card-header">{{ __('Deposit') }}</div>

                <div class="card-body">
                    <!-- Menampilkan alert jika terdapat pesan 'error' -->
                    @if (Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form id="depositForm" method="POST" action="{{ route('deposit.process') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="amount" class="form-label">{{ __('Amount') }}</label>
                            <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" value="{{ old('amount') }}" required>
                            @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Deposit') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        document.getElementById('depositForm').addEventListener('submit', confirmDeposit);
    </script>
@endsection
