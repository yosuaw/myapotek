<div class="modal-header">
    <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Edit Category</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div style="padding: 15px">
            <div class="alert alert-danger" style="display: none">
                <ul>

                </ul>
            </div>
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Name</label>
                <input class="form-control" id="catName" value="{{ $data->name }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="catDesc" rows="5" style="resize: none">{{ $data->description }}</textarea>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{ $data->id }})">Update</button>
    <a class="btn btn-default" data-dismiss="modal">Cancel</a>
</div>