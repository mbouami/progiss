<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // _prosales_login
        if ($pathinfo === '/login') {
            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::loginAction',  '_route' => '_prosales_login',);
        }

        // _welcome_prosales
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome_prosales');
            }

            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DefaultController::indexAction',  '_route' => '_welcome_prosales',);
        }

        if (0 === strpos($pathinfo, '/demo/secured')) {
            if (0 === strpos($pathinfo, '/demo/secured/log')) {
                if (0 === strpos($pathinfo, '/demo/secured/login')) {
                    // _demo_login
                    if ($pathinfo === '/demo/secured/login') {
                        return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                    }

                    // _security_check
                    if ($pathinfo === '/demo/secured/login_check') {
                        return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                    }

                }

                // _prosales_logout
                if ($pathinfo === '/demo/secured/logout') {
                    return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_prosales_logout',);
                }

            }

            if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                // acme_prosales_secured_hello
                if ($pathinfo === '/demo/secured/hello') {
                    return array (  'name' => 'World',  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_prosales_secured_hello',);
                }

                // _demo_secured_hello
                if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::helloAction',));
                }

                // _demo_secured_hello_admin
                if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\SecuredController::helloadminAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/referents')) {
            // referents
            if (rtrim($pathinfo, '/') === '/referents') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'referents');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::indexAction',  '_route' => 'referents',);
            }

            // referents_show
            if (preg_match('#^/referents/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'referents_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::showAction',));
            }

            // referents_new
            if ($pathinfo === '/referents/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::newAction',  '_route' => 'referents_new',);
            }

            // referents_create
            if ($pathinfo === '/referents/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_referents_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::createAction',  '_route' => 'referents_create',);
            }
            not_referents_create:

            // referents_edit
            if (preg_match('#^/referents/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'referents_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::editAction',));
            }

            // referents_update
            if (preg_match('#^/referents/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_referents_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'referents_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::updateAction',));
            }
            not_referents_update:

            // referents_delete
            if (preg_match('#^/referents/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_referents_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'referents_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::deleteAction',));
            }
            not_referents_delete:

        }

        if (0 === strpos($pathinfo, '/organisations')) {
            // organisations
            if (rtrim($pathinfo, '/') === '/organisations') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'organisations');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::indexAction',  '_route' => 'organisations',);
            }

            // organisations_show
            if (preg_match('#^/organisations/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisations_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::showAction',));
            }

            // organisations_new
            if ($pathinfo === '/organisations/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::newAction',  '_route' => 'organisations_new',);
            }

            // organisations_create
            if ($pathinfo === '/organisations/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_organisations_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::createAction',  '_route' => 'organisations_create',);
            }
            not_organisations_create:

            // organisations_edit
            if (preg_match('#^/organisations/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisations_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::editAction',));
            }

            // organisations_update
            if (preg_match('#^/organisations/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_organisations_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisations_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::updateAction',));
            }
            not_organisations_update:

            // organisations_delete
            if (preg_match('#^/organisations/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_organisations_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'organisations_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::deleteAction',));
            }
            not_organisations_delete:

        }

        if (0 === strpos($pathinfo, '/contacts')) {
            // contacts
            if (rtrim($pathinfo, '/') === '/contacts') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'contacts');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::indexAction',  '_route' => 'contacts',);
            }

            // contacts_show
            if (preg_match('#^/contacts/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contacts_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::showAction',));
            }

            // contacts_new
            if ($pathinfo === '/contacts/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::newAction',  '_route' => 'contacts_new',);
            }

            // contacts_create
            if ($pathinfo === '/contacts/create') {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_contacts_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::createAction',  '_route' => 'contacts_create',);
            }
            not_contacts_create:

            // contacts_edit
            if (preg_match('#^/contacts/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contacts_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::editAction',));
            }

            // contacts_update
            if (preg_match('#^/contacts/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_contacts_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contacts_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::updateAction',));
            }
            not_contacts_update:

            // contacts_delete
            if (preg_match('#^/contacts/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_contacts_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'contacts_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::deleteAction',));
            }
            not_contacts_delete:

        }

        if (0 === strpos($pathinfo, '/groupes')) {
            // groupes
            if (rtrim($pathinfo, '/') === '/groupes') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'groupes');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::indexAction',  '_route' => 'groupes',);
            }

            // groupes_show
            if (preg_match('#^/groupes/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::showAction',));
            }

            // groupes_new
            if ($pathinfo === '/groupes/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::newAction',  '_route' => 'groupes_new',);
            }

            // groupes_create
            if ($pathinfo === '/groupes/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_groupes_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::createAction',  '_route' => 'groupes_create',);
            }
            not_groupes_create:

            // groupes_edit
            if (preg_match('#^/groupes/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::editAction',));
            }

            // groupes_update
            if (preg_match('#^/groupes/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_groupes_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::updateAction',));
            }
            not_groupes_update:

            // groupes_delete
            if (preg_match('#^/groupes/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_groupes_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'groupes_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\GroupesController::deleteAction',));
            }
            not_groupes_delete:

        }

        if (0 === strpos($pathinfo, '/devis')) {
            // devis
            if (rtrim($pathinfo, '/') === '/devis') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'devis');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::indexAction',  '_route' => 'devis',);
            }

            // devis_show
            if (preg_match('#^/devis/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'devis_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::showAction',));
            }

            // devis_new
            if ($pathinfo === '/devis/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::newAction',  '_route' => 'devis_new',);
            }

            // devis_create
            if ($pathinfo === '/devis/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_devis_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::createAction',  '_route' => 'devis_create',);
            }
            not_devis_create:

            // devis_edit
            if (preg_match('#^/devis/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'devis_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::editAction',));
            }

            // devis_update
            if (preg_match('#^/devis/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_devis_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'devis_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::updateAction',));
            }
            not_devis_update:

            // devis_delete
            if (preg_match('#^/devis/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_devis_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'devis_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::deleteAction',));
            }
            not_devis_delete:

        }

        if (0 === strpos($pathinfo, '/lignesdevis')) {
            // lignesdevis
            if (rtrim($pathinfo, '/') === '/lignesdevis') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'lignesdevis');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::indexAction',  '_route' => 'lignesdevis',);
            }

            // lignesdevis_show
            if (preg_match('#^/lignesdevis/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lignesdevis_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::showAction',));
            }

            // lignesdevis_new
            if ($pathinfo === '/lignesdevis/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::newAction',  '_route' => 'lignesdevis_new',);
            }

            // lignesdevis_create
            if ($pathinfo === '/lignesdevis/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_lignesdevis_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::createAction',  '_route' => 'lignesdevis_create',);
            }
            not_lignesdevis_create:

            // lignesdevis_edit
            if (preg_match('#^/lignesdevis/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lignesdevis_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::editAction',));
            }

            // lignesdevis_update
            if (preg_match('#^/lignesdevis/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_lignesdevis_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lignesdevis_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::updateAction',));
            }
            not_lignesdevis_update:

            // lignesdevis_delete
            if (preg_match('#^/lignesdevis/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_lignesdevis_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lignesdevis_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\LignesdevisController::deleteAction',));
            }
            not_lignesdevis_delete:

        }

        if (0 === strpos($pathinfo, '/commandes')) {
            // commandes
            if (rtrim($pathinfo, '/') === '/commandes') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'commandes');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::indexAction',  '_route' => 'commandes',);
            }

            // commandes_show
            if (preg_match('#^/commandes/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commandes_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::showAction',));
            }

            // commandes_new
            if ($pathinfo === '/commandes/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::newAction',  '_route' => 'commandes_new',);
            }

            // commandes_create
            if ($pathinfo === '/commandes/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_commandes_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::createAction',  '_route' => 'commandes_create',);
            }
            not_commandes_create:

            // commandes_edit
            if (preg_match('#^/commandes/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commandes_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::editAction',));
            }

            // commandes_update
            if (preg_match('#^/commandes/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_commandes_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commandes_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::updateAction',));
            }
            not_commandes_update:

            // commandes_delete
            if (preg_match('#^/commandes/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_commandes_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'commandes_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\CommandesController::deleteAction',));
            }
            not_commandes_delete:

        }

        if (0 === strpos($pathinfo, '/modelescourriers')) {
            // modelescourriers
            if (rtrim($pathinfo, '/') === '/modelescourriers') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'modelescourriers');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::indexAction',  '_route' => 'modelescourriers',);
            }

            // modelescourriers_show
            if (preg_match('#^/modelescourriers/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'modelescourriers_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::showAction',));
            }

            // modelescourriers_new
            if ($pathinfo === '/modelescourriers/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::newAction',  '_route' => 'modelescourriers_new',);
            }

            // modelescourriers_create
            if ($pathinfo === '/modelescourriers/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_modelescourriers_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::createAction',  '_route' => 'modelescourriers_create',);
            }
            not_modelescourriers_create:

            // modelescourriers_edit
            if (preg_match('#^/modelescourriers/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'modelescourriers_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::editAction',));
            }

            // modelescourriers_update
            if (preg_match('#^/modelescourriers/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_modelescourriers_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'modelescourriers_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::updateAction',));
            }
            not_modelescourriers_update:

            // modelescourriers_delete
            if (preg_match('#^/modelescourriers/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_modelescourriers_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'modelescourriers_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::deleteAction',));
            }
            not_modelescourriers_delete:

        }

        if (0 === strpos($pathinfo, '/actions')) {
            // actions
            if (rtrim($pathinfo, '/') === '/actions') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'actions');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::indexAction',  '_route' => 'actions',);
            }

            // actions_show
            if (preg_match('#^/actions/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'actions_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::showAction',));
            }

            // actions_new
            if ($pathinfo === '/actions/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::newAction',  '_route' => 'actions_new',);
            }

            // actions_create
            if ($pathinfo === '/actions/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_actions_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::createAction',  '_route' => 'actions_create',);
            }
            not_actions_create:

            // actions_edit
            if (preg_match('#^/actions/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'actions_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::editAction',));
            }

            // actions_update
            if (preg_match('#^/actions/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_actions_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'actions_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::updateAction',));
            }
            not_actions_update:

            // actions_delete
            if (preg_match('#^/actions/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_actions_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'actions_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ActionsController::deleteAction',));
            }
            not_actions_delete:

        }

        if (0 === strpos($pathinfo, '/liste')) {
            // AcmeProsalesBundle_liste_organisations
            if ($pathinfo === '/listeorganisations') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::listeorganisationsAction',  '_route' => 'AcmeProsalesBundle_liste_organisations',);
            }

            // AcmeProsalesBundle_liste_contacts
            if ($pathinfo === '/listecontacts') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::listecontactsAction',  '_route' => 'AcmeProsalesBundle_liste_contacts',);
            }

        }

        // AcmeProsalesBundle_detail_organisations
        if ($pathinfo === '/detailorganisation') {
            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::detailorganisationAction',  '_route' => 'AcmeProsalesBundle_detail_organisations',);
        }

        if (0 === strpos($pathinfo, '/liste')) {
            // AcmeProsalesBundle_liste_villes_par_pays
            if ($pathinfo === '/listevilles') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\OrganisationsController::listevillesAction',  '_route' => 'AcmeProsalesBundle_liste_villes_par_pays',);
            }

            // AcmeProsalesBundle_liste_produits
            if ($pathinfo === '/listeproduits') {
                if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                    goto not_AcmeProsalesBundle_liste_produits;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::listeproduitsAction',  '_route' => 'AcmeProsalesBundle_liste_produits',);
            }
            not_AcmeProsalesBundle_liste_produits:

        }

        // AcmeProsalesBundle_enregistrer_lignes_devis
        if ($pathinfo === '/enregistrerlignesdevis') {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'HEAD'));
                goto not_AcmeProsalesBundle_enregistrer_lignes_devis;
            }

            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::enregistrerlignesdevisAction',  '_route' => 'AcmeProsalesBundle_enregistrer_lignes_devis',);
        }
        not_AcmeProsalesBundle_enregistrer_lignes_devis:

        // AcmeProsalesBundle_devis_en_cours
        if ($pathinfo === '/devisencours') {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'PUT', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'PUT', 'HEAD'));
                goto not_AcmeProsalesBundle_devis_en_cours;
            }

            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::listedevisencoursAction',  '_route' => 'AcmeProsalesBundle_devis_en_cours',);
        }
        not_AcmeProsalesBundle_devis_en_cours:

        // AcmeProsalesBundle_signatures
        if (preg_match('#^/(?P<id>[^/]++)/signatures$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'PUT', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'PUT', 'HEAD'));
                goto not_AcmeProsalesBundle_signatures;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_signatures')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ReferentsController::getSignaturesAction',));
        }
        not_AcmeProsalesBundle_signatures:

        // imprimer_devis
        if (preg_match('#^/(?P<id>[^/]++)/imprimerdevis$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'PUT', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'PUT', 'HEAD'));
                goto not_imprimer_devis;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'imprimer_devis')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::imprimerdevisAction',));
        }
        not_imprimer_devis:

        // new_message
        if (preg_match('#^/(?P<id>[^/]++)/newMessage$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'PUT', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'PUT', 'HEAD'));
                goto not_new_message;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'new_message')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::newMessageAction',));
        }
        not_new_message:

        // envoyer_devis
        if (preg_match('#^/(?P<id>[^/]++)/envoyerdevis$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'GET', 'PUT', 'HEAD'))) {
                $allow = array_merge($allow, array('POST', 'GET', 'PUT', 'HEAD'));
                goto not_envoyer_devis;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'envoyer_devis')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::envoyerdevisAction',));
        }
        not_envoyer_devis:

        if (0 === strpos($pathinfo, '/detail')) {
            // AcmeProsalesBundle_detail_modelecourrier
            if ($pathinfo === '/detailmodele') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ModelescourriersController::detailmodeleAction',  '_route' => 'AcmeProsalesBundle_detail_modelecourrier',);
            }

            // AcmeProsalesBundle_detail_devis
            if ($pathinfo === '/detaildevis') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::detaildevisAction',  '_route' => 'AcmeProsalesBundle_detail_devis',);
            }

        }

        // AcmeProsalesBundle_upload
        if ($pathinfo === '/upload') {
            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::uploadAction',  '_route' => 'AcmeProsalesBundle_upload',);
        }

        // AcmeProsalesBundle_effacer_fichier
        if (0 === strpos($pathinfo, '/effacerfichier') && preg_match('#^/effacerfichier/(?P<nomfichier>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_effacer_fichier')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\DevisController::effacerfichierAction',));
        }

        // AcmeProsalesBundle_contact_nommel
        if (preg_match('#^/(?P<id>[^/]++)/editnommelcontact$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_contact_nommel')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ContactsController::editNomMelAction',));
        }

        if (0 === strpos($pathinfo, '/liste')) {
            // AcmeProsalesBundle_liste_tauxtva
            if ($pathinfo === '/listetauxtva') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::listetauxtvaAction',  '_route' => 'AcmeProsalesBundle_liste_tauxtva',);
            }

            // AcmeProsalesBundle_liste_services
            if ($pathinfo === '/listeservices') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::listeservicesAction',  '_route' => 'AcmeProsalesBundle_liste_services',);
            }

        }

        // AcmeProsalesBundle_afficher_tauxtva
        if ($pathinfo === '/affichertauxtva') {
            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::AfficherTauxAction',  '_route' => 'AcmeProsalesBundle_afficher_tauxtva',);
        }

        // AcmeProsalesBundle_tauxtva_delete
        if (preg_match('#^/(?P<id>[^/]++)/deletetaux$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                $allow = array_merge($allow, array('POST', 'DELETE'));
                goto not_AcmeProsalesBundle_tauxtva_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_tauxtva_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::deletetauxAction',));
        }
        not_AcmeProsalesBundle_tauxtva_delete:

        // AcmeProsalesBundle_tauxtva_new
        if (preg_match('#^/(?P<tauxtva>[^/]++)/savetaux$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_AcmeProsalesBundle_tauxtva_new;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_tauxtva_new')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::savetauxAction',));
        }
        not_AcmeProsalesBundle_tauxtva_new:

        // AcmeProsalesBundle_afficher_services
        if ($pathinfo === '/afficherservices') {
            return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::AfficherServicesAction',  '_route' => 'AcmeProsalesBundle_afficher_services',);
        }

        // AcmeProsalesBundle_service_delete
        if (preg_match('#^/(?P<id>[^/]++)/deleteservice$#s', $pathinfo, $matches)) {
            if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                $allow = array_merge($allow, array('POST', 'DELETE'));
                goto not_AcmeProsalesBundle_service_delete;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_service_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::deleteserviceAction',));
        }
        not_AcmeProsalesBundle_service_delete:

        // AcmeProsalesBundle_service_new
        if (preg_match('#^/(?P<nomservice>[^/]++)/saveservice$#s', $pathinfo, $matches)) {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_AcmeProsalesBundle_service_new;
            }

            return $this->mergeDefaults(array_replace($matches, array('_route' => 'AcmeProsalesBundle_service_new')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\ParametresController::saveserviceAction',));
        }
        not_AcmeProsalesBundle_service_new:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
