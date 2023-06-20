<div class="modal-header">
    <h4 class="modal-title" style="text-align: center; background-color: silver; border-radius: 15px 50px 30px; padding: 15px;">Edit Medicine</h4>
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
                <label>Generic Name</label>
                <input id="medName" class="form-control" value="{{ $data -> generic_name }}">
            </div>
            <div class="form-group">
                <label>Form</label>
                <input id="medForm" class="form-control" value="{{ $data -> form }}">
            </div>
            <div class="form-group">
                <label>Restriction Formula</label>
                <input id="medRestrictionFormula" class="form-control" value="{{ $data -> restriction_formula }}">
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="number" id="medPrice" class="form-control" value="{{ $data -> price }}">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea id="medDescription" class="form-control" rows="5" style="resize: none">{{ $data->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select id="medCategory" class="form-control">
                    @foreach($category as $c) 
                        @if(old('category_id', $data -> category_id) == $c -> id )
                            <option value="{{ $c -> id }}" selected>{{ $c -> name }}</option>
                        @else
                            <option value="{{ $c -> id }}">{{ $c -> name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Faskes</label>
                <div class="checkbox-list">
                    <label class="checkbox-inline" id="faskes1">
                    <input type="checkbox" id="medFaskes1" value="1" {{ ($data -> faskes1)? 'checked' : '' }}> Faskes 1 </label>
                    <label class="checkbox-inline" id="faskes2">
                    <input type="checkbox" id="medFaskes2" value="1" {{ ($data -> faskes2)? 'checked' : '' }}> Faskes 2 </label>
                    <label class="checkbox-inline" id="faskes3">
                    <input type="checkbox" id="medFaskes3" value="1" {{ ($data -> faskes3)? 'checked' : '' }}> Faskes 3 </label>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" onclick='saveDataUpdateTD({{ $data ->id }})'>Update</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
</div>