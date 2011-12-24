<?php
class SpecialNovaAddress extends SpecialNova {

	var $adminNova;
	var $userNova;

	/**
	 * @var OpenStackNovaUser
	 */
	var $userLDAP;

	function __construct() {
		parent::__construct( 'NovaAddress' );
	}

	function execute( $par ) {
		global $wgRequest;
		global $wgOpenStackManagerNovaAdminKeys;

		if ( !$this->getUser()->isLoggedIn() ) {
			$this->notLoggedIn();
			return;
		}
		$this->userLDAP = new OpenStackNovaUser();
		if ( !$this->userLDAP->exists() ) {
			$this->noCredentials();
			return;
		}
		$adminCredentials = $wgOpenStackManagerNovaAdminKeys;
		$this->adminNova = new OpenStackNovaController( $adminCredentials );

        	$action = $wgRequest->getVal( 'action' );
		if ( $action == "allocate" ) {
			$this->allocateAddress();
		} elseif ( $action == "release" ) {
			$this->releaseAddress();
		} elseif ( $action == "associate" ) {
			$this->associateAddress();
		} elseif ( $action == "disassociate" ) {
			$this->disassociateAddress();
		} elseif ( $action == "addhost" ) {
			$this->addHost();
		} elseif ( $action == "removehost" ) {
			$this->removehost();
		} else {
			$this->listAddresses();
		}
	}

