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

        if (0 === strpos($pathinfo, '/villes')) {
            // villes
            if (rtrim($pathinfo, '/') === '/villes') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'villes');
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::indexAction',  '_route' => 'villes',);
            }

            // villes_show
            if (preg_match('#^/villes/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'villes_show')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::showAction',));
            }

            // villes_new
            if ($pathinfo === '/villes/new') {
                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::newAction',  '_route' => 'villes_new',);
            }

            // villes_create
            if ($pathinfo === '/villes/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_villes_create;
                }

                return array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::createAction',  '_route' => 'villes_create',);
            }
            not_villes_create:

            // villes_edit
            if (preg_match('#^/villes/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'villes_edit')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::editAction',));
            }

            // villes_update
            if (preg_match('#^/villes/(?P<id>[^/]++)/update$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'PUT'))) {
                    $allow = array_merge($allow, array('POST', 'PUT'));
                    goto not_villes_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'villes_update')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::updateAction',));
            }
            not_villes_update:

            // villes_delete
            if (preg_match('#^/villes/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('POST', 'DELETE'))) {
                    $allow = array_merge($allow, array('POST', 'DELETE'));
                    goto not_villes_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'villes_delete')), array (  '_controller' => 'Acme\\ProsalesBundle\\Controller\\VillesController::deleteAction',));
            }
            not_villes_delete:

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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
