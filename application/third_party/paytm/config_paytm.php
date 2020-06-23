<?php

define('PAYTM_ENVIRONMENT', 'test'); // PROD
define('PAYTM_MERCHANT_KEY', '6Cy#s5pCtuR6ZmuL'); 
define('PAYTM_MERCHANT_MID', 'bvbrmC43657356066421'); 
define('PAYTM_MERCHANT_WEBSITE', 'WEBSTAGING');


define('INDUSTRY_TYPE_ID', 'Retail');
define('CHANNEL_ID', 'WEB');



$PAYTM_STATUS_QUERY_NEW_URL='https://securegw-stage.paytm.in/merchant-status/getTxnStatus';
$PAYTM_TXN_URL='https://securegw-stage.paytm.in/theia/processTransaction';
if (PAYTM_ENVIRONMENT == 'PROD') {
	$PAYTM_STATUS_QUERY_NEW_URL='https://securegw.paytm.in/merchant-status/getTxnStatus';
	$PAYTM_TXN_URL='https://securegw.paytm.in/theia/processTransaction';
}
define('PAYTM_REFUND_URL', '');
define('PAYTM_STATUS_QUERY_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_STATUS_QUERY_NEW_URL', $PAYTM_STATUS_QUERY_NEW_URL);
define('PAYTM_TXN_URL', $PAYTM_TXN_URL);

?>
