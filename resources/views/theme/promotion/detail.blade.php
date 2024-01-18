@extends('theme.components.layout')

@section('content')
    {{$promotion}}
    @foreach($pagination->items() as $product)
        <a class="btn btn-primary" href="/cart/addItem/{{$product->id}}">Add item {{$product->id}}</a>
        <a class="btn btn-primary" href="/cart/buyItem/{{$product->id}}">Buy item {{$product->id}}</a>
    @endforeach
@endsection

@section('scripts')
@endsection



