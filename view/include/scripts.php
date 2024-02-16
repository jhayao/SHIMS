<!--  Import Js Files -->
<script src="../dist/libs/jquery/dist/jquery.min.js"></script>
<script src="../dist/libs/simplebar/dist/simplebar.min.js"></script>
<script src="../dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!--  core files -->
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/app.init.js"></script>
<script src="../dist/js/app-style-switcher.js"></script>
<script src="../dist/js/sidebarmenu.js"></script>
<script src="../dist/js/custom.js"></script>
<!--  current page js files -->

<script src="../dist/libs/select2/dist/js/select2.full.min.js"></script>
<script src="../dist/libs/select2/dist/js/select2.min.js"></script>
<script src="../dist/js/forms/select2.init.js"></script>

<script src="../dist/libs/sweetalert2/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script> -->
<script>
    

    //create a javascript object
    // const arr = ["findings", "prescription"]
    // counter = 0;
    // document.querySelectorAll('#editor').forEach(function (val) {

    //     ClassicEditor.
    //         create(val, {
    //             toolbar: ['bold', 'italic',  'bulletedList', 'numberedList'],
    //         }).then(editor => {
    //             window.editor = editor;

    //         })
    // })
    // let findingsEditor,prescriptionEditor
    // ClassicEditor.
    //         create(document.querySelector( '.findings' ), {
    //             toolbar: ['bold', 'italic',  'bulletedList', 'numberedList'],
    //         }).then(editor => {
    //             window.editor = editor;
    //             findingsEditor = editor;
    //         })
    //         ClassicEditor.
    //         create(document.querySelector( '.prescription' ), {
    //             toolbar: ['bold', 'italic',  'bulletedList', 'numberedList'],
    //         }).then(editor => {
    //             window.editor = editor;
    //             prescriptionEditor = editor;
    //         })



</script>
<script>
    const noty = new Noty({
        theme: 'metroui',
        type: 'success',
        layout: 'topRight',
        timeout: 3500,
        closeWith: ['click', 'button'],
        animation: {
            open: 'animated bounceInRight', // Animate.css class names
            close: 'animated bounceOutRight' // Animate.css class names
        }
    });

    //btn logout
    $('#btn-logout').click(function () {
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to logout?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Yes, logout!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'logout.php';
            }
        })
    });

</script>