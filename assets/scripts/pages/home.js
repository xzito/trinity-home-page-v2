import Video from '../components/video';

class Home {
  constructor() {
    Object.assign(this, Object.assign(Object.seal({
      video: new Video(),
    })));
  }
}

export default {
  whenReady() {
    new Home();
  },
  whenLoaded() {
  },
}
