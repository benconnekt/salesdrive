 $(document).ready(function(){
                function loading_show(){
                    $('#loading').html("<img src='images/loading.gif'/>").fadeIn('fast');
                }
                function loading_hide(){
                    $('#loading').fadeOut('fast');
                }                
                function loadData(page,webpage){
                    loading_show();                    
                    $.ajax
                    ({
                        type: "POST",
                        url: "load_data.php",
                        data: "page="+page+"&webpage="+webpage,
                        success: function(msg)
                        {
                            $("#container").ajaxComplete(function(event, request, settings)
                            {
                                loading_hide();
                                $("#container").html(msg);
                            });
                        }
                    });
                }
                 //$(document).ready(function () {
                var webpage = ($("input#webpage").val());
                loadData(1,webpage);  // For first time page load default results
               // });
                
                $('#container .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page,webpage);
                    
                });           
                $('#go_btn').live('click',function(){
                    var page = parseInt($('.goto').val());
                    var no_of_pages = parseInt($('.total').attr('a'));
                    if(page != 0 && page <= no_of_pages){
                        loadData(page);
                    }else{
                        alert('Enter a PAGE between 1 and '+no_of_pages);
                        $('.goto').val("").focus();
                        return false;
                    }
                    
                });
            });

