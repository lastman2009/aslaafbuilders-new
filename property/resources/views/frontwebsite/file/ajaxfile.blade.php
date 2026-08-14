@if(!empty($file_listings))
@foreach($file_listings as $file_list)
<tr>
<td>{{ $file_list->title }}</td>
<td>{{ $file_list->date }}</td>
<td>{{ $file_list->area }} {{ $file_list->type }}</td>
<td>{{ $file_list->price }}</td>
<td>{{ $file_list->contact }}</td>
</tr>
@endforeach
<?php
$prefix = $price_array = '';
foreach ($file_listings as $file)
{
    $price_array .= $prefix . '' . $file->price . '';
    $prefix = ', ';
}

?>
@endif


<script type="text/javascript">
	
		Highcharts.chart('container', {
		  chart: {
		    type: 'area'
		  },
		  title: {
		  		@if(!@empty($file))
		  		    
		    text: '{{ $file->title}}'
		    @else
		    text: 'Files Rate'
		  		@endif
		  },
		  subtitle: {
		    text: 'Files'
		  },
		  xAxis: {
		    allowDecimals: false,
		    labels: {
		      formatter: function () {
		         return this.value; // clean, unformatted number for year
		      }
		    }
		  },
		  yAxis: {
		    title: {
		       text: 'File Rates'
		    },
		    labels: {
		      formatter: function () {
		        return this.value / 1000;
		      }
		    }
		  },
		  tooltip: {
		    pointFormat: '@if(!empty($file_listings)){{ $file->title}}@else No File Record @endif price <b>{point.y:,.0f}</b><br/>warheads in {point.x}'
		  },
		  plotOptions: {
		    area: {
		      pointStart: Date.UTC(2010, 0, 1),
		      marker: {
		        enabled: false,
		        symbol: 'circle',
		        radius: 22,
		        states: {
		          hover: {
		            enabled: true
		          }
		        }
		      }
		    }
		  },
		  series: [{
		    name: 'FILE',
		    data: [@if(!empty($file_listings)) {{ $price_array }} @endif
		    ]
		  }, 
		  ]
		});
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
        $(".center").slick({
        dots: true,
        infinite: true,
        centerMode: true,
        slidesToShow: 5,
        slidesToScroll: 3
      });

    });
</script>
