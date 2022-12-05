@extends('head')

<div class="from-edit">
    <h1>Editar</h1>
    <form action="{{route('update', [$get[0]->id])}}" method="POST">
        @method("put")
        @csrf
    <input type="text" name="link" value="{{$get[0]->url}}" id="">
    <input type="number" name="click" value="{{$get[0]->cliques}}" id="">
    <button class="edit-button">Editar</button>
    </form>
</div>