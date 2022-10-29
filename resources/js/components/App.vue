<template>
    <div>
        <div class="mt-3">
            <file-pond
                name="image"
                ref="pond"
                label-idle="Click to Choose image, or Drag Here..."
                @init="handleFilePondInit"
                accepted-file-types="image/jpg, image/jpeg, image/png"
                @processfile="handleProcessesFile"
                allow-multiple="true"
                max-file-size="1MB"
            />
        </div>
        <div class="mt-8 mb-24">
            <h3 class="text-2xl font-medium text-center">
                Image Gallery
            </h3>
            <div class="grid grid-cols-3 justify-evenly mt-4">
                <div v-for="image of images">
                    <img :src="'/storage/images/'+image">
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import vueFilePond, {setOptions} from 'vue-filepond';
// Import plugins
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';
import FilePondPluginFileValidateSize from 'filepond-plugin-file-validate-size';
import FilePondPluginImagePreview from 'filepond-plugin-image-preview';

// Import styles
import 'filepond/dist/filepond.min.css';
import 'filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css';
let serverMessages = {};

setOptions({
    server:{
        process:{
            url: '/upload',
            onerror:(response)=>{
                serverMessages = JSON.parse(response)
            },
            headers:{
                'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf_token"]').content
            }
        }
    },
    labelFileProcessingError:()=>{
        return serverMessages.error
    }

});

const FilePond = vueFilePond(FilePondPluginFileValidateType, FilePondPluginImagePreview, FilePondPluginFileValidateSize);

export default {
    components: {
        FilePond,
    },
    data()
    {
      return{
          images:[]
      }
    },
    methods:{
        handleFilePondInit()
        {
            console.log('Filepond Initialized')
            console.log('Filepond Object :', this.$refs.pond)
        },
        handleProcessesFile(error, file){
            if (error){
                console.error(error)
                return;
            }
            this.images.unshift(file.serverId)
        }
    },
    mounted() {
        axios.get('/images')
            .then(response=>{
                this.images = response.data
            })
            .catch(error=>{
                console.error(error)
            })
    }
}
</script>
