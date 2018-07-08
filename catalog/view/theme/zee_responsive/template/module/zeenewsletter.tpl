<div class="<?php echo $prefix; ?> box newsletter_block column noborder" id="newsletter_<?php echo $position.$module;?>">
	<h3><?php echo $this->language->get("entry_newsletter");?></h3>	
	<div class="block_content">
			<form id="formNewLestter" method="post" action="<?php echo $action; ?>">
			<div class="email">
				<input type="text" class="inputNew" <?php if(!isset($customer_email)): ?> onblur="javascript:if(this.value=='')this.value='<?php echo $this->language->get("default_input_text");?>';" onfocus="javascript:if(this.value=='<?php echo $this->language->get("default_input_text");?>')this.value='';"<?php endif; ?> value="<?php echo isset($customer_email)?$customer_email:$this->language->get("default_input_text");?>" size="18" name="email">
				<input type="submit" name="submitNewsletter" class="button_mini button-email" value="<?php echo $this->language->get("button_ok");?>">
				<input type="hidden" value="1" name="action">
				<div class="valid"></div>
			</div>
		</form>
	</div>
	<div class="description"><?php echo html_entity_decode( $description );?></div>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	$('#formNewLestter').on('submit', function() {
	var sbt =  '<img src=\"catalog/view/theme/default/image/close.png\" alt=\"\" class=\"close\">';
	var email = $('.inputNew').val();
	$(".warning, .success").remove();
		if(!isValidEmailAddress(email)) {
			$('.valid').html("<div class=\"warning\"><?php echo $this->language->get('valid_email'); ?>"+sbt+" </div>");
			$('.inputNew').focus();
			return false;
		}
		var url = "<?php echo $action; ?>";
		$.ajax({
			type: "post",
			url: url,
			data: $("#formNewLestter").serialize(),
			dataType: 'json',
			success: function(json)
			{
				$(".warning, .success").remove();
				if (json['error']) {
					$('.valid').html("<div class=\"warning\">"+json['error']+sbt+"</div>");
				}
				if (json['success']) {
					$('.valid').html("<div class=\"success\">"+json['success']+sbt+"</div>");
				}
			}
		});
		return false;
	});
});

function isValidEmailAddress(emailAddress) {
	var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
	return pattern.test(emailAddress);
}
</script>