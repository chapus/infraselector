<?php
//debug($user);
?>
<div style="line-height:1.35em;margin:0 auto;text-align:left;width:600px;font-family:arial, sans-serif;font-size:12px;">
            <div>&nbsp;</div> &nbsp; 
        <table style="border:none;width:600px;" cellpadding="0" cellspacing="0" align="center">
                <tbody><tr><td align="left" valign="top"><img src="http://www.infra-selector.com.mx/img/mailing/header.jpg"></td></tr><tr><td align="left" valign="top">&nbsp;</td></tr><tr><td align="left"><table style="border:1px solid #dddddd;border-collapse:collapse;width:564px;" width="564" cellpadding="0" cellspacing="0" align="center"><tbody><tr><td style="border:1px solid #dddddd;border-right:none;padding:15px;width:70%;vertical-align:top;" align="left"><div style="color:#FA6C34;font-size:14px;font-weight:bold;"><?= $user['Customer']['name']; ?> se ha contactado,</div>
                              <br><div style="font-size:12px;font-weight:bold;">
                                <div style="color:#FA6C34;"><a href="<?= $user['Customer']['link']; ?>" target="_blank">Ver el requerimiento</a></div>
                                <span style="color:#868686;"><br />
                                <p>Nombre Completo: <?= $user['Customer']['name'].' '.$user['Customer']['apeidos']; ?></p>
                                <p>Teléfono: <?= $user['Customer']['telefono']; ?></p>
                                <p>Correo: <?= $user['Customer']['correo']; ?></p>
                                <p>Empresa: <?= $user['Customer']['empresa']; ?></p>
                                <p>Comentarios: <?= $user['Customer']['comments']; ?></p>
                                </span>
                                <div></div>
                                </span>
<br>
<br></div></td><td style="padding:15px;border:1px solid #dddddd;width:30%;vertical-align:top;" align="left"><div style="color:#FA6C34;font-size:12px;">Selector de Procesos INFRA</div><div style="color:#868686;font-size:14px;font-weight:bold;"><?= $user['Customer']['name']; ?></div><br>
<span style="color:#FA6C34;font-size:14px;font-weight:bold;">Fecha de solicitud:</span><br>
<div style="color:#868686;font-size:14px;font-weight:bold;"><?= date('Y-m-d'); ?></div></td></tr></tbody></table></td></tr><tr><td align="center">&nbsp;</td></tr>

<tr><td>&nbsp;</td></tr>
    <tr>
    <td align="left" valign="top">
            </td>
</tr>
</tbody></table><table style="border:none;width:564px;" cellpadding="0" cellspacing="0" width="564" align="center">
          </table>    
        </div>