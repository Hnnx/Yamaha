<?php 
/**
 * 
 *  Slick synced gallery
 */

 $gallery = get_field('gallery');


 ?>

<div class="carousel-container">
  <!-- Main Carousel -->
  <div id="mainCarousel" class="carousel">
    <div class="carousel__slide" data-src="https://via.placeholder.com/800x600">
      <img src="https://via.placeholder.com/800x600" alt="Image 1">
    </div>
    <div class="carousel__slide" data-src="https://via.placeholder.com/800x600">
      <img src="https://via.placeholder.com/800x600" alt="Image 2">
    </div>
    <div class="carousel__slide" data-src="https://via.placeholder.com/800x600">
      <img src="https://via.placeholder.com/800x600" alt="Image 3">
    </div>
  </div>

  <!-- Thumbnail Carousel -->
  <div id="thumbCarousel" class="carousel">
    <div class="carousel__slide">
      <img src="https://via.placeholder.com/100x75" alt="Thumbnail 1">
    </div>
    <div class="carousel__slide">
      <img src="https://via.placeholder.com/100x75" alt="Thumbnail 2">
    </div>
    <div class="carousel__slide">
      <img src="https://via.placeholder.com/100x75" alt="Thumbnail 3">
    </div>
  </div>
</div>




