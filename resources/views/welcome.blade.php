@extends('plantilla')
@section('content')

<br>

<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/dex.gif" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px white">
        <h4>Welcome to the Pocket Monster Encyclopedia!</h4>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/img/moves.gif" class="d-block w-100" alt="">
      <div class="carousel-caption d-none d-md-block" style="text-shadow: 2px 2px 2px white">
        <h4>Moves Management</h4>
        <p>Monsters can learn and forget battle moves as they grow.</p>
      </div>
    </div>
    <div class="carousel-item" style="background:radial-gradient(circle, rgba(177,207,255,1) 0%, rgba(99,159,231,1) 100%);">
      <img src="/img/evos.gif" class="d-block w-100" alt="">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

@endsection