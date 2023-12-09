
<script src="{{asset('assets/global/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/admin/js/nicEdit.js')}}"></script>
<script src="{{asset('assets/global/js/select2.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('assets/global/css/iziToast.min.css')}}">
<script src="{{asset('assets/global/js/iziToast.min.js')}}"></script>
<script src="{{asset('assets/global/js/iziToast.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js')}}"></script>
<script src="{{asset('assets/admin/js/app.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/admin/js/vendor/chart.js.2.8.0.js')}}"></script>
<script src="https://script.viserlab.com/bisurv/assets/admin/js/vendor/datepicker.min.js"></script>
<script src="https://script.viserlab.com/bisurv/assets/admin/js/vendor/datepicker.en.js"></script>

@yield('script')

<script>
    "use strict";
    (function($){
        bkLib.onDomLoaded(function() {
            $( ".nicEdit" ).each(function( index ) {
                $(this).attr("id","nicEditor"+index);
                new nicEditor({fullPanel : false}).panelInstance('nicEditor'+index,{hasPanel : true});
            });
        });

        $(document).on('mouseover ', '.nicEdit-main,.nicEdit-panelContain',function(){
            $('.nicEdit-main').focus();
        });
    })(jQuery);
</script>

    <script>
        "use strict";
        (function ($) {
            $('.iconPicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: false,
                searchText: 'Search icon',
                selectedClass: 'btn-success',
                unselectedClass: ''
            }).on('change', function (e) {
                $(this).parent().siblings('.icon').val(`<i class="${e.icon}"></i>`);
            });
        })(jQuery);
    </script>

<script>
    'use strict';
    (function ($) {
        if (!$('.datepicker-here').val()) {
            $('.datepicker-here').datepicker({
                dateFormat: 'dd/mm/yy',
            });
        }
    })(jQuery);
