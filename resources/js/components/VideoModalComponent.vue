<template>
    <div class="modal fade bd-example-modal-lg" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-between align-items-center py-4">
                    <div class="lead" data-dismiss="modal" aria-label="Close">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        Choose different message type
                    </div>
                    <div>
                        <a href="/template/create" class="btn btn-primary">Add</a>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <div class="py-2">
                        <h2 class="m-0">Video Message</h2>
                        <p class="m-0">Use this template to send a video.</p>
                    </div>
                    <hr class="mb-4"/>
                    <form>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title">
                            <small class="form-text text-muted"> The message title is shown in push notifications and in the user's chat list.</small>
                        </div>
                        <div>
                            <p>Message Settings</p>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <p>Video</p>
                                    <video class="w-100" height="180" controls>
                                        <source :src="videoPreview" type="video/mp4">
                                    </video>
                                    <small>
                                        A very wide or tall video may be cropped when played in some environments.
                                    </small>
                                    <div class="my-3">
                                        <div @click="$refs.vidFile.click()" class="btn rounded-sm bg-light border-dark">Upload Video</div>
                                        <input type="file" accept="video/mp4" class="d-none" ref="vidFile" @change="videoSelected">
                                    </div>
                                    <small class="d-block">Maximum duration: 1 minute</small>
                                    <small class="d-block">Maximum file Size: 10 MB</small>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <p>Video Image Preview</p>
                                    <div class="w-100 bg-light mb-1" style="height:180px;border:2px dashed #e2e8f0;">
                                        <img class="w-100" :src="imagePreview" style="height:176px;">
                                    </div>
                                    <small>
                                        The image must equal or below 1MB of file size with a resolution of at least 240x240
                                    </small>
                                    <div class="my-3">
                                        <div @click="$refs.imgFile.click()" class="btn rounded-sm bg-light border-dark">Upload Image</div>
                                        <input type="file" accept="image/png, image/jpeg" class="d-none" ref="imgFile" @change="imageSelected">
                                    </div>
                                    <small class="d-block">Maximum resolution: 240x240</small>
                                    <small class="d-block">Maximum file Size: 1 MB</small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                image: null,
                imagePreview: null,
                video: null,
                videoPreview: null,
            }
        },
        methods: {
            imageSelected(e){
                const file = e.target.files[0];
                this.imagePreview = URL.createObjectURL(file);
            },
            videoSelected(e){
                const file = e.target.files[0];
                this.videoPreview = URL.createObjectURL(file);
            },
        }
    }
</script>