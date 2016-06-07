/**
 * Created by Yohanz on 5/29/2016.
 */

var timer;
function up()
{
    timer=setTimeout(function()
    {
        var keywords=$('#search-input').val();

        if(keywords.length>0)
        {
            $.post('/executesearch',{keywords:keywords},function(markup)
            {
                $('#search-results').html(markup);
            });
        }


    },500);
}

function down()
{
    clearTimeout(timer);
}