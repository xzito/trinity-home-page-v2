class Video {
  constructor(options = {}) {
    Object.assign(this, Object.assign(Object.seal({
      button: document.querySelector('#hero-video-btn'),
      modal: document.querySelector('#hero-video-modal'),
      embed: document.querySelector('#hero-embedded-video'),
      queryString: 'autoplay=1&controls=0&modestbranding=1&rel=0&showinfo=0',
    }), options));
  }

  get source() {
    return this.button.dataset.src;
  }

  willUpdate() {
    return (this.embed ? true : false);
  }

  updateSource(newSource) {
    this.embed.src = newSource;
  }
}

export default Video;
