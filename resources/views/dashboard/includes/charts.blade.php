<script type="text/javascript" src="{{url('assets/js/plugins/visualization/echarts/echarts.js')}}"></script>
	{{-- <script type="text/javascript" src="{{url('assets/js/charts/echarts/columns_waterfalls.js')}}"></script> --}}

	<script type="text/javascript">
		/* ------------------------------------------------------------------------------
 *
 *  # Echarts - columns and waterfalls
 *
 *  Columns and waterfalls chart configurations
 *
 *  Version: 1.0
 *  Latest update: August 1, 2015
 *
 * ---------------------------------------------------------------------------- */

$(function () {

    // Set paths
    // ------------------------------

    require.config({
        paths: {
            echarts: 'assets/js/plugins/visualization/echarts'
        }
    });


    // Configuration
    // ------------------------------

    require(
        [
            'echarts',
            'echarts/theme/limitless',
            'echarts/chart/bar',
            'echarts/chart/line'
        ],


        // Charts setup
        function (ec, limitless) {


            // Initialize charts
            // ------------------------------
            var columns_timeline = ec.init(document.getElementById('columns_timeline'), limitless);



            // Charts setup
            // ------------------------------


            //
            // Timeline options
            //

            change_waterfall_options = {

                // Setup grid
                grid: {
                    x: 40,
                    x2: 40,
                    y: 35,
                    y2: 25
                },

                // Add tooltip
                tooltip: {
                    trigger: 'axis'
                },

                // Add legend
                legend: {
                    data: ['order stats']
                },

                // Enable drag recalculate
                calculable: true,

                // Horizontal axis
                xAxis: [{
                    type: 'category',
                    data: [
                    @foreach($getOrder as $get => $value) 
                      '{{ $get }}',
                    @endforeach
                    ]
                }],

                // Vertical axis
                yAxis: [{
                    type: 'value'
                }],

                // Add series
                series: [
                    {
                        name: 'order stats',
                        type: 'bar',
                        data: [
                        @foreach($getOrder as $get => $value) 
                              <?php 
                              $orderr = $value->sum('package_price');
                              $amnt = $orderr;
                              ; ?>
                              {{ $amnt }},
                          @endforeach
                        ],
                        itemStyle: {
                            normal: {
                                label: {
                                    show: true,
                                    textStyle: {
                                        fontWeight: 500
                                    }
                                }
                            }
                        },
                        markLine: {
                            data: [{type: 'average', name: 'Average'}]
                        }
                    },
                    
                ]
            };



            // Apply options
            // ------------------------------

            columns_timeline.setOption(change_waterfall_options);



            // Resize charts
            // ------------------------------

            window.onresize = function () {
                setTimeout(function () {
                    columns_timeline.resize();
                }, 200);
            }
        }
    );
});

</script>
<script type="text/javascript" src="{{url('assets/js/charts/echarts/timeline_option.js')}}"></script>