</script>

      <script>
         'use strict';
         // apex-bar-chart js
         var options = {
             series: [{
                 name: 'Total Deposit',
                 data: [
                                         7500,
                                         0,
                                         0,
                                         10000,
                                         100,
                                         0,
                                         0,
                                         5,
                                         0,
                                         0,
                                         10100,
                                         0,
                                     ]
             }, {
                 name: 'Total Withdraw',
                 data: [
                                         18,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                         0,
                                     ]
             }],
             chart: {
                 type: 'bar',
                 height: 400,
                 toolbar: {
                     show: false
                 }
             },
             plotOptions: {
                 bar: {
                     horizontal: false,
                     columnWidth: '50%',
                     endingShape: 'rounded'
                 },
             },
             dataLabels: {
                 enabled: true
             },
             stroke: {
                 show: true,
                 width: 2,
                 colors: ['transparent']
             },
             xaxis: {
                 categories: ["March","April","May","June","July","August","September","October","November","December","January","February"],
             },
             yaxis: {
                 title: {
                     text: "$",
                     style: {
                         color: '#7c97bb'
                     }
                 }
             },
             grid: {
                 xaxis: {
                     lines: {
                         show: false
                     }
                 },
                 yaxis: {
                     lines: {
                         show: false
                     }
                 },
             },
             fill: {
                 opacity: 1
             },
             tooltip: {
                 y: {
                     formatter: function (val) {
                         return "$" + val + " "
                     }
                 }
             }
         };
         
         var chart = new ApexCharts(document.querySelector("#apex-bar-chart"), options);
         chart.render();
         
         // apex-line chart
         var options = {
             chart: {
                 height: 430,
                 type: "area",
                 toolbar: {
                     show: false
                 },
                 dropShadow: {
                     enabled: true,
                     enabledSeries: [0],
                     top: -2,
                     left: 0,
                     blur: 10,
                     opacity: 0.08
                 },
                 animations: {
                     enabled: true,
                     easing: 'linear',
                     dynamicAnimation: {
                         speed: 1000
                     }
                 },
             },
             dataLabels: {
                 enabled: false
             },
             series: [
                 {
                     name: "Series 1",
                     data: []                }
             ],
             fill: {
                 type: "gradient",
                 gradient: {
                     shadeIntensity: 1,
                     opacityFrom: 0.7,
                     opacityTo: 0.9,
                     stops: [0, 90, 100]
                 }
             },
             xaxis: {
                 categories: []            },
             grid: {
                 padding: {
                     left: 5,
                     right: 5
                 },
                 xaxis: {
                     lines: {
                         show: false
                     }
                 },
                 yaxis: {
                     lines: {
                         show: false
                     }
                 },
             },
         };
         
         var chart = new ApexCharts(document.querySelector("#withdraw-line"), options);
         
         chart.render();
         
         var ctx = document.getElementById('userBrowserChart');
         var myChart = new Chart(ctx, {
             type: 'doughnut',
             data: {
                 labels: ["Chrome","Handheld Browser"],
                 datasets: [{
                     data: [10,1],
                     backgroundColor: [
                         '#ff7675',
                         '#6c5ce7',
                         '#ffa62b',
                         '#ffeaa7',
                         '#D980FA',
                         '#fccbcb',
                         '#45aaf2',
                         '#05dfd7',
                         '#FF00F6',
                         '#1e90ff',
                         '#2ed573',
                         '#eccc68',
                         '#ff5200',
                         '#cd84f1',
                         '#7efff5',
                         '#7158e2',
                         '#fff200',
                         '#ff9ff3',
                         '#08ffc8',
                         '#3742fa',
                         '#1089ff',
                         '#70FF61',
                         '#bf9fee',
                         '#574b90'
                     ],
                     borderColor: [
                         'rgba(231, 80, 90, 0.75)'
                     ],
                     borderWidth: 0,
         
                 }]
             },
             options: {
                 aspectRatio: 1,
                 responsive: true,
                 maintainAspectRatio: true,
                 elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                 },
                 scales: {
                     xAxes: [{
                         display: false
                     }],
                     yAxes: [{
                         display: false
                     }]
                 },
                 legend: {
                     display: false,
                 }
             }
         });
         
         
         var ctx = document.getElementById('userOsChart');
         var myChart = new Chart(ctx, {
             type: 'doughnut',
             data: {
                 labels: ["Mac OS X","Android","Windows 10"],
                 datasets: [{
                     data: [2,1,8],
                     backgroundColor: [
                         '#ff7675',
                         '#6c5ce7',
                         '#ffa62b',
                         '#ffeaa7',
                         '#D980FA',
                         '#fccbcb',
                         '#45aaf2',
                         '#05dfd7',
                         '#FF00F6',
                         '#1e90ff',
                         '#2ed573',
                         '#eccc68',
                         '#ff5200',
                         '#cd84f1',
                         '#7efff5',
                         '#7158e2',
                         '#fff200',
                         '#ff9ff3',
                         '#08ffc8',
                         '#3742fa',
                         '#1089ff',
                         '#70FF61',
                         '#bf9fee',
                         '#574b90'
                     ],
                     borderColor: [
                         'rgba(0, 0, 0, 0.05)'
                     ],
                     borderWidth: 0,
         
                 }]
             },
             options: {
                 aspectRatio: 1,
                 responsive: true,
                 elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                 },
                 scales: {
                     xAxes: [{
                         display: false
                     }],
                     yAxes: [{
                         display: false
                     }]
                 },
                 legend: {
                     display: false,
                 }
             },
         });
         
         
         // Donut chart
         var ctx = document.getElementById('userCountryChart');
         var myChart = new Chart(ctx, {
             type: 'doughnut',
             data: {
                 labels: ["India","Uganda","Pakistan","China","Ukraine"],
                 datasets: [{
                     data: [4,1,1,1,1],
                     backgroundColor: [
                         '#ff7675',
                         '#6c5ce7',
                         '#ffa62b',
                         '#ffeaa7',
                         '#D980FA',
                         '#fccbcb',
                         '#45aaf2',
                         '#05dfd7',
                         '#FF00F6',
                         '#1e90ff',
                         '#2ed573',
                         '#eccc68',
                         '#ff5200',
                         '#cd84f1',
                         '#7efff5',
                         '#7158e2',
                         '#fff200',
                         '#ff9ff3',
                         '#08ffc8',
                         '#3742fa',
                         '#1089ff',
                         '#70FF61',
                         '#bf9fee',
                         '#574b90'
                     ],
                     borderColor: [
                         'rgba(231, 80, 90, 0.75)'
                     ],
                     borderWidth: 0,
         
                 }]
             },
             options: {
                 aspectRatio: 1,
                 responsive: true,
                 elements: {
                     line: {
                         tension: 0 // disables bezier curves
                     }
                 },
                 scales: {
                     xAxes: [{
                         display: false
                     }],
                     yAxes: [{
                         display: false
                     }]
                 },
                 legend: {
                     display: false,
                 }
             }
         });
      </script>
   </body>
</html>