<script type="text/javascript">
	$('.daterange').daterangepicker({
		locale: {
			format: 'YYYY-MM-DD',
		},
		drops: 'up',
	}, function(start, end, label) {
			console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
	});

	//change the selected date range of that picker
	@if(isset($calendarevent))
		$('.daterange').data('daterangepicker').setStartDate(moment("{{ $calendarevent->start->toDateString() }}"));
		$('.daterange').data('daterangepicker').setEndDate(moment("{{ $calendarevent->end->toDateString() }}"));
	@else 
		$('.daterange').data('daterangepicker').setStartDate(moment());
		$('.daterange').data('daterangepicker').setEndDate(moment());	
	@endif
</script>