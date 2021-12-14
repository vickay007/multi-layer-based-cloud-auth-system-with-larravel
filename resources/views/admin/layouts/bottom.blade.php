<script src="{{ asset('/assets/js/vendors.js') }}"></script>

<!-- custom app -->
<script src="{{ asset('/assets/js/app.js') }}"></script>

<script src="{{ asset('/assets/js/jquery-3.4.1.slim.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('/DataTables/datatables.min.js') }}"></script>

<script src="{{ asset('/assets/js/lib/chosen/chosen.jquery.min.js') }}"></script>

<script>
  jQuery(document).ready(function(){
    jQuery(".myselect").chosen({
      disable_search_threshold: 10,
      no_results_text: "Oops, nothing found!",
      width: "100%"
    });
  });
</script>

<script>
   $(document).ready( function () {
    $('#myTable').DataTable();
   } );
</script>

 <script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>