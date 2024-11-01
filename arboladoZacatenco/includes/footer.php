<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
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
    </script>
</body>