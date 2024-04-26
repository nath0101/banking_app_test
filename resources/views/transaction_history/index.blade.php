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
                        <a href="{{ route('transaction_history') }}" class="nav-link active" aria-current="page">
                            <i class="fas fa-history"></i> Transaction History
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Transaction History</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover table-bordered mt-4">
                        <thead>
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->created_at }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-3">
                {{ $transactions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
