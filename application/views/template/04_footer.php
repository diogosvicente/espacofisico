<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

            </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <!-- <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 1
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 2
                                        </a>
                                    </li>
                                </ul>
                            </div> -->
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <!-- <li class="nav-item">
                                        <a href="javascript:void(0);" class="nav-link">
                                            Footer Link 3
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <div class="badge badge-success mr-1 ml-0">
                                                <big>2021</big>
                                            </div>
                                            UERJ - Gerenciador de Reservas de Espaço Físico
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="<?= base_url('assets/template/src/js/js.js?sensor=true'); ?>"></script>
        </div>
    </div>
    <script type="text/javascript" src="<?= base_url('assets/template/src/js/main.js'); ?>"></script>
    <?php

        if (isset($fullcalendar) && $fullcalendar == true){ ?>

            <script src="<?php echo base_url('assets/fullcalendar-5.3.2/lib/main.js'); ?>"></script>
            <script src="<?php echo base_url('assets/fullcalendar-5.3.2/lib/locales/pt-br.js'); ?>"></script>

        <?php }

        echo (isset($crypto) && $crypto == true) ?
        "<script src='" . base_url('assets/crypto/crypto-js.min.js') . "'></script>" : "" ;

        if (isset($datatables) && $datatables == true){ ?>

            
            <script type="text/javascript" src="<?= base_url('assets/DataTables/DataTables-1.10.22/js/jquery.dataTables.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/Buttons-1.6.5/js/dataTables.buttons.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/Buttons-1.6.5/js/buttons.flash.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/JSZip-2.5.0/jszip.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/pdfmake-0.1.36/pdfmake.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/pdfmake-0.1.36/vfs_fonts.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/Buttons-1.6.5/js/buttons.html5.min.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/DataTables/Buttons-1.6.5/js/buttons.print.min.js'); ?>"></script>

            <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable( {
                    "language": {
                        "url": "<?= base_url('assets/DataTables/Traducao/Portuguese-Brasil.json'); ?>"
                    },
                    dom: 'lBfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                } );
            } );
            </script>

        <?php }

        if (isset($select_multiple) && $select_multiple == true){ ?>

            <script type="text/javascript" src="<?= base_url('assets/multiple-select-master/js/multiple-select.js'); ?>"></script>
            <script type="text/javascript" src="<?= base_url('assets/multiple-select-master/js/locale/multiple-select-pt-BR.js'); ?>"></script>

            <script type="text/javascript">
                $(function() { 
                    $("#demo").multipleSelect({
                        locale: 'pt-BR'
                    });
                });
            </script>

        <?php }

    ?>
</body>
</html>