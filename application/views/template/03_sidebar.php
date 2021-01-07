<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $current_page = $this->uri->segment(2);
?>

<div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Menu Lateral</li>
                                <li>
                                    <a href="<?= base_url("page"); ?>" <?= ($current_page == '' ? "class='mm-active'" : "") ?>>
                                        <i class="metismenu-icon pe-7s-home"></i>
                                        Home
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url("page/gerenciar_reservas"); ?>" <?= ($current_page == 'gerenciar_reservas' ? "class='mm-active'" : "") ?>>
                                        <i class="metismenu-icon pe-7s-date"></i>
                                        Gerenciar reservas
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url("page/relatorios"); ?>" <?= ($current_page == 'relatorios' ? "class='mm-active'" : "") ?>>
                                        <i class="metismenu-icon pe-7s-note2"></i>
                                        Relatórios
                                    </a>
                                </li>

                                <?php if ($dados_usuario->tipo == "administrador"){ ?>

                                    <li class="<?php
                                        if ( // condição para deixar página selecionada ativa
                                                ($this->uri->segment(2) == 'local') ||
                                                ($this->uri->segment(2) == 'usuario')
                                            )
                                            { echo "mm-active"; }
                                        else{ echo ""; } ?>">
                                        <a href="#">
                                        <i class="metismenu-icon pe-7s-note"></i>
                                        Cadastro
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                                        </a>
                                        <ul>
                                            <li>
                                                <a href="<?= base_url('page/local'); ?>" <?= ($current_page == 'local' ? "class='mm-active'" : "") ?>>
                                                    <i class="metismenu-icon"></i>Local
                                                </a>
                                            </li>
                                        <li>
                                            <a href="<?= base_url('page/usuario'); ?>" <?= ($current_page == 'usuario' ? "class='mm-active'" : "") ?>>
                                                <i class="metismenu-icon"></i>Usuários
                                            </a>
                                        </li>
                                        </ul>
                                    </li>

                                <?php } ?>
                                <li>
                                    <a href="<?= base_url("page/manual"); ?>" <?= ($current_page == 'manual' ? "class='mm-active'" : "") ?>>
                                        <i class="metismenu-icon pe-7s-map"></i>
                                        Manual
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= base_url("page/sobre"); ?>" <?= ($current_page == 'sobre' ? "class='mm-active'" : "") ?>>
                                        <i class="metismenu-icon pe-7s-info"></i>
                                        Sobre
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="app-main__outer">
                    <div class="app-main__inner">