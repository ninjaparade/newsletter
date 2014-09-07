<?php namespace Ninjaparade\Newsletter\MailChimp;


use Ninjaparade\Newsletter\NewsletterSubscriptionInterface;

use MailChimp;


class MailChimp implements NewsletterSubscriptionInterface
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

	public function __construct( array $config )
	{
		$this->config = $config;
	}

	 /**
     * Set service API key
     *
     * @param $apikey
     * @return null
     */
    public function setApiKey($apikey)
    {
    	$this->service
    }
	 /**
     * Subscribe a user to a newsletter list
     *
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function subscribeTo($listName, $email)
    {

    }

    /**
     * Unsubscribe a user from a newsletter list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom($list, $email)
    {

    }
}