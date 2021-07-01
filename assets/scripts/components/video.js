class Video {
  constructor(options = {}) {
    Object.assign(this, Object.assign(Object.seal({
      button: document.querySelector('#hero-video-btn'),
      modal: document.querySelector('#hero-video-modal'),
      frame: document.querySelector('#hero-frame-wrapper > iframe'),
      upload: document.querySelector('#hero-uploaded-video'),
    }), options));

    this.setSource();
    this.addListeners();
  }

  setSource() {
    if (!this.modal) return;
    if (!this.frame) return;

    this.source = this.buildSource();
  }

  buildSource() {
    return (this.uploaded() ? this.uploadedSource() : this.embeddedSource());
  }

  uploaded() {
    return (this.upload !== null && this.upload !== undefined);
  }

  embedded() {
    return !this.uploaded();
  }

  uploadedSource() {
    return (this.maybeUploadedSource() || '');
  }

  maybeUploadedSource() {
    return this.button && this.button.dataset && this.button.dataset.src;
  }

  embeddedSource() {
    return (this.maybeEmbeddedSource() || '');
  }

  maybeEmbeddedSource() {
    return this.frame && this.frame.src;
  }

  addListeners() {
    this.shownVideoListener();
    this.hideVideoListener();
  }

  shownVideoListener() {
    $(this.modal).on('shown.bs.modal', () => this.shown());
  }

  hideVideoListener() {
    $(this.modal).on('hide.bs.modal', () => this.hide());
  }

  shown() {
    this.updateSource(this.source);
  }

  hide() {
    this.updateSource('');
  }

  updateSource(newSource) {
    if (this.frame.src !== newSource) {
      this.frame.src = newSource;
    }
  }
}

export default Video;
