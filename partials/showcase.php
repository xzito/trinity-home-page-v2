<?php

use Xzito\TrinityHomePageV2\Showcase;

$showcases = Showcase::all($post->ID);
?>

<? $showcase = $showcases[0] ?>
<div class="row g-0 w-100 clip-row-shrinking clip-row-margin-fix clip-shrinking-lg clip-margin-fix-lg">
  <div class="col-md-6 order-1 clip-col-shrinking clip-col-margin-fix">
    <div class="bg-full py-5 showcase-bg" style="background-image: url('<?= $showcase->image() ?>')">&nbsp;</div>
  </div>
  <div class="col-md-6 order-2 d-flex flex-column justify-content-center bg-white clip-col-widening clip-col-margin-fix">
    <div class="text-center my-5 py-5">
      <h3 class="showcase px-2"><?= $showcase->heading() ?></h3>
      <? if ($showcase->subheading()): ?>
        <h4 class="showcase px-2"><?= $showcase->subheading() ?></h4>
      <? endif ?>
      <a class="btn-red mt-5" href="<?= $showcase->link()['url'] ?>" <? if ($showcase->link()['target']): ?> target="<?= $showcase->link()['target'] ?>" <? endif ?>>
        <?= $showcase->link()['title'] ?>
      </a>
    </div>
  </div>
</div>

<? $showcase = $showcases[1] ?>
<div class="row g-0 w-100 clip-row-widening clip-widening-lg">
  <div class="col-md-6 order-3 order-md-4 clip-col-shrinking clip-col-margin-fix">
    <div class="bg-full py-5 showcase-bg" style="background-image: url('<?= $showcase->image() ?>')">&nbsp;</div>
  </div>
  <div class="col-md-6 order-4 order-md-3 d-flex flex-column justify-content-center bg-white clip-col-widening">
    <div class="text-center my-5 py-5">
      <h3 class="showcase px-3"><?= $showcase->heading() ?></h3>
      <? if ($showcase->subheading()): ?>
        <h4 class="showcase px-2"><?= $showcase->subheading() ?></h4>
      <? endif ?>
      <a class="btn-red mt-5" href="<?= $showcase->link()['url'] ?>" <? if ($showcase->link()['target']): ?> target="<?= $showcase->link()['target'] ?>" <? endif ?>>
        <?= $showcase->link()['title'] ?>
      </a>
    </div>
  </div>
</div>
