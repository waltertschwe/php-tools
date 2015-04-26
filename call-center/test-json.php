<?php
echo '
<script type="text/javascript">
  FusionCharts.ready(function(){
    var revenueChart = new FusionCharts({
        "type": "column2d",
        "renderAt": "chartContainer",
        "width": "800",
        "height": "400",
        "dataFormat": "json",
        "dataSource":  {
          "chart": {
            "caption": "Call center Report",
            "subCaption": "Date 4/23 - 4/24",
            "xAxisName": "Source",
            "yAxisName": "Number of Calls",
            "theme": "fint"
         },
         "data": [
            {
               "label": "Contact Fertility Drs",
               "value": "5"
            },
            {
               "label": "Egg Banxx",
               "value": "10"
            },
            {
               "label": "IVF Advtg.",
               "value": "11"
            },
            {
               "label": "Book Now",
               "value": "13"
            },
            {
               "label": "Egg Banxx Payment",
               "value": "12"
            },
            {
               "label": "Egg Banxx Initial Search",
               "value": "7"
            },
            {
               "label": "Egg Banxx Consultation",
               "value": "14"
            },
            {
               "label": "Egg Banxx Finance",
               "value": "2"
            },
            {
               "label": "IVF Initial Search",
               "value": "6"
            },
          ]
      }

  });
revenueChart.render();
})
</script>
';
