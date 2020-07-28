<template>
   <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <a href="/home" class="text-decoration-none lead">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-left-short" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.854 4.646a.5.5 0 0 1 0 .708L5.207 8l2.647 2.646a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M4.5 8a.5.5 0 0 1 .5-.5h6.5a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            Back to Templates
                        </a>
                    </div>
                    <div class="position-relative">
                        <input placeholder="Title" class="form-control" v-model="tempTitle">
                    </div>
                    <div>
                        <button v-on:click="updateTemplate()" class="btn btn-primary">Save Template</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-3 mt-4">
            <div class="col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center border p-4">
                    <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-box mb-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5 8 5.961 14.154 3.5 8.186 1.113zM15 4.239l-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                    </svg>
                    <span>Template ID: {{id}}</span>
                    <small>Click to copy template ID</small>
                </div>
            </div>
        </div>
        <div v-for="(message) in messages" v-bind:key="message.id" v-bind:title="message.title" @click="editTextModal(message)" class="row justify-content-center py-3">
            <div class="col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center border p-4">
                    <svg v-if="message.type === 'text'" width="24" height="24" viewBox="0 0 16 16" class="bi bi-chat mb-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                    </svg>
                    <svg v-else-if="message.type === 'rich'" width="24" height="24" viewBox="0 0 16 16" class="bi bi-card-image mx-auto mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                        <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                        <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                    </svg>
                    <svg v-else-if="message.type === 'video'" width="24" height="24" viewBox="0 0 16 16" class="bi bi-film mx-auto mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
                    </svg>
                    <span>{{message.title}}</span>
                    <small class="text-capitalize">{{message.type}} message</small>
                </div>
            </div>
        </div>
        <div class="row justify-content-center py-3">
            <div class="col-md-4">
                <div class="d-flex flex-column justify-content-center align-items-center border p-4">
                    <span>Click to Add Template</span>
                    <button class="p-2 rounded-circle border btn mt-4" data-toggle="modal" data-target="#messageTemplateModal">
                        <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- START:Message Template Modal -->
        <div class="modal fade bd-example-modal-lg" id="messageTemplateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header align-items-center py-4">
                        <h5 class="modal-title" id="exampleModalLabel">Message Templates</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body py-5 px-4">
                        <div>
                            <h2 class="mb-4">Select a message template type</h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" @click="richModal">
                                    <svg width="48" height="48" viewBox="0 0 16 16" class="bi bi-card-image mx-auto mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                        <path d="M10.648 7.646a.5.5 0 0 1 .577-.093L15.002 9.5V13h-14v-1l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71z"/>
                                        <path fill-rule="evenodd" d="M4.502 7a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"/>
                                    </svg>
                                    <h5 class="mx-auto">Rich</h5>
                                </div>
                                <p>
                                    Use rich messages to send out interactive content 
                                    featuring images you've selected.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" @click="createTextModal">
                                    <svg width="48" height="48" viewBox="0 0 16 16" class="bi bi-chat mx-auto mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                    </svg>
                                    <h5 class="mx-auto">Text</h5>
                                </div>
                                <p>
                                    Use text messages to send a simple text based message.
                                </p>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" @click="videoModal">
                                    <svg width="48" height="48" viewBox="0 0 16 16" class="bi bi-film mx-auto mb-3" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M0 1a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm4 0h8v6H4V1zm8 8H4v6h8V9zM1 1h2v2H1V1zm2 3H1v2h2V4zM1 7h2v2H1V7zm2 3H1v2h2v-2zm-2 3h2v2H1v-2zM15 1h-2v2h2V1zm-2 3h2v2h-2V4zm2 3h-2v2h2V7zm-2 3h2v2h-2v-2zm2 3h-2v2h2v-2z"/>
                                    </svg>
                                    <h5 class="mx-auto">Video</h5>
                                </div>
                                <p>
                                    Use multimedia messages to send a video.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END:Message Template Modal -->
        <!-- START:Text Modal -->
        <div class="modal fade bd-example-modal-lg" id="textModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button v-if="this.isEdit === false" v-on:click="addMesssage" class="btn btn-primary">Add</button>
                            <button v-if="this.isDelete === true" v-on:click="deleteMessage(txtmsg.id)" class="btn btn-primary">Delete</button>
                            <button v-if="this.isEdit === true" v-on:click="updateMessage(txtmsg.id)" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    <div class="modal-body px-4">
                        <div class="py-2">
                            <h2 class="m-0">Text message</h2>
                            <p class="m-0">Use text messages to send a simple text based message.</p>
                        </div>
                        <hr class="mb-4"/>
                        <form>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" v-model="txtmsg.title">
                                <small class="form-text text-muted">The message title is shown in push notifications and in the user's chat list.</small>
                            </div>
                            <div class="form-group">
                                <label>Text</label>
                                <textarea class="form-control" rows="5" v-model="txtmsg.text"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END:Text Modal -->
        <!-- START:Video Modal -->
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
                            <button v-if="this.isEdit === false" v-on:click="addMesssage" class="btn btn-primary">Add</button>
                            <button v-else-if="this.isEdit === true" v-on:click="deleteMessage(txtmsg.id)" class="btn btn-primary">Delete</button>
                            <button v-if="this.isDelete === true" v-on:click="updateMessage(txtmsg.id)" class="btn btn-primary">Update</button>
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
                                <input type="text" class="form-control" v-model="txtmsg.title">
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
        <!-- END:Video Modal -->
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['id'],
        data () {
            return {
                tempTitle: '',
                messages: [],
                txtmsg: [],
                isEdit: false,
                isDelete: false,
                // video
                image: null,
                imagePreview: null,
                video: null,
                videoPreview: null,
            }
        },
        mounted () {
            this.getTemplate()
        },
        methods: {
            // modals
            createTextModal(message) {
                this.clearFields(message)
                $('#textModal').modal('show');
            },
            editTextModal(message) {
                this.editMessage(message)
                if(message.type === 'text') {
                    $('#textModal').modal('show');
                } else if(message.type === 'video') {
                    $('#videoModal').modal('show');
                } else {
                    $('#richModal').modal('show');
                }
            },

            richModal() {
                $('#richModal').modal('show');  
            },

            videoModal() {
                $('#videoModal').modal('show');  
            },

            // get template
            getTemplate() {
                axios({ method: 'GET', url: '/api/template/'+this.id }).then(
                    result => {
                        console.log(result.data);
                        var template  = result.data.template
                        this.tempTitle = template.title
                        this.messages = result.data.message
                    },
                    error => {
                        console.error(error)
                    }
                )
            },
            // update template
            updateTemplate() {
                axios.put('/api/template/'+this.id,
                    { title: this.tempTitle}
                ).then((res) => {
                    this.getTemplate()
                    location.href = '/home';
                }).catch((err) => {
                    console.log(err)
                })
            },
            // tool for clearing fields
            clearFields(message) {
                this.txtmsg = []
                this.isEdit = false
                this.isDelete = false
            },
            // add text message
            addMesssage() {
                axios.post('/api/message',
                    { title: this.txtmsg.title, text: this.txtmsg.text, type: 'text', template_id: this.id}
                ).then((res) => {
                    console.log(res);
                    this.getTemplate()
                    $('.modal').modal('hide');
                }).catch((err) => {
                    console.log(err)
                })
            },
            // setting data for update
            editMessage(message) {
                this.txtmsg.id = message.id
                this.txtmsg.title = message.title
                this.txtmsg.text = message.text
                this.txtmsg.type = message.type
                this.isEdit = true
                this.isDelete = true
            },
            // update text message
            updateMessage(id) {
                axios.put(`/api/message/${id}`,
                    { title: this.txtmsg.title, text: this.txtmsg.text, type: 'text', template_id: this.id}
                ).then((res) => {
                    this.getTemplate()
                    $('.modal').modal('hide');
                }).catch((err) => {
                    console.log(err)
                })
            },
            // delete text message
            deleteMessage (id) {
                axios.delete(`/api/message/${id}`).then((res) => {
                    this.getTemplate()
                    $('.modal').modal('hide');
                    console.log(res)
                }).catch((err) => {
                    console.log(err)
                })
            },

            // video message
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