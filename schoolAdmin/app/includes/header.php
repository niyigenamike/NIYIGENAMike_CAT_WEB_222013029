<?php 
require_once('auth.php');
?>
<head>

 
     <script src="<?= base_url ?>assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
     <link href="../assets/css/custom.css" rel="stylesheet" />

    <script>
            var loader = $('<div id="pre-loader">')
            loader.html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')
            function start_loader(){
                $('body').find('#pre-loader').remove()
                $('body').prepend(loader)
            }
            function end_loader(){
                $('body').find('#pre-loader').remove()
            }
            $(function(){
                setTimeout(() => {
                    end_loader()
                }, 500);
            })
    </script>

</head> 