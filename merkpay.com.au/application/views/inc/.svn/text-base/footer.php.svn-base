 <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
<div style="display: none">
    <div class="container">
      <div class="title">
        <i class="gicon-globe"></i> Estimated earnings
      </div>
      <div class="row-fluid fluid">
        <div class="span6 pagination-centered">
          <div class="row-fluid fluid">
            <i class="icon-caret-up green medium span3"></i>
            <span class="percent span3">7%</span>
            <span class="bar1 span6">3,4,10,5,3,6,3</span>
          </div>
          <div class="row-fluid fluid">
            <h2><strong>$11.37</strong></h2>
          </div>
          <div class="row-fluid fluid">
             Today so far
          </div>
        </div>
        <div class="span6 pagination-centered">
          <div class="row-fluid fluid">
            <i class="icon-caret-down red medium span3"></i>
            <span class="percent span3">2%</span>
            <span class="bar2 span6">1, 4, 6, 7,4, 2,4</span>
          </div>
          <div class="row-fluid fluid">
            <h2><strong>$22.84</strong></h2>
          </div>
          <div class="row-fluid fluid">
             Yesterday <i class="icon-question-sign muted inline" rel="tooltip" data-placement="right" data-original-title="Your total earnings accrued yesterday. This amount is an estimate that is subject to change when your earnings are verified for accuracy at the end of every month."></i>
          </div>
        </div>
      </div>
      <!-- End .title -->
      <div class="title row-fluid fluid">
        <i class="gicon-refresh"></i> Real time stats
      </div>
      <div class="row-fluid fluid">
        <div class="span6 pagination-centered">
          <div class="row-fluid">
            <div id="g1" class="gauge">
            </div>
          </div>
        </div>
        <div class="span6 pagination-centered">
          <div class="row-fluid fluid">
            <div id="g2" class="gauge">
            </div>
          </div>
        </div>
        <!-- End row-fluid -->
        <div class="row-fluid fluid">
          <div id="real-time-sidebar" style="width:100%;height:65px;">
          </div>
        </div>
        <div class="row-fluid fluid pagination-centered">
           Page views <i class="icon-question-sign muted inline" rel="tooltip" data-placement="right" data-original-title="As an interesting side note, as a head without a body, I envy the dead. There's one way and only one way to determine if an animal is intelligent."></i>
        </div>
      </div>
      <!-- End .title -->
    </div>
  </div>
    <script src="<?php echo base_url();?>/js/jquery.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url();?>/js/plugins/excanvas.compiled.js"></script>
    
    <script src="<?php echo base_url();?>/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url();?>/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url();?>/js/fileinput.jquery.js"></script>
    <script src="<?php echo base_url();?>/js/jquery-ui-1.8.23.custom.min.js"></script>
    <script src="<?php echo base_url();?>/js/jquery.touchdown.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/full-calendar/fullcalendar.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/jquery.peity.min.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo base_url();?>/js/plugins/datatables/js/jquery.dataTables.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/chosen/chosen/chosen.jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/flot/jquery.flot.js"></script>
    <script language="javascript" type="text/javascript" src="<?php echo base_url();?>/js/plugins/jquery.uniform.min.js"></script>


    <script src="<?php echo base_url();?>/js/plugins/justGage.1.0.1/resources/js/raphael.2.1.0.min.js"></script>
    <script src="<?php echo base_url();?>/js/plugins/justGage.1.0.1/resources/js/justgage.1.0.1.min.js"></script>



    <script src="<?php echo base_url();?>/js/scripts.js"></script>




    <script type="text/javascript" charset="utf-8">
    // Datatables
    $(document).ready(function() {
      $("input[type=checkbox], input:radio, input:file").uniform();
      var dontSort = [];
                $('#datatable_example thead th').each( function () {
                    if ( $(this).hasClass( 'no_sort' )) {
                        dontSort.push( { "bSortable": false } );
                    } else {
                        dontSort.push( null );
                    }
      } );
      $('#datatable_example').dataTable( {
        "sDom": "<'row-fluid table_top_bar'<'span12'<'to_hide_phone' f>>>t<'row-fluid control-group full top' <'span4 to_hide_tablet'l><'span8 pagination'p>>",
         "aaSorting": [[ 1, "asc" ]],
        "bPaginate": true,

        "sPaginationType": "full_numbers",
        "bJQueryUI": false,
        "aoColumns": dontSort,
        
      } );
      $.extend( $.fn.dataTableExt.oStdClasses, {
        "s`": "dataTables_wrapper form-inline"
      } );
    } );
    </script>

    <script type='text/javascript'>
    $(window).load(function() {
     $('#loading').fadeOut();
    });
      $(document).ready(function() {
      $('body').css('display', 'none');
      $('body').fadeIn(500);
        // Chosen select plugin
        $(".chzn-select, .dataTables_length select").chosen({
                   disable_search_threshold: 10

        });

      $("#logo a, #sidebar_menu a:not(.accordion-toggle), a.ajx").click(function() {
      event.preventDefault();
      newLocation = this.href;
      $('body').fadeOut(500, newpage);
      });
      function newpage() {
      window.location = newLocation;
      }
    
     });
    
    </script>
</body>
</html>