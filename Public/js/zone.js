$(function(){
    var index=0;
    $('#main ul.main_child li').click(function(){
        var imgSelf=$(this);
        var alumi_id=$('img',this).attr('alt');
        // alert(alumi_id);
        if(alumis_lock==1)
            $('.gray').fadeIn();
        $('.showImg'+alumi_id).fadeIn();
        $('.show'+alumi_id).attr('src',ppath+'/images/'+SubSrc($(this).children().attr('src'))+' (2)'+'.png');
        index=$(this).index();
    });

    $('#main ul.main_child li').hover(function(){
        $(this).find('div.ImageInfo').stop().animate({height:'180px'},200);
        $(this).find('div.ImageInfo h3').stop().animate({paddingTop:"60px"},500);
        $(this).find('div.ImageInfo p').stop().show();
    },function(){
        $(this).find('div.ImageInfo').stop().animate({height:"45px"},200);
        $(this).find('div.ImageInfo h3').stop().animate({paddingTop:"0px"},500);
        $(this).find('div.ImageInfo p').stop().hide();
    });
    $('.gray').click(function(){
        $('.gray').fadeOut();
        $('.showImgid').fadeOut();
        $('.login-page').fadeOut();
    });

    $('#main .main_child li.add').click(function(){
        if(alumis_lock==1)
        {
            $('.gray').fadeIn();
            $('.login-page').fadeIn();
        }
        else
            alert('管理员已禁止此功能,请联系管理员!');
        
    });

    $('#alumi_covers').change(function(){
        var alumi_covers=$('select[name="alumi_covers"] option:selected').val();
        $('.login-page img').attr('src',alumi_covers);
    })

    $('.button').click(function(){
        var addAjaxUrl=$('input[name="addAjaxUrl"]').val();
        var alumi_name=$('input[name="alumi_name"]').val();
        var alumi_intro=$('textarea[name="alumi_intro"]').val();
        var alumi_covers=$('select[name="alumi_covers"] option:selected').val();

        if(alumi_name=='')
        {
            alert('册子名称为必填字段!');
            $('input[name="alumi_name"]').focus();
            return false;
        }
        alert(addAjaxUrl);
        $.post(addAjaxUrl,{alumi_name:alumi_name,alumi_intro:alumi_intro,alumi_covers:alumi_covers},function(data){
            if(data.status==1)
            {
                alert('创建成功!');
                window.location.reload();
            }
            else if(data.status==2)
            {
                alert('存在相同的册子名称，请重新填写!');
                $('input[name="alumi_name"]').val('');
                $('input[name="alumi_name"]').focus();
            }
            else if(data.status==0)
            {
                alert('创建失败!');
                $('.gray').fadeIn();
                $('.smart-green').fadeIn();
            }
        });
    });
})
function SubSrc(src)
{
    return src.match(/[^\/]*$/)[0].split('.')[0];
}