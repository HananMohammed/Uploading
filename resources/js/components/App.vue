<template>
  <div class="mt-3">
      <file-pond
          name="image"
          ref="pond"
          label-idle="Click to Choose image, or Drag Here..."
          @init="handleFilePondInit"
          accepted-file-types="image/*"
      />
  </div>

</template>

<script>
import vueFilePond, {setOptions} from 'vue-filepond';
// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.esm.js';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.esm.js';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';

setOptions({
    server:{
        process:{
            url: '/upload',
            headers:{
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
            }
        }
    }
});

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview);

export default {
    components: {
        FilePond,
    },
    methods:{
        handleFilePondInit()
        {
            console.log('Filepond Initialized')
            console.log('Filepond Object :', this.$refs.pond)
        }
    }
}
</script>
