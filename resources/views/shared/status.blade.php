
@if (session('error'))
    
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Error</strong> Failed to add number. Please try again!
    </div>
@elseif (session('success'))
    
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Success</strong> Number added successfully.
    </div>

@endif
