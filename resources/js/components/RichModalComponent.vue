<template>
    <div class="modal fade bd-example-modal-lg" id="richModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <h2 class="m-0">Text message</h2>
                        <p class="m-0">Use text messages to send a simple text based message.</p>
                    </div>
                    <hr class="mb-4"/>
                    <form>
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title">
                            <small class="form-text text-muted">The message title is shown in push notifications and in the user's chat list.</small>
                        </div>
                        <div class="form-group">
                            <label>Text</label>
                            <textarea class="form-control" id="text" rows="5"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>