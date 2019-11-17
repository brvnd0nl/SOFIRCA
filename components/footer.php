</div>
        <!-- /#page-content-wrapper -->

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>    
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        function cerrarsesion(){
            $.ajax({
                type:'POST', //aqui puede ser igual get
                url: '<?php echo $UrlBase ?>CerrarSesion.php',//aqui va tu direccion donde esta tu funcion php
                data: "",//aqui tus datos
                success:function(data){
                    //lo que devuelve tu archivo mifuncion.php
                    window.location.href = "<?php echo $UrlBase ?>index.php";
                },
            error:function(data){
                //lo que devuelve si falla tu archivo mifuncion.php
                alert('no lo hizo ' + data);
                window.location.href = "<?php echo $UrlBase ?>index.php";
            }
            });
        }
    </script>
       
</body>

</html>