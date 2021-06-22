<?php

use Xzito\TrinityHomePageV2\Card;

$section_heading = Card::section_heading($post->ID);
$cards = Card::all($post->ID);
?>

<div class="container my-4 pt-4 pb-5">
  <div class="row">
    <div class="col text-center">
      <h3 class="featured-card mb-5"><?= $section_heading ?></h3>
    </div>
  </div>
  <div class="row">
    <? for ($i = 0; $i < count($cards); $i++): ?>
      <? $card = $cards[$i] ?>
        <div class="col-lg-4 py-3">
          <? if ($i % 2 == 0): ?>
            <article class="featured-card h-100 clip-card-shrinking">
          <? else: ?>
            <article class="featured-card h-100 clip-card-widening">
          <? endif ?>
            <a class="h-100 p-0 card-title featured-card-link" href="<?= $card->link() ?>">
              <div class="h-100 mx-auto card rounded-0">
                <div class="d-block card-img-top bg-full featured-card-img" style="background-image: url('<?= $card->image() ?>')"></div>
                <div class="card-body featured-card-body justify-content-center d-flex align-items-center">
                  <p class="m-0 px-3 featured-card-title"><?= $card->heading() ?></p>
                </div>
              </div>
            </a>
          </article>
        </div>
    <? endfor ?>
  </div>
</div>
