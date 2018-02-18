<?php

/**
 * Descricao de ControleHome
 *
 *@copyright (c) Fev/2018, jgoliveira10474@gmail.com (OLIVEIRA - 88 99984-5395).
 */
class ControleHome {
    
    public function index() {
        $CarregarView = new ConfigView("home/home");
        $CarregarView->renderizar();
    }
}
