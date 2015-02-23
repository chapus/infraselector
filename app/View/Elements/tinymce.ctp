
<?php echo $this->Html->script("tiny_mce/tiny_mce.js"); ?>

<?php
    echo $this->Html->scriptBlock(
        "function fileBrowserCallBack(field_name, url, type, win) {
            browserField = field_name;
            browserWin = win;
            window.open('".Helper::url(array('controller' => 'server_images'))."', 'browserWindow', 'modal,width=600,height=400,scrollbars=yes');
        }"
    );
?>

<?php
    echo $this->Html->scriptBlock(
        "tinyMCE.init({
            mode : 'textareas',
            theme : 'advanced',
			entity_encoding  : 'raw',
			plugins : 'autolink,lists,spellchecker,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template',
            theme_advanced_buttons1 : 'forecolor,bold,italic,underline,styleprops,|, justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,undo,redo,|,link,unlink,|,image,code',
            theme_advanced_buttons2 : 'cut,copy,paste,pastetext,pasteword,|,search,replace,|,preview,media',
            theme_advanced_toolbar_location : 'top',
            theme_advanced_toolbar_align : 'left',
            theme_advanced_path_location : 'bottom',
            extended_valid_elements : 'a[name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',
            file_browser_callback: 'fileBrowserCallBack',
			
			// Skin options
			skin : 'o2k7',
			skin_variant : 'silver',
			
			apply_source_formatting : false,
		
            width: '590',
            height: '480',
            relative_urls : false
        });"
    );
?>
