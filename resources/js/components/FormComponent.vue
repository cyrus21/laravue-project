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
                        <input placeholder="Title" class="form-control" v-model="title">
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
        <div v-for="(message) in messages" v-bind:key="message.id" v-bind:title="message.title" class="row justify-content-center py-3">
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
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['id'],
        data () {
            return {
                title: '',
                messages: []
            }
        },
        mounted () {
            this.getTemplate()
        },
        methods: {
            getTemplate() {
                axios({ method: 'GET', url: '/api/template/'+this.id }).then(
                    result => {
                        console.log(result.data);
                        var template  = result.data.template
                        this.title = template.title
                        this.messages = result.data.message
                    },
                    error => {
                        console.error(error)
                    }
                )
            },

            updateTemplate() {
                axios.put('/api/template/'+this.id,
                    { title: this.title}
                ).then((res) => {
                    this.getTemplate()
                    location.href = '/home';
                }).catch((err) => {
                    console.log(err)
                })
            }
        }
    }
</script>