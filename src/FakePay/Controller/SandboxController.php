<?php

namespace FakePay\Controller;

use Symfony\Component\HttpFoundation\Response;
use FakePay\Adapter\AdapterInterface;

class SandboxController extends BaseController
{
	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
    public function indexAction()
    {
        $ids = $this->app['fakepay.adapter_factory']->getAllNames();

        return $this->getTemplating()->render("Sandbox/index.html.twig", array(
            'ids' => $ids
        ));
    }

    public function formAction(AdapterInterface $adapter)
    {
        $name = $adapter->getName();

        return $this->getTemplating()->render("Sandbox/Adapter/{$name}.html.twig", array(
            'adapter' => $adapter
        ));
    }

	public function responseAction(AdapterInterface $adapter)
	{
		return $this->getTemplating()->render("Sandbox/response.html.twig", array(
			'adapter' => $adapter
		));
	}
}