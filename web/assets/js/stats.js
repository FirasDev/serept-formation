

$(document).ready(function(){

    var contexts = $('.credsEarned');

    for(var i = 0;i<contexts.length;i++){

        var userRating = document.getElementById(i);
        var data = userRating.dataset.isAuthenticated;

        var pieData = [
            {
                //value: credsEarned,
                value: data,
                color: '#205081',
                label: 'Credits Earned'
            },
            {
                //value: credsAvail - credsEarned,
                value: 100-data,
                color: '#E3E3E3',
                label: 'Total Credits Available'
            }
        ];

        var context = contexts.get(i).getContext('2d');

        var skillsChart = new Chart(context).Doughnut(pieData, {

            //options defined
            showTooltips: false,
            //segmentShowStroke: false,
            responsive: true,
            percentageInnerCutout: 70,
            //animation: false,
            animationEasing: 'easeOutQuart',
            animateScale: false,
            //animationSteps: 90

            /*onAnimationComplete: function() {

              var canvasWidthvar = $('#credsEarned').width();
              var canvasHeight = $('#credsEarned').height();
              var constant = 114;
              var fontsize = (canvasHeight/constant).toFixed(2);
              //ctx.font="2.8em Verdana";
              context.font=fontsize +"em Verdana";
              context.textBaseline="middle";
              var total = 0;
              $.each(pieData,function() {
                  total += parseInt(this.value,10);
              });
              var tpercentage = ((pieData[0].value/total)*100).toFixed(2)+"%";
              var textWidth = context.measureText(tpercentage).width;

               var txtPosx = Math.round((canvasWidthvar - textWidth)/2);
                context.fillText(tpercentage, txtPosx, canvasHeight/2);
            }*/ //onAnimationComplete

    //activate chart.js
    //var context = document.getElementById('credsEarned').getContext('2d');

    //var context = $('#credsEarned').get(0).getContext("2d");
    //use data and options


    });

}
});