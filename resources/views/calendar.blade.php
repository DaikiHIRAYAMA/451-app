@extends('adminlte::page')

<link rel="stylesheet" href="{{ asset('/css/calendar.css')  }}" >
<header>
<style>
#check {
        /* PHP の変数を echo する */
        background-color: purple;
        color: purple;
        text-align: center;
    }
</style>
</header>


@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card">
    <div class="card-header">{{ $calendar->getTitle() }}</div>
    <div class="card-body" id="">
			{!! $calendar->render() !!}
    </div>
    </div>
</div>
</div>
</div>
@endsection

@section('footer')

<div class="d-grid gap-2 col-6 mx-auto text-center">

<a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
<button class="btn btn-dark" type="button">Dashboard</button>
</a>

<br>
<br>
<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#orderCheck">Coffee Break</button>
</div>

<div class="modal fade" id="orderCheck" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-footer">
                    
                    <?php $orderCheck = Auth::user()->ordered; ?>

                    @if ($orderCheck == 1)
                    <div class="modal-body text-center">
                    <label>無料ドリンクは1日1杯までです。</label>
                    </div>
                    <button type="button" class="btn btn-default text-center" data-dismiss="modal">閉じる</button>
                    @else
                    <div class="modal-body text-center">
                    <label>飲み物を注文しますか？<br>
                    こちらの画面をバリスタさんにお見せください
                    </label>
                    </div>
                    <a>
                    <button type="button" class="btn btn-default text-center" data-dismiss="modal">閉じる</button>
                    <a>

                    <a href="{{ url('/coffee_break') }}" method="POST" class="text-sm text-gray-700 dark:text-gray-500 underline">
                    <button class="btn btn-dark" type="button" >Coffee Break</button>

                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop