<?php /* Smarty version Smarty-3.0.9, created on 2015-05-05 19:12:35
         compiled from "C:/wamp/www/login/templates\lateral.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7645548fa03276615-51726335%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '392d3b501fea7a3684cffbbf2a555ecfc43d9984' => 
    array (
      0 => 'C:/wamp/www/login/templates\\lateral.tpl',
      1 => 1430765776,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7645548fa03276615-51726335',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (isset($_SESSION['user'])&&$_GET['option']!='logout'){?>
<table cellspacing="0"><tr><td align="center">
 <div class=""> 
<b><font color="#FFFFFF"> Bienvenido, <?php echo $_SESSION['user']['nombre'];?>
</b><br /><br /></font><img src="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_global'];?>
images/admin.png" /><br /><br />
<button class="btn" onClick="location.href='<?php echo $_smarty_tpl->getVariable('gvar')->value['l_index'];?>
?option=logout'"><?php echo $_smarty_tpl->getVariable('gvar')->value['n_logout'];?>
</button>
</div>
</td></tr></table>
<?php }else{ ?>   
<table cellspacing="0" cellpadding="0"><tr><td class="font-white" align="center">
<form class="" action="<?php echo $_smarty_tpl->getVariable('gvar')->value['l_index'];?>
?option=login" method="post" name="login">
<b><font color="white"><?php echo $_smarty_tpl->getVariable('gvar')->value['n_login'];?>
</font></b><br /><br />
<input name="user" type="text" class="input-medium" placeholder="User"><br /><br />
<input name="password" type="password" class="input-medium" placeholder="Password"><br /><br />
<button type="submit" class="btn">Go</button>
</form>
</td></tr></table>
<?php }?>

