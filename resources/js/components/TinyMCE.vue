<template>
  <textarea :id="id"></textarea>
</template>

<script>
import tinymce from 'tinymce';

export default {
  props: {
    id: {
      type: String,
      required: true,
    },
    value: {
      type: String,
      default: '',
    },
  },
  mounted() {
    tinymce.init({
      selector: `#${this.id}`,
      setup: (editor) => {
        editor.on('change', () => {
          this.$emit('input', editor.getContent());
        });
      },
      plugins: 'autolink lists link image charmap print preview',
      toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | link image',
      content_css: '//www.tiny.cloud/css/codepen.min.css',
      height: 300,
      branding: false,
    }).then(() => {
      tinymce.activeEditor.setContent(this.value);
    });
  },
  destroyed() {
    tinymce.remove(`#${this.id}`);
  },
};
</script>
