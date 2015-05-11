<?php /* Smarty version Smarty-3.0.9, created on 2015-05-05 20:10:44
         compiled from "C:/wamp/www/login/templates\message.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18761554907a4162ba1-41606018%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0214525186e2463451edf043fe51dbba6e8806dc' => 
    array (
      0 => 'C:/wamp/www/login/templates\\message.tpl',
      1 => 1354303836,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18761554907a4162ba1-41606018',
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
