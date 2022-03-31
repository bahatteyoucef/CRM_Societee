
import "jquery/dist/jquery.min.js";
import "datatables.net-dt/js/dataTables.dataTables";
import "datatables.net-dt/css/jquery.dataTables.min.css";

import "datatables.net-buttons/js/dataTables.buttons.js"
import "datatables.net-buttons/js/buttons.colVis.js"
import "datatables.net-buttons/js/buttons.flash.js"
import "datatables.net-buttons/js/buttons.html5.js"
import "datatables.net-buttons/js/buttons.print.js"

export default {
    methods: {
        setDefaultStyling()
        {
            //////// Change Colors

            $("#datatable_length").css("color","white")
            $("#datatable_info")  .css("color","white")

            //

            //

            //

            //////// Number of Records

            //move page selector
            $('select[name="datatable_length"]').insertAfter($("#datatable_length").first("label"))

            //reduce page selector width
            $('select[name="datatable_length"]').addClass("col-sm-3")

            //remove none sense label
            $("#datatable_length").first("label").remove()

            //add parent div for page selector        
            $('<div id="datatable_length_div"></div>').insertBefore($('select[name="datatable_length"]'))
            $("#datatable_length_div").append($('select[name="datatable_length"]'))

            //append text before page selector
            $('<label id="datatable_length_desc">Resultats par page : </label>').insertBefore($('select[name="datatable_length"]'))

            // 

            // 

            // 

            /////// Seach input

            //move search input
            $('#datatable_filter').find('label').find('input').insertBefore($('#datatable_filter').find('label'))

            //move page selector
            $('#datatable_filter').insertAfter($("#datatable_filter").first("label"))

            //reduce page selector width
            $('#datatable_filter').find('input').addClass("col-sm-9")
            $('#datatable_filter').find('input').css("color","white")

            //remove none sense label
            $('#datatable_filter').find('label').remove()

            //add parent div for search input   
            $('<div id="datatable_filter_div"></div>').insertBefore($('#datatable_filter').find('input'))
            $("#datatable_filter_div").append($('#datatable_filter').find('input'))

            //add break
            $('#datatable_filter_div').append('<hr />')

            //add parent Div
            $('<div id="datatable_length_filter_div"></div>').insertBefore($('#datatable_length_div'))

            //move to div
            $("#datatable_length_filter_div").append($("#datatable_length_div"))
            $("#datatable_length_filter_div").append($("#datatable_filter"))

            //get out of div
            $("#datatable_filter_div").insertAfter($("select[name='datatable_length']"))

            $("#datatable_filter_div").find("input").addClass("form-control")
            $("#datatable_filter_div").find("input").addClass("col-sm-3")
            $("#datatable_filter_div").find("input").removeClass("col-sm-9")

            $("#datatable_filter").remove()

            $('<div id="datatable_length_filter_inline_div"></div>').insertBefore($("select[name='datatable_length']"))
            $('#datatable_length_filter_inline_div').append($("select[name='datatable_length']"))
            $('#datatable_length_filter_inline_div').append($("#datatable_filter_div"))

            $('#datatable_filter_div').find("input").insertAfter($("select[name='datatable_length']"))
            $('<hr />').insertAfter($("#datatable_length_filter_inline_div"))

            $("#datatable_filter_div").remove()

            $("#datatable_length_desc").addClass("ml-1")
            $("select[name='datatable_length']").addClass("ml-3 mr-3")
            $("#datatable_length_filter_inline_div").addClass("row")


            //Datatables Buttons
            $("#datatables-buttons").append($('.dt-buttons'))
            $('.dt-buttons').addClass("float-right")
            
            $('.dt-buttons').find("button").last().addClass("btn btn-outline-primary")
            $('.dt-buttons').find("button").first().addClass("btn btn-outline-primary")

            $('.dt-buttons').find("button").last().html('<i class="mdi mdi-printer" style="margin-left: 5px !important;margin-top: 9px !important;"></i>')
            $('.dt-buttons').find("button").first().html('<i class="mdi mdi-download" style="margin-left: 5px !important;margin-top: 9px !important;"></i>')
            
            $('#datatable_length_filter_inline_div').find("input").first().attr("placeholder", "Ecrire ici pour rechercher ...");

        }
    },   
}