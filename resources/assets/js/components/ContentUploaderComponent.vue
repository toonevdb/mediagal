<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div id="contentUploader" class="dropzone"></div>
            </div>
        </div>
    </div>
</template>

<script>
    import Dropzone from 'dropzone'
    
    export default {
        props: ['url', 'csrfToken'],
        
        mounted() {
            Dropzone.options.contentUploader = false;
            
            console.info('url', this.url);
            var params = {
                url: this.url,
                paramName: 'content',
                headers: {'X-CSRF-TOKEN': this.csrfToken}
            }

            var myDropzone = new Dropzone("div#contentUploader", params)
            console.log('Component mounted.', myDropzone)
        }
    }
</script>
