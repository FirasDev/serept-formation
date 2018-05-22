$(window).on('load', function (){
    $('.charts-modal').on('show.bs.modal', function (event) {
        setTimeout(function(){
            Morris.Area({
                element: 'area-example',
                data: [
                    { y: '2006', a: 100, b: 90 },
                    { y: '2007', a: 75,  b: 65 },
                    { y: '2008', a: 50,  b: 40 },
                    { y: '2009', a: 75,  b: 65 },
                    { y: '2010', a: 50,  b: 40 },
                    { y: '2011', a: 75,  b: 65 },
                    { y: '2012', a: 100, b: 90 }
                ],
                xkey: 'y',
                ykeys: ['a', 'b'],
                labels: ['Series A', 'Series B']
            });
            // When you open modal several times Morris charts over loading. So this is for destory to over loades Morris charts.
            // If you have better way please share it.
            if($('#area-example').find('svg').length > 1){
                // Morris Charts creates svg by append, you need to remove first SVG
                $('#area-example svg:first').remove();
                // Also Morris Charts created for hover div by prepend, you need to remove last DIV
                $(".morris-hover:last").remove();
            }
            // Smooth Loading
            $('.js-loading').addClass('hidden');
        },1000);
    });
});
