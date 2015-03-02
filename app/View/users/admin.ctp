<?php
	echo $this->Html->css(array('main/three_columns'));
?>

<div id="content" class="full">

    <div class="box-content" style="display:inline-block; padding-top:20px;">
    
    <div class="three_box">
    <h3><?= $this->Html->image('infrasmall.png'); ?> Material a soldar</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'materials', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'materials', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Calibre de lámina (Espesor)</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'calibres', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'calibres', 'action' => 'add')); ?></li>
    <li><?= $this->Html->link('Ver rangos de Amperaje', array('controller' => 'amperajes', 'action' => 'view')); ?></li>
    </ul>

    <h3><?= $this->Html->image('infrasmall.png'); ?> Condicion de Calidad (Tig)</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'ccalidades', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'ccalidades', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Gas de Protección</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'gases', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'gases', 'action' => 'add')); ?></li>
    <li><?= $this->Html->link('Ver Condiciones de calidad', array('controller' => 'calidadgases', 'action' => 'view')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Máquina de Soldar</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todas', array('controller' => 'maquinas', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nueva', array('controller' => 'maquinas', 'action' => 'add')); ?></li>
    <li><?= $this->Html->link('Ver ciclos de trabajo', array('controller' => 'ciclomaquinas', 'action' => 'view')); ?></li>
    </ul>

    <h3><?= $this->Html->image('infrasmall.png'); ?> Portaelectrodos</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'portaelectrodos', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'portaelectrodos', 'action' => 'add')); ?></li>
    </ul>
        
    <h3><?= $this->Html->image('infrasmall.png'); ?> Juego de Pas</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'juegopas', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'juegopas', 'action' => 'add')); ?></li>
    </ul>
    
    <br /><br />
    <h3>Usuarios</h3>
    <ul class="bblist">
    <li class="green"><?= $this->Html->link('Ver Todos', array('controller' => 'users', 'action' => 'index')); ?></li>
    <li class="green"><?= $this->Html->link('Agregar nuevo', array('controller' => 'users', 'action' => 'add')); ?></li>
    </ul>
    </div>
    
    <div class="three_box">
    <h3><?= $this->Html->image('infrasmall.png'); ?> Alimentador de Micro Alambre</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'microalambres', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'microalambres', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Antorcha</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todas', array('controller' => 'antorchas', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nueva', array('controller' => 'antorchas', 'action' => 'add')); ?></li>
    <li><?= $this->Html->link('Ver Accesorios de ensamblaje', array('controller' => 'accesorios', 'action' => 'view')); ?></li>
    </ul>

    <h3><?= $this->Html->image('infrasmall.png'); ?> Tungsteno</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'tungstenos', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'tungstenos', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Material de aporte</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'aportes', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'aportes', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Regulador de Presión</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'reguladors', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'reguladors', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> equipo alternativo</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'alternativos', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'alternativos', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Artículos de Protección</h3>
    <ul class="bblist">
    <li><?= $this->Html->link('Ver Todos', array('controller' => 'protecciones', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nuevo', array('controller' => 'protecciones', 'action' => 'add')); ?></li>
    <li><?= $this->Html->link('Ver Secciones', array('controller' => 'seccions', 'action' => 'viewall')); ?></li>
    <li><?= $this->Html->link('Agregar nueva Sección', array('controller' => 'seccions', 'action' => 'add')); ?></li>
    </ul>
    </div>
    
    
    <!-- LOS 3 PROCESOS MIG, SMAW, TIG -->
    <div class="three_box">
    <h3><?= $this->Html->image('infrasmall.png'); ?> Selector MIG</h3>
    <ul class="bblistred">
    <li><?= $this->Html->link('Ver Diagrama de selecciones', array('controller' => 'migs', 'action' => 'diagram')); ?></li>
    <li><?= $this->Html->link('Agregar nueva relación', array('controller' => 'migs', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Selector SMAW</h3>
    <ul class="bblistred">
    <li><?= $this->Html->link('Ver Diagrama de selecciones', array('controller' => 'smaws', 'action' => 'diagram')); ?></li>
    <li><?= $this->Html->link('Agregar nueva relación', array('controller' => 'smaws', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Selector TIG</h3>
    <ul class="bblistred">
    <li><?= $this->Html->link('Ver Diagrama de selecciones', array('controller' => 'tigs', 'action' => 'diagram')); ?></li>
    <li><?= $this->Html->link('Agregar nueva relación', array('controller' => 'tigs', 'action' => 'add')); ?></li>
    </ul>
    
    <h3><?= $this->Html->image('infrasmall.png'); ?> Selector PAC</h3>
    <ul class="bblistred">
    <li><?= $this->Html->link('Ver Diagrama de selecciones', array('controller' => 'pacs', 'action' => 'diagram')); ?></li>
    <li><?= $this->Html->link('Agregar nueva relación', array('controller' => 'pacs', 'action' => 'add')); ?></li>
    </ul>
    
    <br /><br />
    <h3>Clientes</h3>
    <ul class="bblist">
    <li class="green"><?= $this->Html->link('Ver Todos', array('controller' => 'customers', 'action' => 'index')); ?></li>
    <li class="green"><?= $this->Html->link('Marketing E-mail', array('controller' => 'marketings', 'action' => 'index')); ?></li>
    <li class="green"><?= $this->Html->link('Ver Ciudades/Áreas', array('controller' => 'ciudades', 'action' => 'index')); ?></li>
    </ul>
    
    </div>
    <!-- LOS 3 PROCESOS MIG, SMAW, TIG -->
    
    
    </div>


</div>  <!-- end content -->     