	/**
	 * @return bool
	 */
	function allocateAddress() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-allocateaddress' ) );

		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
                $userCredentials = $this->userLDAP->getCredentials();
                $this->userNova = new OpenStackNovaController( $userCredentials, $project );
		if ( ! $wgRequest->wasPosted() ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-allocateaddress-confirm', $project );
		}
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'allocate',
			'name' => 'action',
		);

		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-allocateaddresssubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryAllocateSubmit' ) );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function releaseAddress() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-releaseaddress' ) );

		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
                $userCredentials = $this->userLDAP->getCredentials();
                $this->userNova = new OpenStackNovaController( $userCredentials, $project );
		$ip = $wgRequest->getText( 'ip' );
		if ( ! $wgRequest->wasPosted() ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-releaseaddress-confirm', $ip );
		}
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['ip'] = array(
			'type' => 'hidden',
			'default' => $ip,
			'name' => 'ip',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'release',
			'name' => 'action',
		);
		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-releaseaddresssubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryReleaseSubmit' ) );
		$addressForm->setSubmitText( 'confirm' );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function associateAddress() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-associateaddress' ) );

		$ip = $wgRequest->getText( 'ip' );
		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
                $userCredentials = $this->userLDAP->getCredentials();
                $this->userNova = new OpenStackNovaController( $userCredentials, $project );
		$instances = $this->userNova->getInstances();
		$instance_keys = array();
		foreach ( $instances as $instance ) {
			if ( $instance->getOwner() == $project ) {
				$instancename = $instance->getInstanceName();
				$instanceid = $instance->getInstanceId();
				$instance_keys["$instancename"] = $instanceid;
			}
		}
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['ip'] = array(
			'type' => 'hidden',
			'default' => $ip,
			'name' => 'ip',
		);
		$addressInfo['instanceid'] = array(
			'type' => 'select',
			'label-message' => 'openstackmanager-instancename',
			'options' => $instance_keys,
			'name' => 'instanceid',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'associate',
			'name' => 'action',
		);
		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-releaseaddresssubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryAssociateSubmit' ) );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function disassociateAddress() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-disassociateaddress' ) );

		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
                $userCredentials = $this->userLDAP->getCredentials();
                $this->userNova = new OpenStackNovaController( $userCredentials, $project );
		$ip = $wgRequest->getText( 'ip' );
		if ( ! $wgRequest->wasPosted() ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-disassociateaddress-confirm', $ip );
		}
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['ip'] = array(
			'type' => 'hidden',
			'default' => $ip,
			'name' => 'ip',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'disassociate',
			'name' => 'action',
		);
		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-disassociateaddresssubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryDisassociateSubmit' ) );
		$addressForm->setSubmitText( 'confirm' );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function addHost() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-addhost' ) );

		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
		$ip = $wgRequest->getText( 'ip' );
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['ip'] = array(
			'type' => 'hidden',
			'default' => $ip,
			'name' => 'ip',
		);
		$addressInfo['hostname'] = array(
			'type' => 'text',
			'default' => '',
			'validation-callback' => array( $this, 'validateDomain' ),
			'label-message' => 'openstackmanager-hostname',
			'name' => 'hostname',
		);
		$domains = OpenStackNovaDomain::getAllDomains( 'public' );
		$domain_keys = array();
		foreach ( $domains as $domain ) {
			$domainname = $domain->getDomainName();
			$domain_keys["$domainname"] = $domainname;
		}
		$addressInfo['domain'] = array(
			'type' => 'select',
			'options' => $domain_keys,
			'label-message' => 'openstackmanager-dnsdomain',
			'name' => 'domain',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'addhost',
			'name' => 'action',
		);
		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-addhostsubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryAddHostSubmit' ) );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function removeHost() {
		global $wgRequest;

		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-removehost' ) );

		$project = $wgRequest->getText( 'project' );
		if ( ! $this->userLDAP->inRole( 'netadmin', $project ) ) {
			$this->notInRole( 'netadmin' );
			return false;
		}
                $userCredentials = $this->userLDAP->getCredentials();
                $this->userNova = new OpenStackNovaController( $userCredentials, $project );
		$ip = $wgRequest->getText( 'ip' );
		$domain = $wgRequest->getText( 'domain' );
		$hostname = $wgRequest->getText( 'hostname' );
		if ( ! $wgRequest->wasPosted() ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-removehost-confirm', $hostname, $ip );
		}
		$addressInfo = array();
		$addressInfo['project'] = array(
			'type' => 'hidden',
			'default' => $project,
			'name' => 'project',
		);
		$addressInfo['ip'] = array(
			'type' => 'hidden',
			'default' => $ip,
			'name' => 'ip',
		);
		$addressInfo['domain'] = array(
			'type' => 'hidden',
			'default' => $domain,
			'name' => 'domain',
		);
		$addressInfo['hostname'] = array(
			'type' => 'hidden',
			'default' => $hostname,
			'name' => 'hostname',
		);
		$addressInfo['action'] = array(
			'type' => 'hidden',
			'default' => 'removehost',
			'name' => 'action',
		);
		$addressForm = new SpecialNovaAddressForm( $addressInfo, 'openstackmanager-novaaddress' );
		$addressForm->setTitle( SpecialPage::getTitleFor( 'NovaAddress' ) );
		$addressForm->setSubmitID( 'novaaddress-form-removehostsubmit' );
		$addressForm->setSubmitCallback( array( $this, 'tryRemoveHostSubmit' ) );
		$addressForm->setSubmitText( 'confirm' );
		$addressForm->show();

		return true;
	}

	/**
	 * @return bool
	 */
	function listAddresses() {
		$this->setHeaders();
		$this->getOutput()->setPagetitle( wfMsg( 'openstackmanager-addresslist' ) );

		$userProjects = $this->userLDAP->getProjects();
		$out = '';

		$header = Html::element( 'th', array(), wfMsg( 'openstackmanager-address' ) );
		$header .= Html::element( 'th', array(), wfMsg( 'openstackmanager-instanceid' ) );
		$header .= Html::element( 'th', array(), wfMsg( 'openstackmanager-instancename' ) );
		$header .= Html::element( 'th', array(), wfMsg( 'openstackmanager-hostnames' ) );
		$header .= Html::element( 'th', array(), wfMsg( 'openstackmanager-actions' ) );
		$addresses = $this->adminNova->getAddresses();
		$projectArr = array();
		foreach ( $addresses as $address ) {
			$ip = $address->getPublicIP();
			$instanceid = $address->getInstanceId();
			$project = $address->getProject();
			$addressOut = Html::element( 'td', array(), $ip );
			if ( $instanceid ) {
				$addressOut .= Html::element( 'td', array(), $instanceid );
				$instance = $this->adminNova->getInstance( $instanceid );
				$instancename = $instance->getInstanceName();
				$addressOut .= Html::element( 'td', array(), $instancename );
			} else {
				$addressOut .= Html::element( 'td', array(), '' );
				$addressOut .= Html::element( 'td', array(), '' );
			}
			$hosts = OpenStackNovaHost::getHostsByIP( $ip );
			if ( $hosts ) {
				$hostsOut = '';
				$msg = wfMsgHtml( 'openstackmanager-removehost-action' );
				foreach ( $hosts as $host ) {
					$domain = $host->getDomain();
					$fqdns = $host->getAssociatedDomains();
					foreach ( $fqdns as $fqdn ) {
						$hostname = explode( '.', $fqdn );
						$hostname = $hostname[0];
						$link = Linker::link( $this->getTitle(), $msg, array(),
								   array( 'action' => 'removehost', 'ip' => $ip, 'project' => $project, 'domain' => $domain->getDomainName(), 'hostname' => $hostname ) );
						$hostOut = htmlentities( $fqdn ) . ' ' . $link;
						$hostsOut .= Html::rawElement( 'li', array(), $hostOut );
					}
				}
				$hostsOut = Html::rawElement( 'ul', array(), $hostsOut );
				$addressOut .= Html::rawElement( 'td', array(), $hostsOut );
			} else {
				$addressOut .= Html::element( 'td', array(), '' );
			}
			$actions = '';
			if ( $instanceid ) {
				$msg = wfMsgHtml( 'openstackmanager-reassociateaddress' );
			} else {
				$msg = wfMsgHtml( 'openstackmanager-releaseaddress' );
				$link = Linker::link( $this->getTitle(), $msg, array(),
						   array( 'action' => 'release', 'ip' => $ip, 'project' => $project ) );
				$actions = Html::rawElement( 'li', array(), $link );
				$msg = wfMsgHtml( 'openstackmanager-associateaddress' );
			}
			$link = Linker::link( $this->getTitle(), $msg, array(),
					   array( 'action' => 'associate', 'ip' => $ip, 'project' => $project ) );
			$actions .= Html::rawElement( 'li', array(), $link );
			if ( $instanceid ) {
				$msg = wfMsgHtml( 'openstackmanager-disassociateaddress' );
				$link = Linker::link( $this->getTitle(), $msg, array(),
						   array( 'action' => 'disassociate', 'ip' => $ip, 'project' => $project ) );
				$actions .= Html::rawElement( 'li', array(), $link );
			}
			$msg = wfMsgHtml( 'openstackmanager-addhost' );
			$link = Linker::link( $this->getTitle(), $msg, array(),
					   array( 'action' => 'addhost', 'ip' => $ip, 'project' => $project ) );
			$actions .= Html::rawElement( 'li', array(), $link );
			$actions = Html::rawElement( 'ul', array(), $actions );
			$addressOut .= Html::rawElement( 'td', array(), $actions );
			if ( isset( $projectArr["$project"] ) ) {
				$projectArr["$project"] .= Html::rawElement( 'tr', array(), $addressOut );
			} else {
				$projectArr["$project"] = Html::rawElement( 'tr', array(), $addressOut );
			}
		}
		foreach ( $userProjects as $project ) {
			$out .= Html::element( 'h2', array(), $project );
			$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-allocateaddress' ), array(), array( 'action' => 'allocate', 'project' => $project ) );
			if ( isset( $projectArr["$project"] ) ) {
				$projectOut = $header;
				$projectOut .= $projectArr["$project"];
				$out .= Html::rawElement( 'table',
							  array( 'id' => 'novainstancelist', 'class' => 'wikitable sortable collapsible' ), $projectOut );
			}
		}
		$this->getOutput()->addHTML( $out );

		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryAllocateSubmit( $formData, $entryPoint = 'internal' ) {
		$address = $this->userNova->allocateAddress();
		if ( ! $address ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-allocateaddressfailed' );
			return true;
		}
		$ip = $address->getPublicIP();
		$this->getOutput()->addWikiMsg( 'openstackmanager-allocatedaddress', $ip );
		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );

		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryReleaseSubmit( $formData, $entryPoint = 'internal' ) {
		$ip = $formData['ip'];
		#TODO: Instead of throwing an error when host exist or the IP
		# is associated, remove all host entries and disassociate the IP
		# then release the address
		$hosts = OpenStackNovaHost::getHostsByIP( $ip );
		if ( $hosts ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-cannotreleaseaddress', $ip );
			return true;
		}
		$address = $this->adminNova->getAddress( $ip );
		if ( $address->getInstanceId() ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-cannotreleaseaddress', $ip );
			return true;
		}
		$success = $this->userNova->releaseAddress( $ip );
		if ( $success ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-releasedaddress', $ip );
		} else {
			$this->getOutput()->addWikiMsg( 'openstackmanager-cannotreleaseaddress', $ip );
		}

		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );

		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryAssociateSubmit( $formData, $entryPoint = 'internal' ) {
		$instanceid = $formData['instanceid'];
		$ip = $formData['ip'];
		$address = $this->userNova->associateAddress( $instanceid, $ip );
		if ( $address ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-associatedaddress', $ip, $instanceid );
		} else {
			$this->getOutput()->addWikiMsg( 'openstackmanager-associatedaddressfailed', $ip, $instanceid );
		}

		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );

		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryDisassociateSubmit( $formData, $entryPoint = 'internal' ) {
		$ip = $formData['ip'];
		$address = $this->userNova->disassociateAddress( $ip );
		if ( $address ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-disassociatedaddress', $ip );
		} else {
			$this->getOutput()->addWikiMsg( 'openstackmanager-disassociatedaddressfailed', $ip );
		}

		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );

		return true;
	}

	/**
	 * @param  $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryAddHostSubmit( $formData, $entryPoint = 'internal' ) {
		$ip = $formData['ip'];
		$project = $formData['project'];
		$address = $this->adminNova->getAddress( $ip );
		if ( ! $address ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-invalidaddress', $ip );
			return true;
		}
		if ( $address->getProject() != $project ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-invalidaddressforproject', $ip );
			return true;
		}
		$hostname = $formData['hostname'];
		$domain = $formData['domain'];
		$domain = OpenStackNovaDomain::getDomainByName( $domain );
		$hostbyname = OpenStackNovaHost::getHostByName( $hostname, $domain );
		$hostbyip = OpenStackNovaHost::getHostByIP( $ip );

		if ( $hostbyname ) {
			# We need to add an arecord, if the arecord doesn't already exist
			$success = $hostbyname->addARecord( $ip );
			if ( $success ) {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addedhost', $hostname, $ip );
			} else {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addhostfailed', $ip, $hostname );
			}
		} elseif ( $hostbyip ) {
			# We need to add an associateddomain, if the associateddomain doesn't already exist
			$success = $hostbyip->addAssociatedDomain( $hostname . '.' . $domain->getFullyQualifiedDomainName() );
			if ( $success ) {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addedhost', $hostname, $ip );
			} else {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addhostfailed', $ip, $hostname );
			}
		} else {
			# This is a new host entry
			$host = OpenStackNovaHost::addPublicHost( $hostname, $ip, $domain );
			if ( $host ) {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addedhost', $hostname, $ip );
			} else {
				$this->getOutput()->addWikiMsg( 'openstackmanager-addhostfailed', $ip, $hostname );
			}
		}
$this->getOutput();
		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );
		return true;
	}

	/**
	 * @param $formData
	 * @param string $entryPoint
	 * @return bool
	 */
	function tryRemoveHostSubmit( $formData, $entryPoint = 'internal' ) {
		$ip = $formData['ip'];
		$project = $formData['project'];
		$address = $this->adminNova->getAddress( $ip );
		if ( ! $address ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-invalidaddress', $ip );
			return true;
		}
		if ( $address->getProject() != $project ) {
			$this->getOutput()->addWikiMsg( 'openstackmanager-invalidaddressforproject', $ip );
			return true;
		}
		$hostname = $formData['hostname'];
		$domain = $formData['domain'];
		$domain = OpenStackNovaDomain::getDomainByName( $domain );
		$host = OpenStackNovaHost::getHostByName( $hostname, $domain );
		if ( $host ) {
			$fqdn = $hostname . '.' . $domain->getFullyQualifiedDomainName();
			$records = $host->getAssociatedDomains();
			if ( count( $records ) > 1 ) {
				# We need to keep the host, but remove the fqdn
				$success = $host->deleteAssociatedDomain( $fqdn );
				if ( $success ) {
					$this->getOutput()->addWikiMsg( 'openstackmanager-removedhost', $hostname, $ip );
				} else {
					$this->getOutput()->addWikiMsg( 'openstackmanager-removehostfailed', $ip, $hostname );
				}
			} else {
				# We need to remove the host entry
				$success = OpenStackNovaHost::deleteHost( $hostname, $domain );
				if ( $success ) {
					$this->getOutput()->addWikiMsg( 'openstackmanager-removedhost', $hostname, $ip );
				} else {
					$this->getOutput()->addWikiMsg( 'openstackmanager-removehostfailed', $ip, $hostname );
				}
			}
		} else {
			$this->getOutput()->addWikiMsg( 'openstackmanager-nonexistenthost' );
		}
		$out = '<br />';
		$out .= Linker::link( $this->getTitle(), wfMsgHtml( 'openstackmanager-backaddresslist' ) );
		$this->getOutput()->addHTML( $out );
		return true;
	}
}

class SpecialNovaAddressForm extends HTMLForm {
}
