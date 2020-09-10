<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class CoreLink extends \Entities\CoreLink implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'bfd', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'enabled', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'ipv4_subnet', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'ipv6_subnet', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'created_at', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'updated_at', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'id', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreInterfaceSideA', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreInterfaceSideB', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreBundle'];
        }

        return ['__isInitialized__', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'bfd', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'enabled', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'ipv4_subnet', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'ipv6_subnet', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'created_at', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'updated_at', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'id', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreInterfaceSideA', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreInterfaceSideB', '' . "\0" . 'Entities\\CoreLink' . "\0" . 'coreBundle'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (CoreLink $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getBFD(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBFD', []);

        return parent::getBFD();
    }

    /**
     * {@inheritDoc}
     */
    public function getEnabled(): bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEnabled', []);

        return parent::getEnabled();
    }

    /**
     * {@inheritDoc}
     */
    public function getIPv4Subnet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIPv4Subnet', []);

        return parent::getIPv4Subnet();
    }

    /**
     * {@inheritDoc}
     */
    public function getIPv6Subnet()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIPv6Subnet', []);

        return parent::getIPv6Subnet();
    }

    /**
     * {@inheritDoc}
     */
    public function getCoreInterfaceSideA(): \Entities\CoreInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoreInterfaceSideA', []);

        return parent::getCoreInterfaceSideA();
    }

    /**
     * {@inheritDoc}
     */
    public function getCoreInterfaceSideB(): \Entities\CoreInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoreInterfaceSideB', []);

        return parent::getCoreInterfaceSideB();
    }

    /**
     * {@inheritDoc}
     */
    public function getCoreInterfaces(): array
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoreInterfaces', []);

        return parent::getCoreInterfaces();
    }

    /**
     * {@inheritDoc}
     */
    public function getCoreBundle()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCoreBundle', []);

        return parent::getCoreBundle();
    }

    /**
     * {@inheritDoc}
     */
    public function setEnabled($enabled)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEnabled', [$enabled]);

        return parent::setEnabled($enabled);
    }

    /**
     * {@inheritDoc}
     */
    public function setBFD($bfd)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBFD', [$bfd]);

        return parent::setBFD($bfd);
    }

    /**
     * {@inheritDoc}
     */
    public function setIPv4Subnet($ipv4_subnet)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIPv4Subnet', [$ipv4_subnet]);

        return parent::setIPv4Subnet($ipv4_subnet);
    }

    /**
     * {@inheritDoc}
     */
    public function setIPv6Subnet($ipv6_subnet)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIPv6Subnet', [$ipv6_subnet]);

        return parent::setIPv6Subnet($ipv6_subnet);
    }

    /**
     * {@inheritDoc}
     */
    public function setCoreInterfaceSideA(\Entities\CoreInterface $coreInterfaceSideA = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoreInterfaceSideA', [$coreInterfaceSideA]);

        return parent::setCoreInterfaceSideA($coreInterfaceSideA);
    }

    /**
     * {@inheritDoc}
     */
    public function setCoreInterfaceSideB(\Entities\CoreInterface $coreInterfaceSideB = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoreInterfaceSideB', [$coreInterfaceSideB]);

        return parent::setCoreInterfaceSideB($coreInterfaceSideB);
    }

    /**
     * {@inheritDoc}
     */
    public function setCoreBundle(\Entities\CoreBundle $coreBundle = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCoreBundle', [$coreBundle]);

        return parent::setCoreBundle($coreBundle);
    }

}
