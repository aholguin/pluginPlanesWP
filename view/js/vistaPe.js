jQuery(document).ready(function () {

    PLAN_ESTUDIO_PLUGIN_DIR = jQuery('#PLAN_ESTUDIO_PLUGIN_DIR').val();
    __PROGAMA = jQuery('#__PROGAMA').val();
    getComponentes();

    function getComponentes() {
        jQuery("#div_componentes").load(
                PLAN_ESTUDIO_PLUGIN_DIR + '/aha_PlanEstudio/getWS.php',
                {
                    'ws': 'componente',
                    'programa': __PROGAMA
                },
        function getAreas() {
            
            jQuery(".clicComponente").click(function (e) {
                 e.preventDefault();
                jQuery("#div_areas")
                        .load(PLAN_ESTUDIO_PLUGIN_DIR + '/aha_PlanEstudio/getWS.php',
                                {
                                    'ws': 'area',
                                    'componente': jQuery(this).val(),
                                    'programa': __PROGAMA
                                },
                        function  getAsisgnaturas() {
                            jQuery(".clicArea").click(function (e) {
                                e.preventDefault();
                                jQuery("#div_lista_asignats")
                                        .load(PLAN_ESTUDIO_PLUGIN_DIR + '/aha_PlanEstudio/getWS.php',
                                                {
                                                    'ws': 'lista_asignats',
                                                    'area': jQuery(this).val(),
                                                    'programa': __PROGAMA
                                                },
                                        function getDescMat() {
                                            //div_desc_materia
                                            jQuery(".clicListaAsignats").click(function (e) { //console.log(jQuery(this).children('#valor').val());
                                                e.preventDefault();
                                                jQuery("#div_desc_materia")
                                                        .load(PLAN_ESTUDIO_PLUGIN_DIR + '/aha_PlanEstudio/getWS.php',
                                                                {
                                                                    'ws': 'descrip_asignatura',
                                                                    'asignatura': jQuery(this).children('#valor').val(),
                                                                    'programa': __PROGAMA
                                                                });
                                            });
                                        }
                                        );
                            });
                        });
            });
        });
    }


});

