<?php namespace Ninjaparade\Newsletter;

use Ninjaparade\Newsletter\MailChimp\MailChimpService;
use Request;

class Newsletter
{
	protected $mailchimp;

	public function __construct(array $config)
	{
		$this->config = $config;

		$this->mailchimp = new MailChimpService($config['mailchimp']);
	}

	public function subscribeToList( $list, $email, $service = 'mailchimp')
	{
		$method = $service.'SubscribeToList';
		
		$this->$method(compact('list', 'email'));
		
	}

	public function unsubscribeFromList( $list, $email, $service = 'mailchimp')
	{
		$method = $service.'UnsubscribeFromList';
		
		$this->$method(compact('list', 'email'));
		
	}

	protected function mailchimpSubscribeToList(array $params = null)
	{
		$response = $this->mailchimp->subscribeTo($params);

		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
   			
   			return json_encode($response);
		}
		
		return $response;
	}

	protected function mailchimpUnsubscribeFromList(array $params = null)
	{
		$response = $this->mailchimp->unsubscribeFrom($params);

		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
   			
   			return json_encode($response);
		}
		
		return $response;
	}



}



