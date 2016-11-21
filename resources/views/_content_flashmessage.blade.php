@if (Session::has('message'))
   <div id="message" class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> <span class="glyphicon glyphicon-ok"></span><em> {!! session('message') !!}</em></div>
@endif
