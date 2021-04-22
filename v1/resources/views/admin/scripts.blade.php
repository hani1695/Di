<script src="{{asset('assets/js/vendor/jquery-2.1.4.min.js')}}"></script>

<script src="{{asset('assets/js/popper.min.js')}}"></script>

<script src="{{asset('assets/js/plugins.js')}}"></script>

<script src="{{asset('assets/js/main.js')}}"></script>

<script src="{{asset('/js/cards.js')}}"></script>

<script src="{{asset('assets/js/lib/chosen/chosen.jquery.min.js')}}"></script>

<script src="{{ mix('/js/app.js') }}" ></script>



{{-- <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script> 
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}

<livewire:scripts>

{{-- <script src="{{ asset('assets/js/lib/data-table/datatables.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/jszip.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/pdfmake.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js')}}"></script>

<script src="{{ asset('assets/js/lib/data-table/datatables-init.js')}}"></script> --}}
    

<script>
    function enr (load) {
        load.form.submit(); 
        load.disabled=true;
        load.firstElementChild.classList.add("fa-spin");
        load.lastElementChild.innerHTML = "Enregistrement...";
    }
    function myFunction() {
        if(!confirm("Est ce que vous êtes sûr de vouloir supprimer cet enregistrement ?"))
        event.preventDefault();
    }
    function rem () {
        var element = document.getElementById('rem');
        element.className=""
        
        
    }
</script>

<script>
jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "pas de résultats pour : ",
            width: "100%"
        });
    });
</script>




