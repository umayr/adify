<form ng-submit="createAd()">
    <div class="modal fade" id="createAdModal" tabindex="-1" role="dialog" aria-labelledby="createAd"
         aria-hidden="true" bs-modal>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title">Create a new Ad</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input ng-model="forms.create.name"
                                       type="text" class="form-control"
                                       id="name" name="name"
                                       placeholder="Enter name" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="size">Size</label>
                                <select name="size" ng-model="forms.create.size"
                                        id="size" class="form-control">
                                    <option value="">Select Any size</option>
                                    <option ng-repeat="size in sizes" value="@{{size}}">@{{size}}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="code">Code</label>
                                <textarea ng-model="forms.create.code"
                                          class="form-control" name="code"
                                          id="code" cols="30"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>