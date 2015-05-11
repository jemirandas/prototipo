<?php /* Smarty version Smarty-3.0.9, created on 2015-05-06 05:47:36
         compiled from "C:/wamp/www/hito2/templates\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1329455498ed864b514-69586051%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '06c3eabb278fbf5c969268915617f22b18933bd4' => 
    array (
      0 => 'C:/wamp/www/hito2/templates\\message.tpl',
      1 => 1354293036,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1329455498ed864b514-69586051',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div>
<div class="alert alert-<?php echo $_smarty_tpl->getVariable('type_warning')->value;?>
">
<strong><?php echo ucfirst($_smarty_tpl->getVariable('type_warning')->value);?>
</strong> <?php echo $_smarty_tpl->getVariable('msg_warning')->value;?>

</div>
</div>
