<?php
/**
 * Open Source Social Network
 *
 * @package   (softlab24.com).ossn
 * @author    OSSN Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */

$dst_dir = ossn_get_userdata('components/ContentSharing/previews');
if(!is_dir($dst_dir)) {
	if(!mkdir("{$dst_dir}", 0755, true)) {
		error_log('ContentSharing: The directory for preview images cannot be created');
		ossn_load_available_languages();
		ossn_trigger_message(ossn_print('com_content_sharing:preview:directory:creation:failure'), 'error');
		redirect(REF);
	}
}