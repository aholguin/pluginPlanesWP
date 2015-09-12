
<div>
    <div id="componentes">
        <ul>
            <?php
            foreach ($xmlDatos as $value) {
                echo "<li value='" . $value->codigo_componente . "'><a href='#'>" . $value->descrip_componente . "</a></li>";
                //var_dump($value);
            }
            ?>
        </ul>
    </div>
</div>