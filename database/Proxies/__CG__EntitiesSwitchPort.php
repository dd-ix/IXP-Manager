<?php

namespace Proxies\__CG__\Entities;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class SwitchPort extends \Entities\SwitchPort implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', 'type', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'created_at', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'updated_at', 'name', 'id', 'PhysicalInterface', 'Switcher', 'ifName', 'ifAlias', 'ifHighSpeed', 'ifMtu', 'ifPhysAddress', 'ifAdminStatus', 'ifOperStatus', 'ifLastChange', 'lastSnmpPoll', 'ifIndex', 'active', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'patchPanelPort', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauType', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauState', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAvailability', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauJacktype', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAutoNegSupported', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAutoNegAdminState', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'lagIfIndex'];
        }

        return ['__isInitialized__', 'type', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'created_at', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'updated_at', 'name', 'id', 'PhysicalInterface', 'Switcher', 'ifName', 'ifAlias', 'ifHighSpeed', 'ifMtu', 'ifPhysAddress', 'ifAdminStatus', 'ifOperStatus', 'ifLastChange', 'lastSnmpPoll', 'ifIndex', 'active', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'patchPanelPort', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauType', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauState', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAvailability', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauJacktype', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAutoNegSupported', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'mauAutoNegAdminState', '' . "\0" . 'Entities\\SwitchPort' . "\0" . 'lagIfIndex'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (SwitchPort $proxy) {
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
    public function setType($type)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setType', [$type]);

        return parent::setType($type);
    }

    /**
     * {@inheritDoc}
     */
    public function getType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getType', []);

        return parent::getType();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', [$name]);

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', []);

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
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
    public function setPhysicalInterface(\Entities\PhysicalInterface $physicalInterface = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPhysicalInterface', [$physicalInterface]);

        return parent::setPhysicalInterface($physicalInterface);
    }

    /**
     * {@inheritDoc}
     */
    public function getPhysicalInterface()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPhysicalInterface', []);

        return parent::getPhysicalInterface();
    }

    /**
     * {@inheritDoc}
     */
    public function setSwitcher(\Entities\Switcher $switcher = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSwitcher', [$switcher]);

        return parent::setSwitcher($switcher);
    }

    /**
     * {@inheritDoc}
     */
    public function getSwitcher()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSwitcher', []);

        return parent::getSwitcher();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfName($ifName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfName', [$ifName]);

        return parent::setIfName($ifName);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfName', []);

        return parent::getIfName();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfAlias($ifAlias)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfAlias', [$ifAlias]);

        return parent::setIfAlias($ifAlias);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfAlias()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfAlias', []);

        return parent::getIfAlias();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfHighSpeed($ifHighSpeed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfHighSpeed', [$ifHighSpeed]);

        return parent::setIfHighSpeed($ifHighSpeed);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfHighSpeed()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfHighSpeed', []);

        return parent::getIfHighSpeed();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfMtu($ifMtu)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfMtu', [$ifMtu]);

        return parent::setIfMtu($ifMtu);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfMtu()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfMtu', []);

        return parent::getIfMtu();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfPhysAddress($ifPhysAddress)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfPhysAddress', [$ifPhysAddress]);

        return parent::setIfPhysAddress($ifPhysAddress);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfPhysAddress()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfPhysAddress', []);

        return parent::getIfPhysAddress();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfAdminStatus($ifAdminStatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfAdminStatus', [$ifAdminStatus]);

        return parent::setIfAdminStatus($ifAdminStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfAdminStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfAdminStatus', []);

        return parent::getIfAdminStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfOperStatus($ifOperStatus)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfOperStatus', [$ifOperStatus]);

        return parent::setIfOperStatus($ifOperStatus);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfOperStatus()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfOperStatus', []);

        return parent::getIfOperStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfLastChange($ifLastChange)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfLastChange', [$ifLastChange]);

        return parent::setIfLastChange($ifLastChange);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfLastChange()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfLastChange', []);

        return parent::getIfLastChange();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastSnmpPoll($lastSnmpPoll)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastSnmpPoll', [$lastSnmpPoll]);

        return parent::setLastSnmpPoll($lastSnmpPoll);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastSnmpPoll()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastSnmpPoll', []);

        return parent::getLastSnmpPoll();
    }

    /**
     * {@inheritDoc}
     */
    public function setIfIndex($ifIndex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIfIndex', [$ifIndex]);

        return parent::setIfIndex($ifIndex);
    }

    /**
     * {@inheritDoc}
     */
    public function getIfIndex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIfIndex', []);

        return parent::getIfIndex();
    }

    /**
     * {@inheritDoc}
     */
    public function setActive($active)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActive', [$active]);

        return parent::setActive($active);
    }

    /**
     * {@inheritDoc}
     */
    public function getActive()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActive', []);

        return parent::getActive();
    }

    /**
     * {@inheritDoc}
     */
    public function snmpUpdate($host, $logger = false)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'snmpUpdate', [$host, $logger]);

        return parent::snmpUpdate($host, $logger);
    }

    /**
     * {@inheritDoc}
     */
    public function ifnameToSNMPIdentifier()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'ifnameToSNMPIdentifier', []);

        return parent::ifnameToSNMPIdentifier();
    }

    /**
     * {@inheritDoc}
     */
    public function setLagIfIndex($lagIfIndex)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLagIfIndex', [$lagIfIndex]);

        return parent::setLagIfIndex($lagIfIndex);
    }

    /**
     * {@inheritDoc}
     */
    public function getLagIfIndex()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLagIfIndex', []);

        return parent::getLagIfIndex();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauType($mauType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauType', [$mauType]);

        return parent::setMauType($mauType);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauType', []);

        return parent::getMauType();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauState($mauState)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauState', [$mauState]);

        return parent::setMauState($mauState);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauState', []);

        return parent::getMauState();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauAvailability($mauAvailability)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauAvailability', [$mauAvailability]);

        return parent::setMauAvailability($mauAvailability);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauAvailability()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauAvailability', []);

        return parent::getMauAvailability();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauJacktype($mauJacktype)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauJacktype', [$mauJacktype]);

        return parent::setMauJacktype($mauJacktype);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauJacktype()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauJacktype', []);

        return parent::getMauJacktype();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauAutoNegSupported($mauAutoNegSupported)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauAutoNegSupported', [$mauAutoNegSupported]);

        return parent::setMauAutoNegSupported($mauAutoNegSupported);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauAutoNegSupported()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauAutoNegSupported', []);

        return parent::getMauAutoNegSupported();
    }

    /**
     * {@inheritDoc}
     */
    public function setMauAutoNegAdminState($mauAutoNegAdminState)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMauAutoNegAdminState', [$mauAutoNegAdminState]);

        return parent::setMauAutoNegAdminState($mauAutoNegAdminState);
    }

    /**
     * {@inheritDoc}
     */
    public function getMauAutoNegAdminState()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMauAutoNegAdminState', []);

        return parent::getMauAutoNegAdminState();
    }

    /**
     * {@inheritDoc}
     */
    public function oidInOctets(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidInOctets', []);

        return parent::oidInOctets();
    }

    /**
     * {@inheritDoc}
     */
    public function oidOutOctets(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidOutOctets', []);

        return parent::oidOutOctets();
    }

    /**
     * {@inheritDoc}
     */
    public function oidInUnicastPackets(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidInUnicastPackets', []);

        return parent::oidInUnicastPackets();
    }

    /**
     * {@inheritDoc}
     */
    public function oidOutUnicastPackets(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidOutUnicastPackets', []);

        return parent::oidOutUnicastPackets();
    }

    /**
     * {@inheritDoc}
     */
    public function oidInErrors(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidInErrors', []);

        return parent::oidInErrors();
    }

    /**
     * {@inheritDoc}
     */
    public function oidOutErrors(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidOutErrors', []);

        return parent::oidOutErrors();
    }

    /**
     * {@inheritDoc}
     */
    public function oidInDiscards(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidInDiscards', []);

        return parent::oidInDiscards();
    }

    /**
     * {@inheritDoc}
     */
    public function oidOutDiscards(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidOutDiscards', []);

        return parent::oidOutDiscards();
    }

    /**
     * {@inheritDoc}
     */
    public function oidInBroadcasts(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidInBroadcasts', []);

        return parent::oidInBroadcasts();
    }

    /**
     * {@inheritDoc}
     */
    public function oidOutBroadcasts(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'oidOutBroadcasts', []);

        return parent::oidOutBroadcasts();
    }

    /**
     * {@inheritDoc}
     */
    public function isTypeUnset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTypeUnset', []);

        return parent::isTypeUnset();
    }

    /**
     * {@inheritDoc}
     */
    public function isTypePeering()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTypePeering', []);

        return parent::isTypePeering();
    }

    /**
     * {@inheritDoc}
     */
    public function isTypeReseller()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTypeReseller', []);

        return parent::isTypeReseller();
    }

    /**
     * {@inheritDoc}
     */
    public function isTypeCore()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTypeCore', []);

        return parent::isTypeCore();
    }

    /**
     * {@inheritDoc}
     */
    public function isTypeFanout()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isTypeFanout', []);

        return parent::isTypeFanout();
    }

    /**
     * {@inheritDoc}
     */
    public function setPatchPanelPort(\Entities\PatchPanelPort $patchPanelPort = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPatchPanelPort', [$patchPanelPort]);

        return parent::setPatchPanelPort($patchPanelPort);
    }

    /**
     * {@inheritDoc}
     */
    public function getPatchPanelPort()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPatchPanelPort', []);

        return parent::getPatchPanelPort();
    }

    /**
     * {@inheritDoc}
     */
    public function resolveType(): string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'resolveType', []);

        return parent::resolveType();
    }

}
