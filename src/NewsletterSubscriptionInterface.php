<?php namespace Ninjaparade\Newsletter;

interface NewsletterSubscriptionInterface
{
     /**
     * Set service API key
     *
     * @param $apikey
     * @return null
     */

    public function setApiKey($apikey);
	 /**
     * Subscribe a user to a newsletter list
     *
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function subscribeTo(array $params);

    /**
     * Unsubscribe a user from a newsletter list
     *
     * @param $list
     * @param $email
     * @return mixed
     */
    public function unsubscribeFrom(array $params);

} 