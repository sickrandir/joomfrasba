<?php // no direct access
defined('_JEXEC') or die('Restricted access'); ?>
<?php if($type == 'logout') : ?>
<form action="index.php" method="post" name="login" id="form-login">
	<div class="spacer extra">
	<?php if ($params->get('greeting')) : ?>
		<span class="greeting"><?php echo JText::sprintf( 'HINAME', $user->get('name') ); ?></span>
	<?php endif; ?>
	</div>
	<div class="loginelement">
		<a href="javascript:document.login.submit();"><?php echo JText::_( 'BUTTON_LOGOUT'); ?></a>
	</div>
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="logout" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
</form>
<?php else : ?>
<?php if(JPluginHelper::isEnabled('authentication', 'openid')) : ?>
	<?php JHTML::_('script', 'openid'); ?>
<?php endif; ?>
<form action="index.php" method="post" name="login" id="form-login" >
	<div class="spacer">
	<?php echo $params->get('pretext'); ?>
		<div class="loginelement">
			<label for="username"><?php echo JText::_( 'Username' ); ?></label>
			<input name="username" id="username" type="text" class="inputbox" alt="username" size="10" />
		</div>
		<div class="loginelement">
			<label for="passwd"><?php echo JText::_( 'Password' ); ?></label>
			<input name="passwd" id="passwd" type="password" class="inputbox" alt="password" size="10" />
		</div>
	</div>
	<div class="loginelement">
		<a href="javascript:document.login.submit();" class="nounder"><?php echo JText::_( 'BUTTON_LOGIN'); ?></a>
	</div>

		<div class="loginelement">
			<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset' ); ?>">
			<?php // echo JText::_('FORGOT_YOUR_PASSWORD'); ?>
			Forgot Password?
			</a>
		</div>
		<!-- uncomment if needed
		<div class="loginelement">
			<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=remind' ); ?>">
			<?php echo JText::_('FORGOT_YOUR_USERNAME'); ?>
			</a>
		</div>		
		-->
		<?php
		$usersConfig = &JComponentHelper::getParams( 'com_users' );
		if ($usersConfig->get('allowUserRegistration')) : ?>
			<div class="loginelement">
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&task=register' ); ?>">
				<?php echo JText::_('REGISTER'); ?>
				</a>
			</div>	
		<?php endif; ?>

	<?php echo $params->get('posttext'); ?>

	<input type="hidden" name="remember" value="yes" />
	<input type="hidden" name="option" value="com_user" />
	<input type="hidden" name="task" value="login" />
	<input type="hidden" name="return" value="<?php echo $return; ?>" />
	<input type="hidden" name="<?php echo JUtility::getToken(); ?>" value="1" />
</form>
<?php endif; ?>
