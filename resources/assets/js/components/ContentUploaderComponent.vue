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
    import {post_to_url} from '../helpers'
    
    
    export default {
        props: ['url', 'csrfToken', 'redirect'],

        mounted() {
            Dropzone.options.contentUploader = false;

            var contentList = [];
            
            var params = {
                url: this.url,
                paramName: 'content',
                headers: {'X-CSRF-TOKEN': this.csrfToken},
                success: (file, response) => {
                    if (response.success) {
                        contentList.push(response.data.content)
                    }
                },
                queuecomplete: () => {
                    var data = {
                        ids: contentList.reduce((ids, content) => {
                            ids.push(content.id)
                            return ids
                        }, []),
                        '_token': this.csrfToken
                    }
                    
                    post_to_url(this.redirect, data)
                }
            }

            var myDropzone = new Dropzone("div#contentUploader", params)
        }
    }
</script>
