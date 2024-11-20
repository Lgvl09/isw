<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script src="includes/mapa.js"></script>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.materialboxed');
            var instances = M.Materialbox.init(elems);
        });

        $(document).ready(function() {
            $('input#input_text, textarea#notas').characterCounter();
        });
    </script>

    <script>
    $(document).ready(function() {
        $('.dropdown-trigger').dropdown({
        coverTrigger: false,   // Evita que el dropdown cubra el botón al abrirse
        hover: true,           // Abre el dropdown al pasar el mouse (opcional)
        constrainWidth: false  // Permite que el ancho del dropdown se ajuste al contenido
        });

        $('.modal').modal();
        $('select').formSelect();

        $('#tabla_reportes').DataTable({
            "order": [[0, "asc"]], // Orden inicial por la primera columna (ID)
            "paging": false,       // Desactiva la paginación (botones Anterior y Siguiente)
            "info": false,         // Desactiva la información ("Mostrando página X de Y")
            "searching": false, 
            "columns": [
                null,               // ID (ordenable)
                null,               // Tipo de reporte (ordenable)
                { "orderable": false }, // Latitud (no ordenable)
                { "orderable": false }, // Longitud (no ordenable)
                { "orderable": false }, // Descripción (no ordenable)
                { "orderable": false }, // Nombre (no ordenable)
                { "orderable": false }, // Correo (no ordenable)
                { "orderable": false }, // Imagen (no ordenable)
                { "orderable": true, "type": "date" }, // Fecha (ordenable)
                null                // Estado del reporte (ordenable)
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(filtrado de _MAX_ registros en total)",
                "search": "Buscar:",
                "paginate": {
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
        });
    });
    </script>


</body>