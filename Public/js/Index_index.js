$(function(){
        //随机颜色
        
        $('p').each(function(){
            var x=11;
            var y=0;
            var rand=parseInt(Math.random()*(x-y+1)+y);
            $(this).addClass("color"+rand);
        });


        // $('#particles').particleground({
        //     dotColor: '#5cbdaa',
        //     lineColor: '#5cbdaa'
        // });
        // $('.intro').css({
        //     'margin-top': -($('.intro').height() / 2)
        // });
    



        //花瓣特效
        // $(document).snowfall('clear');


        // $(document).snowfall({
        //             image: huaurl,
        //             flakeCount:30,
        //             minSize: 5,
        //             maxSize: 22
        // });
});


