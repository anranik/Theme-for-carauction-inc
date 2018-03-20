<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<div id="car-search" class="col-xs-12 col-md-6 col-sm-6">

        

 <form role="search" method="get" class="search-form" action="<?php  home_url( '/' ) ; ?>#search-result-area">

                <table style="width:100%;">
                    <tr>
                        <td colspan="3">


                        <input type="hidden" name="post_type" value="cars" />
                       
<div id="country-div">
<?php 


 wp_dropdown_categories('show_count=0&selected=-1&hierarchical=1&depth=1&hide_empty=0&exclude=1&show_option_none=Select Type&name=vehical&taxonomy=vehical&class=form-control search-field');
?>
</div>
                        </td>
                        

                    </tr>
                        <tr>
                        <td>
<select class="form-control sub_vehi" name="sub_vehical" id="sub_vehical" disabled="disabled"></select>
                         
                        </td>
                        <td>
                         <script type="text/javascript">

jQuery(document).ready(function( $ ) {




$(function()
{
$('#vehical').change(function()
{
    var $mainCat=$('#vehical').val();

    // call ajax
    $("#sub_vehical").empty();
    $.ajax
    (
        {
            url:"<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",     
            type:'POST',
            data:'action=my_special_ajax_call&main_catid=' + $mainCat,

            success:function(results)
            {
                //  alert(results);
                $("#sub_vehical").removeAttr("disabled");       
                $("#sub_vehical").append(results);  
            }
        }
    );                                    
});
}); 



$('#vehical').change(function() {

    $(".sub_vehi").attr("name", "vehical");

});





});
</script>            
                             <script type="text/javascript">

jQuery(document).ready(function( $ ) {
$(function()
{
$('#country').change(function()
{
    var $mainCat=$('#country').val();

    // call ajax
    $("#sub_cat").empty();
    $.ajax
    (
        {
            url:"<?php bloginfo('wpurl'); ?>/wp-admin/admin-ajax.php",     
            type:'POST',
            data:'action=my_special_ajax_call&main_catid=' + $mainCat,

            success:function(results)
            {
                //  alert(results);
                $("#sub_cat").removeAttr("disabled");       
                $("#sub_cat").append(results);  
            }
        }
    );                                    
});
});  


$('#country').change(function() {

    $(".sub_coun").attr("name", "country");

}); 
});
</script>      

<div id="country-div">
<?php 


 wp_dropdown_categories('show_count=0&selected=&hierarchical=1&depth=1&hide_empty=0&exclude=1&show_option_none=Select Country&name=country&taxonomy=country&class=form-control search-field');

?>
</div>
                        </td>
                        <td>
<select class="form-control sub_coun" name="sub_cat" id="sub_cat" disabled="disabled"></select>
                         
                        </td>
                    </tr>
                    <tr>
                        <td><input class="form-control" type="text" name="username" id="username" placeholder="NAME" required="required"></td>
                        <td colspan="2"><input class="form-control" type="text" name="userrmail" id="email" placeholder="EMAIL" required="required"></td>
                    </tr>
                    <tr>
                        <td colspan="3"><button type="submit" class="search-submit btn btn-default btn-lg btn-block">SUBMIT</button></td>
                    </tr>
                </table>
            </form>




            </div>


