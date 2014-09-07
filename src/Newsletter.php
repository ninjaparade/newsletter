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
		
		return $this->$method(compact('list', 'email'));
		
	}

	public function unsubscribeFromList( $list, $email, $service = 'mailchimp')
	{
		$method = $service.'UnsubscribeFromList';
		
		return $this->$method(compact('list', 'email'));
		
	}

	protected function mailchimpSubscribeToList(array $params = null, $json = true )
	{
		$response = $this->mailchimp->subscribeTo($params);

		if ($json)
		{
   			return json_encode($response);
		}
		
		return $response;
	}

	protected function mailchimpUnsubscribeFromList(array $params = null, $json = true )
	{
		$response = $this->mailchimp->unsubscribeFrom($params);

		if ($json)
		{
   			return json_encode($response);
		}
		
		return $response;
	}



}



