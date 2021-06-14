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
    this.source = this.buildSource();
  }

  buildSource() {
    return (this.uploaded() ? this.uploadedSource() : this.embeddedSource());
  }

  uploaded() {
    return (this.upload !== null ? true : false);
  }

  embedded() {
    return !this.uploaded();
  }

  uploadedSource() {
    return `${this.button.dataset.src}`;
  }

  embeddedSource() {
    return this.frame.src;
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
