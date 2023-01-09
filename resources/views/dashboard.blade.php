@extends('adminlte::page')


@section('content_header')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
@stop
@section('content')

@foreach($calendars as $calendar)
@foreach($users as $user)
<br>
<div class="card mb-3" style="max-width: full;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="..." alt="...">TODO:change
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $user->name ?>
        <small class="text-muted"><?php echo $user->department ?></small>
        </h5>
        <p class="card-text"><?php echo $user->comment ?></p>
        <p class="card-text"><small class="text-muted"><?php echo $calendar->update ?></small></p>
      </div>
    </div>
  </div>
</div>

@endforeach
@endforeach

@stop
@section('footer')

<div class="d-grid gap-2 col-6 mx-auto text-center">

<a href="{{ route('calendar') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">
<button class="btn btn-dark" type="button">calendar</button>
</a>

<br>
<br>
<button class="btn btn-dark" type="button" data-toggle="modal" data-target="#orderCheck">Coffee Break</button>
</div>

<div class="modal fade" id="orderCheck" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-footer">

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


