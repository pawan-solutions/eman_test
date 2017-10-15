<!-- <div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Passport Movement Log</h3>
        </div>
        </div>
    </div>
 -->

<?php //echo $this->Custom->app_notification_count(); die; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.highcharts-point').click(function(){
        });
    });

</script>
<?php include('report_links.ctp');?>
<div class="container wrapper">
    <section class="form-cnt">

        
        <div class="row"></div>

        
        <div class="row">
           <div class="col-lg-6 col-sm-6 col-xs-12">
            <div id="container" style="width: 550px; height: 400px; margin: 0 auto"></div>
            <div class="white-bg"></div>            
           </div>
           <div class="col-lg-6 col-sm-6 col-xs-12">
            <div id="container2" style="width: 550px; height: 400px; margin: 0 auto"></div>
            <div class="white-bg"></div>            
           </div>
        </div>
    </section>
    <hr>
</div>

<?php 
$passport_released_gro    = !empty($passport_released_gro)? count($passport_released_gro):0;
$passport_received_gro    = !empty($passport_received_gro)? count($passport_received_gro):0;
$passport_released_hr     = !empty($passport_released_hr)? count($passport_released_hr):0;
$passport_received_hr     = !empty($passport_received_hr)? count($passport_received_hr):0;

$zajel_pending   = !empty($zajel_pending)? count($zajel_pending):0;
echo $this->Html->script(array("new/highcharts"));
?>
<script>
$(document).ready(function() {
var stickyNavTop = $('.navbar-fixed-top').offset().top;
var stickyNav = function(){
var scrollTop = $(window).scrollTop();
if (scrollTop > stickyNavTop ) { 
$('.navbar-fixed-top').addClass('sticky');
} else {
$('.navbar-fixed-top').removeClass('sticky'); 
}
if (scrollTop > 500){ 
$('.at4-share-outer').css('display' , 'block');
}else{
$('.at4-share-outer').css('display' , 'none'); 
}
};
stickyNav();
$(window).scroll(function() {
stickyNav();
});
});
</script>
<script>
$(function () {
    var page_url = "<?php echo SITE_URL; ?>applications/everything";
    var colors = Highcharts.getOptions().colors,
        categories = ['Passport Released to GR', 'Passport Receieved By GR', 
        'Passport Released to HR', "Passport Receieved By HR"],
        data = [{
            y: 0,
            color: colors[11],
            drilldown: {
                name: 'Passport Released to GR',
                categories: ['<a href="'+page_url+'/passport_released_gro" target="_blank" class="gp-link">Passport Released<br/> to GR</a>    '],
                data: [<?php echo $passport_released_gro; ?>],
                color: colors[11]
            }
        }, {
            y: 0,
            color: colors[10],
            drilldown: {
                name: 'Passport Receieved By GR',
                categories: ['<a href="'+page_url+'/passport_received_gro" target="_blank" class="gp-link">Passport Receieved<br/> By GR</a>'],
                data: [<?php echo $passport_received_gro; ?>],
                color: colors[10]
            }
        },
        {
            y: 0,
            color: colors[8],
            drilldown: {
                name: 'Passport Released to HR',
                categories: ['<a href="'+page_url+'/passport_released_hr" target="_blank" class="gp-link">Passport Released<br/> to HR</a>    '],
                data: [<?php echo $passport_released_hr; ?>],
                color: colors[8]
            }
        }, {
            y: 0,
            color: colors[7],
            drilldown: {
                name: 'Passport Receieved By HR',
                categories: ['<a href="'+page_url+'/passport_received_hr" target="_blank" class="gp-link">Passport Receieved<br/> By HR</a>'],
                data: [<?php echo $passport_received_hr; ?>],
                color: colors[7]
            }
        }],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Passport Movement Between<br/> <b>HR & GR</b>'
        },
        subtitle: {
            text: ''
        },
        yAxis: {
            title: {
                text: 'Emandoobi Chart'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        series: [{
            name: 'Browsers',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: '#000000',
                distance: -30
            }
        }, {
            name: 'Total',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
                formatter: function () {
                    // display only if larger than 1
                    
                    return this.y > 0 ? '<b>' + this.point.name + ':</b> ' + this.y + '' : null;
                }
            }
        }]
    });
});
</script>
<script>
$(function () {
    var page_url = "#";//"<?php echo SITE_URL; ?>applications/everything";
    
    var colors = Highcharts.getOptions().colors,
        categories = ['Zajel - Pending'],
        data = [{
            y: 0,
            color: colors[13],
            drilldown: {
                name: 'Zajel - Pending',
                categories: ['<a href="'+page_url+'/zajel_pending" target="_blank" class="gp-link">Zajel - Pending</a>'],
                data: [<?php echo $zajel_pending; ?>],
                color: colors[13]
            }
        }],
        browserData = [],
        versionsData = [],
        i,
        j,
        dataLen = data.length,
        drillDataLen,
        brightness;


    // Build the data arrays
    for (i = 0; i < dataLen; i += 1) {

        // add browser data
        browserData.push({
            name: categories[i],
            y: data[i].y,
            color: data[i].color
        });

        // add version data
        drillDataLen = data[i].drilldown.data.length;
        for (j = 0; j < drillDataLen; j += 1) {
            brightness = 0.2 - (j / drillDataLen) / 5;
            versionsData.push({
                name: data[i].drilldown.categories[j],
                y: data[i].drilldown.data[j],
                color: Highcharts.Color(data[i].color).brighten(brightness).get()
            });
        }
    }

    // Create the chart
    Highcharts.chart('container2', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Passport Movement<br/> <b> GR Operation</b>'
        },
        subtitle: {
            text: ''
        },
        yAxis: {
            title: {
                text: 'Emandoobi Chart'
            }
        },
        plotOptions: {
            pie: {
                shadow: false,
                center: ['50%', '50%']
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        series: [{
            name: 'Browsers',
            data: browserData,
            size: '60%',
            dataLabels: {
                formatter: function () {
                    return this.y > 5 ? this.point.name : null;
                },
                color: '#000000',
                distance: -30
            }
        }, {
            name: 'Total',
            data: versionsData,
            size: '80%',
            innerSize: '60%',
            dataLabels: {
                formatter: function () {
                    // display only if larger than 1
                    return this.y > 0 ? '<b>' + this.point.name + ':</b> ' + this.y + '' : null;
                }
            }
        }]
    });
});
</script>