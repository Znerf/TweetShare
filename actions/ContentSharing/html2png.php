<?php
/**
 * Open Source Social Network
 *
 * @package   Open Source Social Network
 * @author    Open Social Website Core Team <info@softlab24.com>
 * @copyright (C) SOFTLAB24 LIMITED
 * @license   Open Source Social Network License (OSSN LICENSE)  http://www.opensource-socialnetwork.org/licence
 * @link      https://www.opensource-socialnetwork.org/
 */

if (!ossn_is_xhr()) {
    redirect(REF);
} 
$preview_file = ossn_get_userdata('components/ContentSharing/previews/_shared_content_' . str_replace('/', '_', input('content_str')) . '.png');
if( isset($_FILES['content_img']) and !$_FILES['content_img']['error'] ){
	file_put_contents($preview_file, file_get_contents($_FILES['content_img']['tmp_name']));
	$msg = 'com_content_sharing:link:copied';
	$err = '';
} else {
	copy(ossn_route()->com . 'ContentSharing/images/noimage.png', $preview_file);
	$msg = 'com_content_sharing:preview:imgage:failed';
	$err = 'com_content_sharing:file:copy:failed';
}
header('Content-Type: application/json');
echo json_encode(array(
	'msg' => $msg,
	'err' => $err
));
exit;