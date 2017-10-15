<div class="gride-itm row">
        <div class="background container">
        <div class="div_left col-lg-5">
            <h3 class="breadcrumb">Passport Movement Log</h3>
        </div>
        </div>
    </div>


<?php //echo $this->Custom->app_notification_count(); die; ?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.highcharts-point').click(function(){
        });
    });

</script>

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
$dispatchable_hr           = !empty($dispatchable_hr)? count($dispatchable_hr):0;
$receivable_hr          = !empty($receivable_hr)? count($receivable_hr):0;  //it is 
$receivable_gro       = !empty($receivable_gro)?count($receivable_gro):0;
$dispatchable_gro      = !empty($dispatchable_gro)?count($dispatchable_gro):0;

$f_entry_permit           = !empty($fu_report['entry_permit'])? count($fu_report['entry_permit']):0;
$f_change_status          = !empty($fu_report['change_status'])?count($fu_report['change_status']):0;
$f_entry_stamp            = !empty($fu_report['entry_stamp'])?count($fu_report['entry_stamp']):0;
$f_emirates_id            = !empty($fu_report['emirates_id'])?count($fu_report['emirates_id']):0; 

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
        categories = ['Entry Permit', 'Change Status', 'Emirates ID', 'Medical Test', 'Zajel', 'Residence Permit', "Immigration Approval", "eVision Approval"],
        data = [{
            y: 0,
            color: colors[12],
            drilldown: {
                name: 'Entry Permit',
                categories: ['<a href="'+page_url+'/entry_permit/1" target="_blank" class="gp-link">Entry Permit</a>'],
                data: [<?php echo $dispatchable_hr; ?>],
                color: colors[12]
            }
        }, {
            y: 0,
            color: colors[11],
            drilldown: {
                name: 'Change Status',
                categories: ['<a href="'+page_url+'/change_status/1" target="_blank" class="gp-link">Change Status</a>    '],
                data: [<?php echo $receivable_gro; ?>],
                color: colors[11]
            }
        }, {
            y: 0,
            color: colors[10],
            drilldown: {
                name: 'Emirates ID',
                categories: ['<a href="'+page_url+'/emirates_id/1" target="_blank" class="gp-link">Emirates ID</a>'],
                data: [<?php echo $dispatchable_gro; ?>],
                color: colors[10]
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
            text: 'Passport Movement Between HR & GR'
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
    var page_url = "<?php echo SITE_URL; ?>applications/everything";
    
    var colors = Highcharts.getOptions().colors,
        categories = ['Entry Permit', 'Change Status', 'Entry Stamp', 'Emirates ID', 'Medical Test', 'Zajel', 'Residence Permit', "Immigration Approval", "eVision Approval"],
        data = [{
            y: 0,
            color: colors[13],
            drilldown: {
                name: 'Entry Permit',
                categories: ['<a href="'+page_url+'/entry_permit/2" target="_blank" class="gp-link">Entry Permit</a>'],
                data: [<?php echo $f_entry_permit; ?>],
                color: colors[13]
            }
        }, {
            y: 0,
            color: colors[12],
            drilldown: {
                name: 'Change Status',
                categories: ['<a href="'+page_url+'/change_status/2" target="_blank" class="gp-link">Change Status</a>'],
                data: [<?php echo $f_change_status; ?>],
                color: colors[12]
            }
        }, {
            y: 0,
            color: colors[11],
            drilldown: {
                name: 'Entry Stamp',
                categories: ['<a href="'+page_url+'/entry_stamp/2" target="_blank" class="gp-link">Entry Stamp</a>'],
                data: [<?php echo $f_entry_stamp; ?>],
                color: colors[11]
            }    
        }, {
            y: 0,
            color: colors[10],
            drilldown: {
                name: 'Emirates ID',
                categories: ['<a href="'+page_url+'/emirates_id/2" target="_blank" class="gp-link">Emirates ID</a>'],
                data: [<?php echo $f_emirates_id; ?>],
                color: colors[10]
            }
        }, {
            y: 0,
            color: colors[9],
            drilldown: {
                name: 'Medical Test',
                categories: ['<a href="'+page_url+'/medical_test/2" target="_blank" class="gp-link">Medical Test</a>'],
                data: [<?php echo $f_medical_test; ?>],
                color: colors[9]
            }
        }, {
            y: 0,
            color: colors[8],
            drilldown: {
                name: 'Zajel',
                categories: ['<a href="'+page_url+'/zajel/2" target="_blank" class="gp-link">Zajel</a>'],
                data: [<?php echo $f_zajel; ?>],
                color: colors[8]
            }
        }, {
            y: 0,
            color: colors[7],
            drilldown: {
                name: 'Residence Permit',
                categories: ['<a href="'+page_url+'/residence_permit/2" target="_blank" class="gp-link">Residence Permit</a>'],
                data: [<?php echo $f_residence_permit; ?>],
                color: colors[7]
            }
        }, {
            y: 0,
            color: colors[6],
            drilldown: {
                name: 'Immigration Approval',
                categories: ['<a href="'+page_url+'/immigration_approval/2" target="_blank" class="gp-link">Immigration Approval</a>'],
                data: [<?php echo $f_immigration_approval; ?>],
                color: colors[6]
            }
        },
        {
            y: 0,
            color: colors[5],
            drilldown: {
                name: 'eVision Approval',
                categories: ['<a href="'+page_url+'/evision_approval/2" target="_blank" class="gp-link">eVision Approval</a>'],
                data: [<?php echo $f_evision_approval; ?>],
                color: colors[5]
            }
        },
        {
            y: 0,
            color: colors[4],
            drilldown: {
                name: 'Visa Cancellation',
                categories: ['<a href="'+page_url+'/visa_cancellation/2" target="_blank" class="gp-link">Visa Cancellation</a>'],
                data: [<?php echo $f_visa_cancellation; ?>],
                color: colors[4]
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
            text: 'Passport Movement GR Operation'
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