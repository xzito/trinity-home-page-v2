<?php

use Xzito\TrinityHomePageV2\Asset;
use Xzito\TrinityHomePageV2\Banner;

$banner = new Banner($post->ID);
?>

<? if ($banner->background_type() == 'video'): ?>
	<div class="hero-container">
		<video class="hero-bg-video" playsinline autoplay muted loop poster="<?= $banner->background_video_poster() ?>">
			<source src="<?= $banner->background_video_webm() ?>" type="video/webm">
			<source src="<?= $banner->background_video_mp4() ?>" type="video/mp4">
		</video>
<? elseif ($banner->background_type() == 'image'): ?>
	<div class="hero-container" style="background-image: url('<?= $banner->background_image() ?>')">
<? else: ?>
	<div class="hero-container">
<? endif ?>
  <? if ($banner->background_tinted()): ?>
    <div class="hero-opacity">&nbsp;</div>
  <? endif ?>
  <div class="row g-0 w-100 hero-row">
    <div class="col d-flex flex-column align-items-center justify-content-center">
      <div class="w-100">
        <div class="container py-5">
          <div class="row">
            <div class="col d-flex flex-column align-items-center">
              <h1 class="hero"><?= $banner->title() ?></h1>
              <? if ($banner->subtitle()): ?>
								<h2 class="hero"><?= $banner->subtitle() ?></h2>
              <? endif ?>
            </div>
          </div>
        </div>
      </div>
      <p class="mt-4 mt-lg-5">
        <? if ($banner->button_action() == 'video'): ?>
          <? if ($banner->button_video_source() == 'embed'): ?>
            <a role="button" class="btn-red text-decoration-none" id="hero-video-btn" href="#" data-bs-toggle="modal" data-bs-target="#hero-video-modal">
          <? else: ?>
            <a role="button" class="btn-red text-decoration-none" id="hero-video-btn" href="#" data-bs-toggle="modal" data-bs-target="#hero-video-modal" data-src="<?= $banner->button_video_upload() ?>" >
          <? endif ?>
              <span class="hero-play"><? require Asset::path('images/icons/play.svg') ?></span>
              &nbsp;
              <?= $banner->button_video_label() ?>
            </a>
        <? else: ?>
					<a class="btn-red text-decoration-none" href="<?= $banner->button_link()['url'] ?>" <? if ($banner->button_link()['target']): ?> target="<?= $banner->button_link()['target'] ?>" <? endif ?>>
						<?= $banner->button_link()['title'] ?>
					</a>
        <? endif ?>
      </p>
    </div>
  </div>
</div>
<? if ($banner->button_action() == 'video'): ?>
<div class="modal fade hero-modal" id="hero-video-modal" tabindex="-1" role="dialog" aria-labelledby="hero-video-title" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content p-0 border-0">
      <div class="modal-header px-0 py-2 border-0">
        <a role="button" class="ms-auto btn-red hero-modal-close text-decoration-none" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">Close</span>
        </a>
      </div>
      <div class="modal-body p-0">
        <div id="hero-frame-wrapper" class="ratio ratio-16x9">
          <? if ($banner->button_video_source() == 'embed'): ?>
            <?= $banner->button_video_embed() ?>
          <? else: ?>
            <iframe id="hero-uploaded-video"></iframe>
          <? endif ?>
        </div>
      </div>
    </div>
  </div>
</div>
<? endif ?>
