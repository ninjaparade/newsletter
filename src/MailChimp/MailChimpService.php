<?php namespace Ninjaparade\Newsletter\MailChimp;

use Ninjaparade\Newsletter\NewsletterSubscriptionInterface;
use Mailchimp;

class MailChimpService implements NewsletterSubscriptionInterface
{
	
	/**
	 * The Config repository.
	 *
	 * @var array
	 */
	protected $config;

	/**
	 * The API Key 
	 *
	 * @var string
	 */
	protected $apikey;


	/**
	 * MailChimp
	 *
	 * @var Mailchimp
	 */
	protected $service;

    /**
     * MailChimp email lists array
     *
     * @var array
     */
    protected $emailLists;

	public function __construct( array $config )
	{
		$this->config = $config;
        
        $this->service = new Mailchimp($config['apikey']);

        $this->emailLists = $config['emailLists'];
	}

	 /**
     * Set service API key
     *
     * @param $apikey
     * @return null
     */
    public function setApiKey($apikey)
    {
        //not used
    	return false;
    }
	 /**
     * Subscribe a user to a newsletter list
     *
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function subscribeTo(array $params)
    {
         return $this->service->lists->subscribe(
            $this->emailLists[$params['list'] ],
            ['email' => $params['email'] ],
            null, // merge vars
            'html', // email type
            false, // require double opt in?
            true // update existing customers?
        );
    }

    /**
     * Unsubscribe a user from a newsletter list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom(array $params)
    {
          return $this->service->lists->unsubscribe(
            $this->emailLists[$params['list'] ],
            ['email' => $params['email'] ],
            false, // delete the member permanently
            false, // send goodbye email?
            false // send unsubscribe notification email?
        );
    }
}