import Video from '../components/video';

class Home {
  constructor() {
    Object.assign(this, Object.assign(Object.seal({
      video: new Video(),
    })));
  }

  showVideoListener() {
    if (this.video.willUpdate()) {
      $(this.video.modal).on('shown.bs.modal', () => {
        this.video.updateSource(`${this.video.source}?${this.video.queryString}`);
      });
    }
  }

  hideVideoListener() {
    if (this.video.willUpdate()) {
      $(this.video.modal).on('hide.bs.modal', () => {
        this.video.updateSource(this.video.source);
      });
    }
  }
}

export default {
  whenReady() {
    const home = new Home();

    home.showVideoListener();
    home.hideVideoListener();
  },
  whenLoaded() {
  },
}
