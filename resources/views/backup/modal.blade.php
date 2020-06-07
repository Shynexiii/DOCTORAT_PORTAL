<!-- Modal -->
<form action="{{route('backup')}}">
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Backup all databases</h3>
                </div>
                <div class="modal-footer center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Backup</button>
                </div>
            </div>
        </div>
    </div>
</form>