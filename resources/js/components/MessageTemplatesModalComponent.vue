<template>
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
                            <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" data-toggle="modal" data-target="#richModal">
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
                            <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" data-toggle="modal" data-target="#textModal">
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
                            <div class="d-flex flex-column justify-content-center border border-primary rounded-lg p-5 mb-2" data-toggle="modal" data-target="#videoModal">
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
</template>