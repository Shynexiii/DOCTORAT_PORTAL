@if (count($errors) > 0)
    <div class="alert alert-danger col-md mx-auto">
        <p><strong>Whoops!</strong> There were some problems with your input.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
