<template>
  <div>
    <button @click="startRecording" :disabled="recording">Start Recording</button>
    <button @click="stopRecording" :disabled="!recording">Stop Recording</button>
    <input type="file" @change="uploadFile" ref="fileInput" style="display: none">
  </div>
</template>

<script>
import { ref } from 'vue';
import { Head, Link, useForm  } from '@inertiajs/vue3';
export default {
  data() {
    return {
      recording: false,
      recorder: null,
      audioBlob: null,
    };
  },
  methods: {
    startRecording() {
      this.recording = true;
      navigator.mediaDevices.getUserMedia({ audio: true })
        .then((stream) => {
          this.recorder = new Recorder(stream);
          this.recorder.start();
        })
        .catch((error) => {
          console.error('Error starting recording:', error);
          this.recording = false;
        });
    },
    stopRecording() {
      this.recording = false;
      this.recorder.stop();
      this.recorder.exportWAV((blob) => {
        this.audioBlob = blob;
      });
    },
    uploadFile() {
      const file = this.$refs.fileInput.files[0];
      const formData = new FormData();
      formData.append('audio', file);
      Inertia.post('/upload-audio', formData);
    },
  },
};
</script>
